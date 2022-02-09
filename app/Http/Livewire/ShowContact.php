<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ShowContact extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'contactStored' => 'handleStored',
        'updateContact' => 'handleContact'
    ];

    public function handleStored()
    {
        session()->flash('msg', 'Contact was created');
    }
    public function handleContact()
    {
        session()->flash('msg', 'Contact was updated');
    }
    public $paginate = 5;
    public $search;
    protected $queryString = ['search'];
    public function render()
    {
        return view('livewire.show-contact', [
            'contacts'   => Contact::where('name', 'like', '%' . $this->search . '%')->latest()->paginate($this->paginate)
        ]);
    }

    public function getContact($id)
    {
        session()->flash('statusUpdate');
        $contact = Contact::findOrfail($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrfail($id);
        $contact->delete($id);
        session()->flash('msg', 'Contact was deleted');
    }
}
