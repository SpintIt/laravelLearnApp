@extends('layouts.api.index')

@section('content')
    <the-register csrf-token="{{ csrf_token() }}"></the-register>
@endsection
