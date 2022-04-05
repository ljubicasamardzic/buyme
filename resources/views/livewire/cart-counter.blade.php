<div class="row align-items-center py-3 px-xl-5">
    <div class="col-6 text-left">
        <a href="" class="text-decoration-none">
            <h2 class="m-0 font-weight-semi-bold">BuyMe</h2>
        </a>
    </div>
    <div class="col-6 text-right">
        <a wire:click="redirectToShow" class="btn border">
            <i class="fas fa-shopping-cart text-primary"></i>
            <span class="badge" style="color:#000;">{{ $cartCounter }}</span>
        </a>
    </div>
</div>

