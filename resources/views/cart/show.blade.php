@extends('layouts.app')

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-light">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Tax</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    @livewire('cart-table')
                </table>
            </div>
            @livewire('cart-total')
            </div>
        </div>
    </div>
@endsection
