<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Mobil;
use App\Models\Tour;
use App\Models\Travel;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        // Tour::factory(1)->create();
        // Travel::factory(1)->create();
        // Mobil::factory(1)->create();
        // \App\Models\User::factory(10)->create();
        // Contact::factory(1)->create();
    }
}
