<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegistrationComponent extends Component
{
    public $email, $password, $name, $birth_date, $cpf, $celphone, $telphone, $genre;

    public function mount()
    {

        /*$this->email = auth()->user()->email;
        $this->password = mb_strimwidth(auth()->user()->password, 0, 8, "");
        $this->name = auth()->user()->name;
        $this->cpf = auth()->user()->AdditionalData->cpf;
        $this->birth_date = Carbon::parse(auth()->user()->AdditionalData->birth_date)
        ->format('d/m/Y');
        $this->celphone = auth()->user()->AdditionalData->celphone;
        $this->telphone = auth()->user()->AdditionalData->telphone;
        $this->genre = auth()->user()->AdditionalData->genre; */
    }
    public function render()
    {
        $this->email = auth()->user()->email;
        $this->password= auth()->user()->password;
        $this->name= auth()->user()->name;
        $this->birth_date= auth()->user()->AdditionalData->birth_date;
        $this->cpf= auth()->user()->AdditionalData->cpf;
        $this->celphone= auth()->user()->AdditionalData->celphone;
        $this->telphone= auth()->user()->AdditionalData->telphone;
        $this->genre= auth()->user()->AdditionalData->genre;

        return view('livewire.user.profile.registration-component', ['data' => auth()->user()]);
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
    }
    public function showDetails()
    {
        $this->email = auth()->user()->email;
        $this->password = mb_strimwidth(auth()->user()->password, 0, 8, "");
        $this->name = auth()->user()->name;
        $this->cpf = auth()->user()->AdditionalData->cpf;
        $this->birth_date = Carbon::parse(auth()->user()->AdditionalData->birth_date)
        ->format('d/m/Y');
        $this->celphone = auth()->user()->AdditionalData->celphone;
        $this->telphone = auth()->user()->AdditionalData->telphone;
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
       dd($this->validate());
    }
}
