<?php

namespace App\Http\Livewire;

use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

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
        $user = User::find(1);
        $paymentIntent = $user->createSetupIntent();

        return view('livewire.check-out', compact('total', 'user', 'paymentIntent'));
    }

    public function toStepOne()
    {
        $this->currentStep = 1;
    }

    public function toStepTwo()
    {
        $this->currentStep = 2;
        $this->dispatchBrowserEvent('lastStep');
//        dd($this->currentStep);
    }
}
