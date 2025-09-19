<?php

namespace App\Http\Controllers\Api\V1\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\ProductRequest;
use App\Http\Resources\Catalog\ProductResource;
use App\Models\Catalog\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): ProductResource
    {
        $validatedData = $request->validated();

        // TODO New Service
        if ($request->hasFile('image')) {
            info('Info', $request->toArray());
            // Создаем новый менеджер с драйвером GD
            $manager = new ImageManager(new Driver());

            // Получаем загруженный файл
            $image = $request->file('image');

            // Создаем экземпляр изображения из файла
            $img = $manager->read($image);

            // Пример обработки: изменяем размер изображения
            // $img->resize(800, 600);

            // Генерируем уникальное имя файла
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Сохраняем обработанное изображение на диск 'public'
            // Метод save() возвращает содержимое файла, а затем мы его сохраняем через Storage
            Storage::disk('public')->put('images/' . $filename, $img->encode());

            info('Info', $validatedData);
            $validatedData['image'] = 'images/' . $filename;
            info('Info', $validatedData);
        }

        $product = Product::query()->create($validatedData);

        return new ProductResource($product);
    }
}
