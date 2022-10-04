<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\Address;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Manny\Manny;

class AddressComponent extends Component
{
    public $address_id, $recipient, $type, $cep, $street, $number, $complement, $reference, $district, $city, $estate, $main;
    public $new = true;
    public function render()
    {
        $user = Auth::user();
        $addresses = Address::where('user_id', $user->id)->get();
        return view('livewire.user.Profile.address-component', ['addresses' => $addresses]);

    }

    protected function rules()
    {
        return [
            'recipient' => 'required',
            'type' => 'required',
            'cep' => 'required',
            'street' => 'required',
            'number' => 'required',
            'complement' => '',
            'reference'=> '',
            'district' => 'required',
            'city' => 'required',
            'estate' => 'required',
        ];

    }
    public function updated($fields)
    {
        if($fields == 'cep')
        {
            $this->cep = strtoupper(Manny::mask($this->cep, "11111111"));
            $this->cep = Manny::stripper($this->cep, ['num']);

        }

        $this->validateOnly($fields);

    }

    public function newAddress()
    {
        $this->new = true;
        $this->validate();
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        if($this->main == true && count($addresses) >= 1){
            Address::where('user_id', Auth::user()->id)->update([
                'main' => 0,
            ]);
        }elseif(count($addresses) == 0){
            $this->main = true;
        }else{
            $this->main = false;
        }

        $address = Address::create([
            'user_id' => Auth::user()->id,
            'recipient' => $this->recipient,
            'type' => $this->type,
            'cep' => $this->cep,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'reference' => $this->reference,
            'district' => $this->district,
            'city' => $this->city,
            'estate' => $this->estate,
            'main' => $this->main,
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->resetModal();


    }

    public function showAddress($address_id)
    {

        $this->address_id = $address_id;

        $address = Address::find($address_id);

        $this->recipient = $address->recipient;
        $this->type = $address->type;
        $this->cep = $address->cep;
        $this->street = $address->street;
        $this->number = $address->number;
        $this->complement = $address->complement;
        $this->reference = $address->reference;
        $this->district = $address->district;
        $this->city = $address->city;
        $this->estate = $address->estate;
        $this->main = $address->main;
        $this->new = false;
    }

    public function updateMainButton($address_id)
    {
        //dd($address_id);
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        $address = Address::find($address_id);
        //dd($address->main);
            Address::where('user_id', Auth::user()->id)->update([
                'main' => false,
            ]);

            $address->main = true;
            $address->save();

    }

    public function editAddress()
    {


        $this->validate();
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        if($this->main == true && count($addresses) >= 1){
            Address::where('user_id', Auth::user()->id)->update([
                'main' => 0,
            ]);
        }else{
            $this->main = false;
        }
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
            'main' => $this->main,
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
        $this->type = '';
        $this->cep = '';
        $this->street = '';
        $this->number = '';
        $this->complement = '';
        $this->reference = '';
        $this->district = '';
        $this->city = '';
        $this->estate = '';
        $this->main = false;
        $this->new = true;
        $this->resetValidation();
    }

    public function searchCep()
    {
        $this->validate([
            'cep' => 'required|min:8|max:8',
        ]);
        $url = "https://viacep.com.br/ws/{$this->cep}/json/";
        $data = file_get_contents($url);
        $data = json_decode($data);
        if(isset($data->erro)){
            //dd($data);
            $this->addError('cep', 'cep invalido ou não encontrado');
            $this->street = '';
            $this->complement = '';
            $this->district = '';
            $this->city = '';
            $this->estate = '';
        }else{
        if($data != null){
            $this->street = $data->logradouro;
            $this->complement = $data->complemento;
            $this->district = $data->bairro;
            $this->city = $data->localidade;
            $this->estate = $data->uf;
        }
    }
    }

}
