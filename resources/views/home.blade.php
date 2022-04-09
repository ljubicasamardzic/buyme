@extends('layouts.app')

@section('content')
{{--    @include('partials.carousel')--}}
    @livewire('products-index')
    @include('partials.features')
@endsection
