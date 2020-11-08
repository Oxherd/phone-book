<?php

namespace Tests\Feature;

use App\Http\Livewire\ActionDropdown;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ActionDropdownTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_show_on_page_if_there_is_contact_in_main_page()
    {
        Contact::factory()->create();

        $this->get('/')->assertSeeLivewire('action-dropdown');
    }

    /** @test */
    public function it_emit_swapModal_event_when_call_openEditModal_action()
    {
        $contact = Contact::factory()->create();

        Livewire::test(ActionDropdown::class, compact('contact'))
            ->call('openEditModal')
            ->assertEmitted('swapModal', 'contact-form', "['contact' => {$contact->id}]");
    }
}
