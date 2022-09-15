<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\Address;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AddressComponent extends Component
{
    public $address_id, $recipient, $cep, $street, $number, $complement, $reference, $district, $city, $estate;
    public function render()
    {
        $user = Auth::user();
        $addresses = Address::where('user_id', $user->id)->get();
        return view('livewire.user.profile.address-component', ['addresses' => $addresses]);

    }

    protected $rules = [
        'recipient' => 'required',
        'cep' => 'required',
        'street' => 'required',
        'number' => 'required',
        'complement' => '',
        'reference'=> '',
        'district' => 'required',
        'city' => 'required',
        'estate' => 'required',
    ];

    public function updatedCep()
    {
        $url = "https://viacep.com.br/ws/{$this->cep}/json/";
        $data = file_get_contents($url);
        $data = json_decode($data);

        if($data != null){
            $this->street = $data->logradouro;
            $this->complement = $data->complemento;
            $this->district = $data->bairro;
            $this->city = $data->localidade;
            $this->estate = $data->uf;
        }

    }

    public function newAddress()
    {
        $this->validate();

        Address::create([
            'user_id' => Auth::user()->id,
            'recipient' => $this->recipient,
            'cep' => $this->cep,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'reference' => $this->reference,
            'district' => $this->district,
            'city' => $this->city,
            'estate' => $this->estate,
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->resetModal();


    }

    public function showAddress($address_id)
    {
        $this->address_id = $address_id;

        $address = Address::find($address_id);

        $this->recipient = $address->recipient;
        $this->cep = $address->cep;
        $this->street = $address->street;
        $this->number = $address->number;
        $this->complement = $address->complement;
        $this->reference = $address->reference;
        $this->district = $address->district;
        $this->city = $address->city;
        $this->estate = $address->estate;

    }

    public function editAddress()
    {
        $this->validate();

        $address = Address::where('id', $this->address_id)->update([
            'recipient' => $this->recipient,
            'cep' => $this->cep,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'reference' => $this->reference,
            'district' => $this->district,
            'city' => $this->city,
            'estate' => $this->estate,
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->resetModal();


    }

    public function deleteAddress($address_id)
    {
        $this->address_id = $address_id;
    }

    public function destroyAddress()
    {
        Address::where('id', $this->address_id)->delete();
        $this->dispatchBrowserEvent('close-modal');

    }

    public function resetModal()
    {
        $this->recipient = '';
        $this->cep = '';
        $this->street = '';
        $this->number = '';
        $this->complement = '';
        $this->reference = '';
        $this->district = '';
        $this->city = '';
        $this->estate = '';
    }
}
