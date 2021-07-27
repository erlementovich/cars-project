<?php


namespace App\Services;

use App\Contracts\Interfaces\ImagesRepositoryContract;
use App\Models\Image;
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

    public function saveFile($file)
    {
        $path = $file->store('images', ['disk' => 'public']);
        return $this->imageRepository->create("/$path");
    }

    public function seedImages(array $paths)
    {
        $responsePaths = [];
        foreach ($paths as $folder) {
            $uploadDir = 'public/images/' . $folder;
            Storage::deleteDirectory($uploadDir);
            Storage::makeDirectory($uploadDir);
            $files = Storage::disk('resource')->files($folder);

            foreach ($files as $file) {
                $moved = Storage::put('public/images/' . $file, Storage::disk('resource')->get($file));
                if ($moved) {
                    $responsePaths[] = '/images/' . $file;
                }
            }
        }

        return $responsePaths;
    }

    public function factoryImages(array $imagePaths)
    {
        $images = collect();
        foreach ($imagePaths as $imagePath) {
            $images->push(Image::factory()->create(['url' => $imagePath]));
        }

        return $images;
    }
}
