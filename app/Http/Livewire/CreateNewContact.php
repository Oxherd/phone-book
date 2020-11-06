<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class CreateNewContact extends Component
{
    public $name;
    public $phone_number;
    public $email;
    public $address;

    protected $rules = [
        'name' => 'required',
        'phone_number' => 'required',
        'email' => 'nullable|email',
    ];

    protected $listeners = ['submitForm' => 'store'];

    public function store()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'address' => $this->address,
        ]);

        session()->flash('message', 'You successfully created a new contact.');

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.create-new-contact');
    }
}
