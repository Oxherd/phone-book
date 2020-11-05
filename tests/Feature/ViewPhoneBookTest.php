<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewPhoneBookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_view_contactable_from_main_page()
    {
        $contactable = Contact::factory()->create();

        $this->get('/')
            ->assertSee($contactable->name)
            ->assertSee($contactable->phone_number)
            ->assertSee($contactable->email)
            ->assertSee($contactable->address);
    }

    /** @test */
    public function it_can_view_contactable_by_paginated()
    {
        Contact::factory()->count(20)->create();

        $shouldSee = Contact::first();
        $shouldNotSee = Contact::orderByDesc('id')->first();

        $this->get('/')
            ->assertSee($shouldSee->name)
            ->assertDontSee($shouldNotSee->name);

        $this->get('/?page=2')
            ->assertSee($shouldNotSee->name)
            ->assertDontSee($shouldSee->name);
    }

    /** @test */
    public function it_is_searchable_by_query_string()
    {
        $searchTarget = Contact::factory()->create(['name' => 'search me']);
        $notTarget = Contact::factory()->create(['name' => 'not me']);

        $this->get('/?search=search me')
            ->assertSee($searchTarget->name)
            ->assertDontSee($notTarget->name);
    }
}
