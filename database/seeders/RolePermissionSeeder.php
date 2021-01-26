<?php

namespace Database\Seeders;

use App\Constants\GeneralConstants;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        Permission::UpdateOrCreate(['name' => 'update']);
        Permission::UpdateOrCreate(['name' => 'delete']);
        Permission::UpdateOrCreate(['name' => 'read']);
        Permission::UpdateOrCreate(['name' => 'create']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::UpdateOrCreate(['name' => GeneralConstants::ADMIN]);
        $role->syncPermissions(Permission::all());

        $role = Role::UpdateOrCreate(['name' => GeneralConstants::SUPER_ADMIN]);
        $role->syncPermissions(Permission::all());

        $role = Role::UpdateOrCreate(['name' => GeneralConstants::USER])
            ->givePermissionTo('read');


        if(User::where('email','super-admin@dreamamerica.com')->exists()){
            $user = User::where('email','super-admin@dreamamerica.com')->first();
            $user->assignRole(GeneralConstants::SUPER_ADMIN);
        }

        if(User::where('email','admin@dreamamerica.com')->exists()){
            $user = User::where('email','admin@dreamamerica.com')->first();
            $user->assignRole(GeneralConstants::ADMIN);
        }
        if(User::where('email','user@dreamamerica.com')->exists()){
            $user = User::where('email','user@dreamamerica.com')->first();
            $user->assignRole(GeneralConstants::USER);
        }
         if(User::where('email','admin@techloyce.com')->exists()){
             $user = User::where('email','admin@techloyce.com')->first();
             $user->assignRole(GeneralConstants::ADMIN);
         }
         if(User::where('email','user@techloyce.com')->exists()){
             $user = User::where('email','user@techloyce.com')->first();
             $user->assignRole(GeneralConstants::USER);
         }

         if(User::where('email','daniel@dreamamerica.com')->exists()){
             $user = User::where('email','daniel@dreamamerica.com')->first();
             $user->assignRole(GeneralConstants::USER);
         }

    }
}
