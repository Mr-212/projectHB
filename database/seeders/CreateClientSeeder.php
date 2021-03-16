<?php

namespace Database\Seeders;

use App\Models\Client;
use Database\Factories\ClientFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CreateClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Client::factory(50)->create();

    }
}
