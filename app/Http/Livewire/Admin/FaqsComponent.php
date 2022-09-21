<?php

namespace App\Http\Livewire\Admin;

use App\Models\Faq;
use Livewire\Component;

class FaqsComponent extends Component
{
    public $title, $content, $user_type;
    public function render()
    {
        return view('livewire.admin.faqs-component')->layout('layouts.admin');
    }

    protected function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required|max:400',
            'user_type' => 'required',
        ];

    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function resetModal()
    {
        $this->title = '';
        $this->content = '';
        $this->user_type = '';
    }
    public function save()
    {
        $validatedData = $this->validate();
        Faq::create($validatedData);
        $this->resetModal();
    }
}
