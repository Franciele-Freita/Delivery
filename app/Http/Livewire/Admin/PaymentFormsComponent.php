<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithFileUploads;

class PaymentFormsComponent extends Component
{
    use WithFileUploads;
    public $image, $name;
    public function render()
    {
        return view('livewire.admin.payment-forms-component', ['payments' => $payments = Payment::all()]);
    }
    public function savePayment()
    {

        $payment = Payment::create([
            'name' => $this->name,
            'image' => $this->image->store('paymentform', 'public'),
        ]);
    }

}
