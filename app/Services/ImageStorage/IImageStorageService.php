<?php
namespace App\Services\ImageStorage;

use Illuminate\Http\UploadedFile;

interface IImageStorageService
{
    public function __construct(string $pathDir = 'images/');
    public function save(UploadedFile $image): string;
    public function load(string $path);
    public function delete(mixed $image);
    public function exists();
    public function createName(UploadedFile $image): string;
}
