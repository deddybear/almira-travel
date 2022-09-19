<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid as Generate;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Generate::uuid4(),
            'wa' => '6288805844337',
            'address' => 'Jalan Pandean Kidul RT.03/RW01 Banjarkemantren Kecamatan Buduran Kabupaten Sidoarjo Jawa Timur 61252 Indonesia',
            'email' => 'test@test.con',
            'gps'   =>'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31651.59464121254!2d112.67466937910159!3d-7.415420000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e32a3bea0fd7%3A0xae75042fce1d66da!2sCV.Almira%20Trans%20Tour%20%26%20Rent%20Car!5e0!3m2!1sen!2sid!4v1662779347109!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
        ];
    }
}
