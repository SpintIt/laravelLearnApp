@extends('layouts.template.index')

@section('content')
    <main class="container mx-auto p-4 flex flex-wrap lg:flex-nowrap gap-4 min-h-[calc(100vh-12rem)]">
        @yield('sidebar.sidebar')
        <div class="w-full lg:w-3/4 bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">@yield('h1')</h2>
            @yield('sidebar.content')
        </div>
    </main>
@endsection
