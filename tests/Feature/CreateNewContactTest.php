<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
