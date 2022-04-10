<!-- Products Start -->
<div class="container-fluid" id="products">
    <div class="text-center mb-4 mt-4">
        <h2 class="px-5"><span class="px-2">{{ $category->name }}</span></h2>
    </div>
    <div class="row px-xl-5 pb-3 mt-5">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header bg-transparent border p-0">
                        <img class="w-100 img-fluid" src="{{ $product->path }}" alt="" height="250" width="200">
                    </div>
                    <div class="card-body border-left border-right border-bottom text-center p-0 pt-4 pb-3 d-flex flex-column justify-content-center">
                        <div class="d-flex flex-row justify-content-between px-2">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <h6>{{ $product->formatted_price }}€</h6>
                        </div>
                        <div class="d-flex flex-row justify-content-center">
                            <form wire:submit.prevent="addToCart({{ $product->id }})">
                                <button class="btn btn-sm text-dark p-0" type="submit">
                                    <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Products End -->
