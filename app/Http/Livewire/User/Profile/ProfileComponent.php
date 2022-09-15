<?php

namespace App\Http\Livewire\User\Profile;

use Livewire\Component;

class ProfileComponent extends Component
{
    public $tab = 'purchases';
    public function render()
    {
        return view('livewire.user.profile.profile-component');
    }

    protected $listeners = ['tab'];

    public function tab($item)
    {
        $this->tab = $item;

        //dd($this->tab);
    }
}
