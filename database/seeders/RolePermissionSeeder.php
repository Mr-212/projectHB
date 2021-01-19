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

        Permission::UpdateOrCreate(['name' => 'edit']);
        Permission::UpdateOrCreate(['name' => 'delete']);
        Permission::UpdateOrCreate(['name' => 'read']);
        Permission::UpdateOrCreate(['name' => 'create']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::UpdateOrCreate(['name' => GeneralConstants::ADMIN]);
        $role->givePermissionTo(Permission::all());

        $role = Role::UpdateOrCreate(['name' => GeneralConstants::SUPER_ADMIN]);
        $role->givePermissionTo(Permission::all());

        $role = Role::UpdateOrCreate(['name' => GeneralConstants::USER])
            ->givePermissionTo('read');


        if(User::where('email','admin@techloyce.com')->exists()){
            $role = Role::where('name',GeneralConstants::SUPER_ADMIN)->first();
            $user = User::where('email','admin@techloyce.com')->first();
            DB::table('role_users')->updateOrInsert(['user_id'=>$user->id,'role_id'=>$role->id]);

        }

        if(User::where('email','admin@techloyce.com')->exists()){
            $role = Role::where('name',GeneralConstants::ADMIN)->first();
            $user = User::where('email','admin@techloyce.com')->first();
//            DB::table('role_users')->updateOrInsert(['user_id'=>$user->id,'role_id'=>$role->id]);
            $user->assignRole(GeneralConstants::ADMIN);

        }
        if(User::where('email','client@techloyce.com')->exists()){
            $role = Role::where('name',GeneralConstants::USER)->first();
            $user = User::where('email','client@techloyce.com')->first();
            $user->assignRole(GeneralConstants::USER);
//            DB::table('role_users')->updateOrInsert(['user_id'=>$user->id,'role_id'=>$role->id]);

        }

    }
}
