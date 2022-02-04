<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{

    public $name;
    public $phone;
    public $contactId;

    protected $listeners = [
        'getContact' => 'showContact',
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }

    public function update()
    {
        $validateData = $this->validate([
            'name'  => 'required',
            'phone' => 'required|min:11',
        ]);
        $contact = Contact::findOrfail($this->contactId);
        $contact->update($validateData);
        $this->resetInput();
        $this->emit('updateContact');
        session()->flash('msg', 'Contact was updated');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
