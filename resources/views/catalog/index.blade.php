@extends('layouts.sidebar')

@section('h1', 'Catalog')

@section('sidebar.sidebar')
    <x-sidebar :title="__('Меню')">
        <ul class="space-y-2">
            <li><a href="#" class="block p-2 rounded hover:bg-gray-200">Пункт 1</a></li>
            <li><a href="#" class="block p-2 rounded hover:bg-gray-200">Пункт 2</a></li>
            <li><a href="#" class="block p-2 rounded hover:bg-gray-200">Пункт 3</a></li>
        </ul>
    </x-sidebar>
@endsection

@section('sidebar.content')
    <x-catalog.catalog-list/>
    <x-pagination/>
@endsection
