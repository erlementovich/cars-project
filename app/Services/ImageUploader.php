<?php


namespace App\Services;

use App\Contracts\Interfaces\ImagesRepositoryContract;
use App\Models\Image;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploader
{
    protected $client;
    protected $imageRepository;

    public function __construct(Client $client, ImagesRepositoryContract $imageRepository)
    {
        $this->client = $client;
        $this->imageRepository = $imageRepository;
    }

    private function storagePath()
    {
        $path = Storage::path('public/images/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        return $path;
    }

    public function saveFromURL(string $url)
    {
        $fileInfo = pathinfo(basename($url));
        $extension = $fileInfo['extension'] ?? 'jpg';
        $filename = uniqid() . '.' . $extension;

        $request = $this->client->get($url, [
            'sink' => $this->storagePath() . $filename,
            'verify' => false
        ]);

        if ($request->getStatusCode() !== 200) {
            return $url;
        }

        return '/images/' . $filename;
    }

    public function saveFile($file, $title = '')
    {
        $extension = $file->extension();
        $fileName = uniqid() . "." . $extension;
        $file->storeAs('/public/images', $fileName);
        $data = [];
        $data['url'] = "/images/$fileName";
        $data['alt'] = $title ?? null;
        return $this->imageRepository->create($data);
    }
}
