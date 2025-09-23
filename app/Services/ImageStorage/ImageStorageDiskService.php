<?php
namespace App\Services\ImageStorage;

use Illuminate\Http\UploadedFile;
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
     * @param UploadedFile $image
     * @throws FileException
     * @return string $filePath
     */
    public function save(UploadedFile $image): string
    {
        $this->image = $this->imageManager->read($image);
        $fileName = $this->createName($image);
        $pathFile = "{$this->pathDir}{$fileName}";

        if (!Storage::disk('public')->put($pathFile, $this->image->encode()))
        {
            throw new FileException($pathFile);
        }

        return "storage/{$pathFile}";
    }

    public function load(string $path)
    {

    }

    public function delete(mixed $image)
    {

    }

    public function exists()
    {

    }

    public function createName(UploadedFile $image): string
    {
        return time() . '.' . $image->getClientOriginalExtension();
    }
}
