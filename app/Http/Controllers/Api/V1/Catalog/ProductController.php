<?php

namespace App\Http\Controllers\Api\V1\Catalog;

use App\Models\Catalog\Product;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\Catalog\ProductRequest;
use App\Http\Resources\Catalog\ProductResource;
use App\Services\ImageStorage\IImageStorageService;
use App\Services\ImageStorage\ImageStorageDiskService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    private IImageStorageService $imageStorageService;

    public function __construct()
    {
        $this->imageStorageService = new ImageStorageDiskService('images/products/');
    }

    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::all());
    }

    public function store(ProductRequest $request): ProductResource
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image'))
        {
            $filePath = $this->imageStorageService->store($request->file('image'));
            $validatedData['image'] = $filePath;
        }

        $product = Product::query()->create($validatedData);

        return new ProductResource($product);
    }
}
