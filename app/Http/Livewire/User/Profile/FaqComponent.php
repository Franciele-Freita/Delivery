<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\Faq;
use Livewire\Component;

class FaqComponent extends Component
{
    public function render()
    {
        $faqs = Faq::where('user_type', 'user')->get();
        return view('livewire.user.profile.faq-component', ['faqs' => $faqs]);
    }
}
