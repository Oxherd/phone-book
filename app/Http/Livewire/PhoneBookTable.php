<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class PhoneBookTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function render()
    {
        $contacts = Contact::query()
            ->where('name', 'like', "%{$this->search}%")
            ->orWhere('phone_number', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orWhere('address', 'like', "%{$this->search}%")
            ->paginate(15);

        return view('livewire.phone-book-table', compact('contacts'));
    }
}
