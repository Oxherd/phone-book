<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateNewContact;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateNewContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function main_page_will_show_create_new_contact_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('create-new-contact');
    }

    /** @test */
    public function it_can_create_a_new_contact_by_provide_needed_data()
    {
        $data = Contact::factory()->make();

        $this->assertDatabaseCount('contacts', 0);

        Livewire::test(CreateNewContact::class)
            ->set('name', $data->name)
            ->set('phone_number', $data->phone_number)
            ->set('email', $data->email)
            ->set('address', $data->address)
            ->call('store')
            ->assertRedirect('/');

        $this->assertDatabaseHas('contacts', $data->toArray());
    }

    /** @test */
    public function must_provide_name_and_phone_number_in_order_to_create_a_new_contact()
    {
        Livewire::test(CreateNewContact::class)
            ->set('name', 'only name')
            ->call('store')
            ->assertHasErrors(['phone_number']);

        $this->assertDatabaseCount('contacts', 0);

        Livewire::test(CreateNewContact::class)
            ->set('phone_number', '09123456789')
            ->call('store')
            ->assertHasErrors(['name']);

        $this->assertDatabaseCount('contacts', 0);
    }

    /** @test */
    public function if_present_email_it_must_valid_format()
    {
        Livewire::test(CreateNewContact::class)
            ->set('name', 'John')
            ->set('phone_number', '09123456789')
            ->set('email', 'not valid email@not_valid')
            ->call('store')
            ->assertHasErrors('email');

        $this->assertDatabaseCount('contacts', 0);
    }
}
