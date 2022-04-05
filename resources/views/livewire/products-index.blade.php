<!-- Products Start -->
<div class="container-fluid" id="products">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="w-100 img-fluid" src="{{ $product->path }}" alt="" height="250" width="200">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ $product->formatted_price }}€</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a class="btn btn-sm text-dark p-0" href=""><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <form wire:submit.prevent="addToCart({{ $product->id }})" action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="btn btn-sm text-dark p-0" type="submit">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Products End -->
