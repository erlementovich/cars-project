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

    public function saveFromURL(string $url)
    {
        $fileInfo = pathinfo(basename($url));
        $extension = $fileInfo['extension'] ?? 'jpg';
        $filename = uniqid() . '.' . $extension;
        $request = $this->client->get($url, [
            'verify' => false
        ]);

        if ($request->getStatusCode() !== 200) {
            return $url;
        }

        $filePath = 'images/' . $filename;

        Storage::disk('public')->put($filePath, $request->getBody()->getContents());
        return $filePath;
    }

    public function saveFile($file)
    {
        $path = $file->store('images', ['disk' => 'public']);
        return $this->imageRepository->create($path);
    }
}
