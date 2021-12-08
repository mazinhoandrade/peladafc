<?php

namespace Database\Seeders;

use App\Models\Atleta;
use App\Models\AtletaBaba;
use App\Models\Baba;
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
        // \App\Models\User::factory(10)->create();
        Baba::factory(20)->create();
        Atleta::factory(20)->create();
        AtletaBaba::factory(40)->create();
    }
}
