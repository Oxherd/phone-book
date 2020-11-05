<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class PhoneBookTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $contacts = Contact::paginate(15);

        return view('livewire.phone-book-table', compact('contacts'));
    }
}
