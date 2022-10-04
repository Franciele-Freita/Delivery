<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Manny\Manny;

class RegistrationComponent extends Component
{
    public $email, $password, $name, $birth_date, $cpf, $celphone, $telphone, $genre, $edit = false;

    public function mount()
    {

    }
    public function render()
    {
        return view('livewire.user.profile.registration-component');
    }

    protected function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'birth_date' => 'required',
            'cpf' => 'required',
            'celphone' => 'required',
            'telphone' => 'required',
            'genre' => 'required',
        ];

    }


    public function updated($fields)
    {
        $this->validateOnly($fields);
        //dd($this->validate());

        if($fields == 'birth_date')
        {
          $this->birth_date = Manny::mask($this->birth_date, "11/11/1111");

        }
        if($fields == 'cpf')
        {
            $this->cpf = Manny::mask($this->cpf, "111.111.111-11");

        }
        if($fields == 'celphone')
        {
            $this->celphone = Manny::mask($this->celphone, "(11) 11111-1111");

        }
        if($fields == 'telphone')
        {
            $this->telphone = Manny::mask($this->telphone, "(11) 1111-1111");

        }

    }
    public function showDetails()
    {
        $this->edit = True;
        $this->email = auth()->user()->email;
        $this->password = mb_strimwidth(auth()->user()->password, 0, 8, "");
        $this->name = auth()->user()->name;
        $this->cpf =Manny::mask(auth()->user()->AdditionalData->cpf, "111.111.111-11");
        $this->birth_date = Carbon::parse(auth()->user()->AdditionalData->birth_date)
        ->format('d/m/Y');
        $this->celphone = Manny::mask(auth()->user()->AdditionalData->celphone, "(11) 11111-1111");
        $this->telphone = Manny::mask(auth()->user()->AdditionalData->telphone, "(11) 1111-1111");
        $this->genre = auth()->user()->AdditionalData->genre;
    }

    public function resetModal()
    {
        $this->title = '';
        $this->content = '';
        $this->user_type = '';
    }

    public function updateData()
    {
        $validatedData = $this->validate();

        dd($validatedData);
    }
}
