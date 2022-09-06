<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Str;

class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = "Mobil Avanza Tahun 2022";
        $price = "200000";

        return [
            'id' => Generate::uuid4(),
            'collection_photos_id' => 'null',
            'name' => $name,
            'price' => $price,
            'detail' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'slug' => Str::slug($name, '-'),
        ];
    }
}
