<?php
namespace App\Services\ImageStorage;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Interfaces\ImageInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

final class ImageStorageDiskService implements IImageStorageService
{
    private string $pathDir;
    private ImageManager $imageManager;
    private ImageInterface $image;

    public function __construct(string $pathDir = 'images/')
    {
        $this->pathDir = $pathDir;
        $this->imageManager = new ImageManager(new Driver());
    }

    /**
     * @param \Illuminate\Http\UploadedFile $image
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     * @return string $filePath
     */
    public function store(\Illuminate\Http\UploadedFile $image): string
    {
        $this->image = $this->imageManager->read($image);
        $fileName = $this->createName($image);
        $pathFile = "{$this->pathDir}{$fileName}";

        if (!Storage::disk('public')->put($pathFile, $this->image->encode()))
        {
            throw new FileException($pathFile);
        }

        return $pathFile;
    }

    public function delete(mixed $image)
    {

    }

    public function get(string $path)
    {

    }

    public function exists()
    {

    }

    public function createName(\Illuminate\Http\UploadedFile $image): string
    {
        return time() . '.' . $image->getClientOriginalExtension();
    }
}
