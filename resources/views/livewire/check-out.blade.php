<div>
    <div class="container-fluid pt-5">
            <div class="row px-xl-5 mb-5">
                <form wire:submit.prevent="submit()" class="d-flex d-row justify-content-center mb-5">
                @csrf
                    <div class="col-12 col-md-4">
                        <div class="mb-4 @if($currentStep == 1) d-block @else d-none @endif">
                            <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <input class="form-control mb-2" type="text" placeholder="Full Name" autocomplete="off" wire:model="name">
                                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>

                                    <input class="form-control mb-2" type="text" placeholder="Address" autocomplete="off" wire:model="address">
                                    <span class="text-danger">@error('address'){{ $message }}@enderror</span>

                                    <input class="form-control mb-2" type="text" placeholder="City" autocomplete="off" wire:model="city">
                                    <span class="text-danger">@error('city'){{ $message }}@enderror</span>

                                    <input class="form-control" type="text" placeholder="ZIP Code" autocomplete="off" wire:model="zip">
                                    <span class="text-danger">@error('zip'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>

                        <div class="card border-secondary mb-5 @if($currentStep == 2) d-block @else d-none @endif">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Payment Details</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" wire:model="paymentMethod" id="payment-method" value=""/>
                                <div id="card-element"></div>
                            </div>
                            <div class="alert alert-danger d-none" id="card-error"></div>
                        </div>

                        <div class="@if($currentStep == 1) d-flex flex-row justify-content-end @else d-none @endif">
                            <button class="btn btn-secondary my-2 py-2" type="button" wire:click="toStepTwo">
                                Next
                            </button>
                        </div>

                        <div class="@if($currentStep == 2) d-flex justify-content-between mt-2 @else d-none @endif">
                            <button class="btn btn-secondary my-2 py-2" type="button" wire:click="toStepOne">
                                Back
                            </button>
                            <button class="btn btn-primary my-2 py-2" type="submit" id="payment-button">
                                Pay {{ $total }}€
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
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
        });

        document.getElementById('payment-button').addEventListener('click', function() {
            document.getElementById('payment-button').disabled = true;
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
                    } else {
                        @this.set('paymentMethod', result.setupIntent.payment_method);
                        @this.call('pay');
                    }
                });
        })

    </script>
@endpush
