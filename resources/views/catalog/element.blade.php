@extends('layouts.main')

@section('main.content')
    <x-breadcrumbs/>
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Изображение товара -->
            <div class="w-full lg:w-1/2 rounded-lg overflow-hidden">
                <img src="https://dummyimage.com/600/400" alt="Название товара" class="w-full h-auto object-cover rounded-lg shadow-sm">
            </div>

            <!-- Детали товара -->
            <div class="w-full lg:w-1/2 flex flex-col">
                <div>
                    <h2 class="text-3xl font-bold mb-4">Название товара</h2>
                    <p class="text-gray-600 mb-6">
                        Краткое, но емкое описание товара, подчеркивающее его основные характеристики и преимущества. Этот текст должен помочь покупателю принять решение о покупке.
                    </p>

                    <!-- Цены -->
                    <div class="flex items-baseline mb-6">
                        <span class="text-red-500 text-3xl font-bold mr-4">999 ₽</span>
                        <span class="text-gray-400 text-xl line-through">1299 ₽</span>
                    </div>
                </div>

                <!-- Кнопка "Купить" -->
                <button class="w-full bg-blue-600 text-white text-lg font-semibold py-4 rounded-md hover:bg-blue-700 transition-colors duration-200">
                    Добавить в корзину
                </button>
            </div>
        </div>
    </div>

    <x-review.reviewList productId="1111" />

    <x-modal :title="__('Оставить отзыв')">

        <x-review.form :action="route('review.store')" />

    </x-modal>
@endsection
