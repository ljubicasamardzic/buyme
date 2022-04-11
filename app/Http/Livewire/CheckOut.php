<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use \Illuminate\Support\Collection;

class CheckOut extends Component
{
    public $paymentMethod;
    public $currentStep = 1;
    public $name;
    public $city;
    public $zip;
    public $address;

    public function mount()
    {
       $this->paymentMethod = "";
       $this->currentStep = 1;
       $this->name = "";
       $this->city = "";
       $this->zip = "";
       $this->address = "";
    }

    public function render()
    {
        $total = Cart::total();
        $user = auth()->user();
        $paymentIntent = $user->createSetupIntent();

        return view('livewire.check-out', compact('total', 'user', 'paymentIntent'));
    }

    public function toStepOne()
    {
        $this->currentStep = 1;
    }

    public function toStepTwo()
    {
        $this->resetErrorBag();
        $this->validateData();

        $this->currentStep = 2;

        // on this event we initialise Stripe on the frontend
        $this->dispatchBrowserEvent('lastStep');
    }

    public function validateData()
    {
        $this->validate([
            'name'=>'required|string',
            'city'=>'required|string',
            'address'=>'required|string',
            'zip'=>'required|min:3'
        ]);
    }

    public function pay()
    {
        $user = auth()->user();

        $order = Order::create(['user_id' => $user->id]);
        $items = new Collection();

        foreach(Cart::content() as $row) {

            $items->push(
                new OrderItem([
                    'product_id' => $row->id,
                    'quantity' => $row->qty,
                    'price' => $row->price
                ])
            );
        }

        $order->items()->saveMany($items);

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($this->paymentMethod);
            $user->charge(Cart::total() * 100, $this->paymentMethod);
            $order->update(['paid_at' => now()]);
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('lastStep');

            return back()->with(['error' => $ex->getMessage()]);
        }

        Cart::destroy();

        $this->dispatchBrowserEvent('lastStep');

        alert()->success('Success','Your payment has been successfully processed!');

        return redirect()->route('home');
    }
}
