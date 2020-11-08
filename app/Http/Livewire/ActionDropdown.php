<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ActionDropdown extends Component
{
    public $contact;

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function openEditModal()
    {
        $this->emit('swapModal', 'contact-form', "['contact' => {$this->contact->id}]");
    }

    public function openDeleteModal()
    {
        $this->emit('swapModal', 'delete-contact-warning', "['contact' => {$this->contact->id}]");
    }

    public function render()
    {
        return view('livewire.action-dropdown');
    }
}
