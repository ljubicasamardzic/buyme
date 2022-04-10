<div class="col-lg-4">
    <div class="card border-secondary mb-5">
        <div class="card-header bg-secondary border-0">
            <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">Subtotal</h6>
                <h6 class="font-weight-medium">{{ $subtotal }}€</h6>
            </div>
            <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">Tax</h6>
                <h6 class="font-weight-medium">{{ $tax }}€</h6>
            </div>
            <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">Shipping</h6>
                <h6 class="font-weight-medium">0.00€</h6>
            </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
            <div class="d-flex justify-content-between mt-2">
                <h5 class="font-weight-bold">Total</h5>
                <h5 class="font-weight-bold">{{ $total }}€</h5>
            </div>
            <button class="btn btn-block btn-primary my-3 py-3"
                    @if($isEmpty) disabled @endif
                    wire:click="goToCheckout"
            >
                Proceed To Checkout
            </button>
        </div>
    </div>
</div>
