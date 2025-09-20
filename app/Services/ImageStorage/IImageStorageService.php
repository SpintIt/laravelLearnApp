<?php
namespace App\Services\ImageStorage;

interface IImageStorageService
{
    public function __construct(string $pathDir = 'images/');
    public function store(\Illuminate\Http\UploadedFile $image): string;
    public function delete(mixed $image);
    public function get(string $path);
    public function exists();
    public function createName(\Illuminate\Http\UploadedFile $image): string;
}
