<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();
        User::create([

            'name' => 'Admin',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' =>'admin@techloyce.com',
            //'user_type_id' =>1 ,
            'password'=> Hash::make('admin123'),
            'created_by'=> 1,
            'updated_by'=> 1,
//            'source'    =>'seeder_class'
        ]);
        User::create([
            'name' => 'Client',
            'first_name' => 'client',
            'last_name' => 'client',
            'email' =>'client@techloyce.com',
            //'user_type_id' => 2 ,
            'password'=> Hash::make('client123'),
            'created_by'=> 1,
            'updated_by'=> 1,
//            'source'    => 'seeder_class',
        ]);


    }
}
