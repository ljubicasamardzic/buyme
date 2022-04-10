<div class="container-fluid">
    <div class="row mt-4 d-flex justify-content-center">
        @foreach($categories as $category)
            <div class="col-12 col-md-5 pb-1">
                <a href="{{ route('categories.show', ['category' => $category]) }}" class="cat-img position-relative overflow-hidden mb-3">
                    <div class="cat-item d-flex flex-column border mb-4">
                            <img class="img-fluid" src="{{ $category->path }}" alt="">
                        <h5 class="font-weight-semi-bold m-0">{{ $category->name }}</h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
