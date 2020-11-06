<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchContactField;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SearchContactFieldTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_will_show_on_main_page()
    {
        $this->get('/')->assertSeeLivewire('search-contact-field');
    }

    /** @test */
    public function it_emit_searchContact_event_when_update_search_property()
    {
        Livewire::test(SearchContactField::class)
            ->set('search', 'some data')
            ->assertEmitted('searchContact', 'some data');
    }

    /** @test */
    public function it_emit_resetSearth_event_when_resetSearch_is_called()
    {
        Livewire::test(SearchContactField::class)
            ->set('search', 'some data')
            ->call('resetSearch')
            ->assertEmitted('resetSearch');
    }
}
