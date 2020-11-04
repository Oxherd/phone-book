<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Arr::random([$this->faker->company, $this->faker->name]),
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
        ];
    }
}
