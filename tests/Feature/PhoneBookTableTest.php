<?php

namespace Tests\Feature;

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
}
