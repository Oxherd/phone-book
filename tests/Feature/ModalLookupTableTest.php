<?php

namespace Tests\Feature;

use App\Http\Livewire\ModalLookupTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ModalLookupTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_will_set_component_property_when_emit_swapModal_event()
    {
        Livewire::test(ModalLookupTable::class)
            ->emit('swapModal', 'contact-form')
            ->assertSet('component', 'contact-form');
    }

    /** @test */
    public function it_will_render_proper_component_if_there_is_a_valid_component_name_in_lookup_table()
    {
        Livewire::test(ModalLookupTable::class)
            ->set('component', '')
            ->emit('swapModal', 'contact-form')
            ->assertSee('Create A New Contact');
    }
}
