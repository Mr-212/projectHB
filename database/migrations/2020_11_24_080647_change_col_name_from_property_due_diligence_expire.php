<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColNameFromPropertyDueDiligenceExpire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('property_due_diligence_complete_check','property_due_diligence_expire_complete_check');
            $table->renameColumn('property_due_diligence_complete_check_updated_by','property_due_diligence_expire_complete_check_updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('property_due_diligence_expire_complete_check','property_due_diligence_complete_check');
            $table->renameColumn('property_due_diligence_expire_complete_check_updated_by','property_due_diligence_complete_check_updated_by');

        });
    }
}
