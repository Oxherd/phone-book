<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $contact;
    public $name;
    public $phone_number;
    public $email;
    public $address;

    protected $rules = [
        'name' => 'required',
        'phone_number' => 'required',
        'email' => 'nullable|email',
    ];

    protected $listeners = [
        'store',
    ];

    public function mount(Contact $contact)
    {
        $this->contact = $contact;

        $this->fill([
            'name' => $contact->name,
            'phone_number' => $contact->phone_number,
            'email' => $contact->email,
            'address' => $contact->address,
        ]);
    }

    public function store()
    {
        $this->validate();

        Contact::updateOrCreate(
            ['id' => $this->contact->id],
            [
                'name' => $this->name,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'address' => $this->address,
            ]);

        $message = $this->contact->exists ?
        'You successfully created a new contact.' :
        'You successfully update the contact.';

        session()->flash('message', $message);

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
