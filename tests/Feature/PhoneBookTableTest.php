<?php

namespace Tests\Feature;

use App\Http\Livewire\PhoneBookTable;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PhoneBookTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function main_page_can_see_phone_book_table_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('phone-book-table');
    }

    /** @test */
    public function it_will_show_contacts_information()
    {
        $contact = Contact::factory()->create();

        Livewire::test('phone-book-table')
            ->assertSee($contact->name)
            ->assertSee($contact->phone_number)
            ->assertSee($contact->email)
            ->assertSee($contact->address);
    }

    /** @test */
    public function it_can_search_and_show_specific_data()
    {
        $searchTarget = Contact::factory()->create(['name' => 'search me']);
        $notTarget = Contact::factory()->create(['name' => 'not me']);

        Livewire::test(PhoneBookTable::class)
            ->set('search', $searchTarget->name)
            ->assertSee($searchTarget->name)
            ->assertDontSee($notTarget->name);
    }

    /** @test */
    public function it_reset_pagination_after_updated_search_property()
    {
        Livewire::test(PhoneBookTable::class)
            ->set('page', 2)
            ->assertSet('page', 2)
            ->set('search', 'random search')
            ->assertSet('page', 1);
    }

    /** @test */
    public function it_reset_search_property_after_called_resetSearch_action()
    {
        $notInSearch = Contact::factory()->create(['name' => 'not me']);

        Livewire::test(PhoneBookTable::class)
            ->set('search', 'search me')
            ->assertDontSee($notInSearch->name)
            ->call('resetSearch')
            ->assertSet('search', '')
            ->assertSee($notInSearch->name);
    }
}
