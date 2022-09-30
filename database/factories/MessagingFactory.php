<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid as Generate;

class MessagingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $faker = FakerFactory::create('id_ID');

        return [
            'id' => Generate::uuid4(),
            'name' => $faker->name(),
            'email' => $faker->email(),
            'wa'    => $faker->phoneNumber(),
            'msg'   => 'lorem_ipsum dolor si amet'
        ];
    }
}
