<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
       // User::truncate();
        Schema::enableForeignKeyConstraints();

        User::updateOrCreate(['email' =>'super-admin@dreamamerica.com'],[

            'name' => 'Super Admin',
            'first_name' => 'super',
            'last_name' => 'admin',
            'email' =>'super-admin@dreamamerica.com',
            'password'=> Hash::make('super-admin123'),
            'created_by'=> 1,
            'updated_by'=> 1,
            'is_active'=> 1,

        ]);
//
        User::updateOrCreate(['email' =>'admin@dreamamerica.com'],[

            'name' => 'Admin',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' =>'admin@dreamamerica.com',

            'password'=> Hash::make('admin123'),
            'created_by'=> 1,
            'updated_by'=> 1,
            'is_active'=> 1,
        ]);
//
//        User::updateOrCreate(['email' =>'user@dreamamerica.com'],[
//
//            'name' => 'User',
//            'first_name' => 'user',
//            'last_name' => 'user',
//            'email' =>'user@dreamamerica.com',
//            'password'=> Hash::make('user123'),
//            'created_by'=> 1,
//            'updated_by'=> 1,
//            'is_active'=> 1,
//        ]);

//        User::updateOrCreate(['email' =>'admin@techloyce.com'],[
//
//            'name' => 'Techloyce Admin',
//            'first_name' => 'admin',
//            'last_name' => 'admin',
//            'email' =>'admin@techloyce.com',
//            'password'=> Hash::make('admin123'),
//            'created_by'=> 1,
//            'updated_by'=> 1,
//            'is_active'=> 1,
////            'source'    =>'seeder_class'
//        ]);
//        User::updateOrCreate(['email' =>'user@techloyce.com'],[
//            'name' => 'Client',
//            'first_name' => 'client',
//            'last_name' => 'client',
//            'email' =>'user@techloyce.com',
//            //'user_type_id' => 2 ,
//            'password'=> Hash::make('user123'),
//            'created_by'=> 1,
//            'updated_by'=> 1,
//            'is_active'=> 1,
////            'source'    => 'seeder_class',
//        ]);

        User::updateOrCreate(['email' =>'chris@dreamamerica.com'],[
            'name' => 'Chris',
            'first_name' => 'Chris',
            'last_name' => '',
            'email' =>'chris@dreamamerica.com',
            //'user_type_id' => 2 ,
            'password'=> Hash::make('chris123'),
            'created_by'=> 1,
            'updated_by'=> 1,
            'is_active'=> 1,
//            'source'    => 'seeder_class',
        ]);

        User::updateOrCreate(['email' =>'kemp@dreamamerica.com'],[
            'name' => 'Kemp',
            'first_name' => 'Kemp',
            'last_name' => '',
            'email' =>'kemp@dreamamerica.com',
            //'user_type_id' => 2 ,
            'password'=> Hash::make('kemp123'),
            'created_by'=> 1,
            'updated_by'=> 1,
            'is_active'=> 1,
//            'source'    => 'seeder_class',
        ]);

        User::updateOrCreate(['email' =>'daniel@dreamamerica.com'],[
            'name' => 'Daniel',
            'first_name' => 'Daniel',
            'last_name' => '',
            'email' =>'daniel@dreamamerica.com',
            //'user_type_id' => 2 ,
            'password'=> Hash::make('daniel123'),
            'created_by'=> 1,
            'updated_by'=> 1,
            'is_active'=> 1,
//            'source'    => 'seeder_class',
        ]);


    }
}
