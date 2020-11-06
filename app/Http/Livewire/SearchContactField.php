<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchContactField extends Component
{
    public $search;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatedSearch($search)
    {
        $this->search = $search;

        $this->emit('searchContact', $search);
    }

    public function resetSearch()
    {
        $this->reset('search');

        $this->emit('resetSearch');
    }

    public function render()
    {
        return view('livewire.search-contact-field');
    }
}
