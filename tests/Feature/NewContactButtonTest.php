<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewContactButtonTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_be_see_on_main_page()
    {
        $this->get('/')->assertSeeLivewire('new-contact-button');
    }
}
