<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store()
    {
        $contact = $this->validate([
            'name'  => 'required',
            'phone' => 'required|min:11',
        ]);
        Contact::create($contact);
        $this->resetInput();
        $this->emit('contactStored');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
