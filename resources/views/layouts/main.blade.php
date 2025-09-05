@extends('layouts.template.index')

@section('content')
    <main class="container mx-auto p-4 flex flex-col gap-4 min-h-[calc(100vh-12rem)]">
        @yield('main.content')
    </main>
@endsection
