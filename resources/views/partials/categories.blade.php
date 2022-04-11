<div class="container-fluid">
    <div class="row mt-4 d-flex justify-content-center">
        @foreach($categories as $category)
            <div class="col-12 col-md-5 pb-1 mb-3">
                <div class="cat-item">
                    <a href="{{ route('categories.show', ['category' => $category]) }}"
                       class="cat-img position-relative mb-3 gold"
                    >
                        <div class="card">
                            <div class="card-header p-0 overflow-hidden">
                                <img class="img-cover" src="{{ $category->path }}" alt="">
                            </div>
                           <div class="card-footer" style="background-color: #fff!important;">
                               <h5 class="font-weight-semi-bold m-0 text-secondary">{{ $category->name }}</h5>
                           </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
