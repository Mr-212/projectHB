<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        UserType::truncate();
        UserType::create([
            'name' =>'Admin',
            'created_by'=> 1,
            'updated_by'=> 1,
            'source'    =>'seeder_class'
        ]);
        UserType::create([
            'name' =>'client',
            'created_by'=> 1,
            'updated_by'=> 1,
            'source'    =>'seeder_class'
        ]);
    }
}
