<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class DeleteContactWarning extends Component
{
    public $contact;

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function destroy()
    {
        $this->contact->delete();

        session()->flash('message', 'You successfully delete a contact.');

        $this->emit('refreshPhoneBookTable');
    }

    public function render()
    {
        return view('livewire.delete-contact-warning');
    }
}
