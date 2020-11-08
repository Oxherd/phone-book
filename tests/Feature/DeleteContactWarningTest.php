<?php

namespace Tests\Feature;

use App\Http\Livewire\DeleteContactWarning;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteContactWarningTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_show_confirmation_hint()
    {
        Livewire::test(DeleteContactWarning::class)
            ->assertSee('Are you sure want to delete?');
    }

    /** @test */
    public function it_will_delete_contact_by_call_destroy_event()
    {
        $contact = Contact::factory()->create();

        $this->assertDatabaseCount('contacts', 1);

        Livewire::test(DeleteContactWarning::class, compact('contact'))
            ->call('destroy');

        $this->assertDatabaseCount('contacts', 0);
    }

    /** @test */
    public function after_delete_contact_it_emit_refreshPhoneBookTable_event()
    {
        Livewire::test(DeleteContactWarning::class)
            ->call('destroy')
            ->assertEmitted('refreshPhoneBookTable');
    }
}
