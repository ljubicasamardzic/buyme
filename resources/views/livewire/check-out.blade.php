<div>
    <div class="container-fluid">
        <div class="row mt-5 px-xl-5">
            <div class="col-12 d-flex flex-row justify-content-center">
                <p class="text-primary">Please fill out the details to complete your purchase.</p>
            </div>
        </div>

        <div class="row px-xl-5 mb-5 mt-2">
            <form class="d-flex d-row justify-content-center mb-5">
            @csrf
                <div class="col-12 col-md-4">
                    <div class="mb-4 @if($currentStep == 1) d-block @else d-none @endif">
                        <h4 class="font-weight-semi-bold mb-4">Step 1/2 - Billing Address</h4>
                        <div class="row">
                            <div class="col-12 form-group">
                                <input class="form-control @error('name') is-invalid @else mb-3 @enderror" type="text" placeholder="Full Name" autocomplete="off" wire:model="name">
                                <span class="invalid-feedback mb-2">@error('name'){{ $message }}@enderror</span>

                                <input class="form-control @error('address') is-invalid @else mb-3 @enderror" type="text" placeholder="Address" autocomplete="off" wire:model="address">
                                <span class="invalid-feedback mb-2">@error('address'){{ $message }}@enderror</span>

                                <input class="form-control @error('city') is-invalid @else mb-3 @enderror" type="text" placeholder="City" autocomplete="off" wire:model="city">
                                <span class="invalid-feedback mb-2">@error('city'){{ $message }}@enderror</span>

                                <input class="form-control @error('zip') is-invalid @else mb-3 @enderror" type="text" placeholder="ZIP Code" autocomplete="off" wire:model="zip">
                                <span class="invalid-feedback mb-2">@error('zip'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="card border-secondary @if($currentStep == 2) d-block @else d-none @endif">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Step 2/2 - Payment Details</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" wire:model="paymentMethod" id="payment-method" value=""/>
                            <div id="card-element"></div>
                        </div>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger mt-2">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="alert alert-danger d-none mt-2" id="card-error"></div>

                    <div class="@if($currentStep == 1) d-flex flex-row justify-content-end @else d-none @endif">
                        <button class="btn btn-secondary my-2 py-2" type="button" wire:click="toStepTwo">
                            Next
                        </button>
                    </div>

                    <div class="@if($currentStep == 2) d-flex justify-content-between mt-5 @else d-none @endif">
                        <button class="btn btn-secondary my-2 py-2" type="button" wire:click="toStepOne">
                            Back
                        </button>
                        <button class="btn btn-primary my-2 py-2" type="button" id="payment-button">
                            Pay {{ $total }}€
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
@endpush
@push('scripts')
    <script>
        window.addEventListener('lastStep', event => {
            var stripe = Stripe('{{ config('services.stripe.publishable_key') }}');

            var elements = stripe.elements();
            var cardElement = elements.create('card', {
                style: {
                    base: {
                        iconColor: '#AAA',
                        color: '#333',
                        fontWeight: '500',
                        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
                        fontSize: '16px',
                        fontSmoothing: 'antialiased',
                        ':-webkit-autofill': {
                            color: '#AAA',
                        },
                        '::placeholder': {
                            color: '#AAA',
                        },
                    },
                    invalid: {
                        iconColor: '#FFC7EE',
                        color: '#FFC7EE',
                    },
                },
            });

            cardElement.mount('#card-element');

            document.getElementById('payment-button').addEventListener('click', function() {
                document.getElementById('payment-button').disabled = true;
                document.getElementById('payment-button').innerHTML = `Processing <i class="fas fa-spinner fa-pulse"></i>`;
                stripe
                    .confirmCardSetup('{{ $paymentIntent->client_secret }}', {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: "{{ $user->name }}",
                            },
                        },
                    })
                    .then(function(result) {
                        if (result.error) {
                            let cardErrorDiv = document.getElementById('card-error');
                            cardErrorDiv.innerText = result.error.message;
                            cardErrorDiv.classList.remove('d-none');

                            document.getElementById('payment-button').disabled = false;
                            document.getElementById('payment-button').innerHTML = `Pay {{ $total }}€`;
                        } else {
                            @this.set('paymentMethod', result.setupIntent.payment_method);
                            @this.call('pay');
                        }
                    });
            })
        });
    </script>
@endpush
