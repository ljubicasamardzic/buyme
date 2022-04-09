@extends('layouts.app')

@section('content')
    @livewire('products-index', ['products' => $products, 'category' => $category])
@endsection
