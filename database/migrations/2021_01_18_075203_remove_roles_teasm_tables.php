<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RemoveRolesTeasmTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('roles');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('team_user');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('role_has_permissions');
        Schema::enableForeignKeyConstraints();
        if(Schema::hasTable('client_pre_closing_checklist'))
        Schema::rename('client_pre_closing_checklist','pre_closing_checklist');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('pre_closing_checklist'))
        Schema::rename('pre_closing_checklist','client_pre_closing_checklist');
    }
}
