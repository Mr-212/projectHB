<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClientLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_logs', function (Blueprint $table) {
            $table->renameColumn('old_data','original_data');
            $table->renameColumn('values_changed','changes');
            $table->unsignedInteger('updated_by')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_logs', function (Blueprint $table) {
            $table->renameColumn('original_data','old_data');
            $table->renameColumn('changes','values_changed');
            $table->timestamp('updated_by')->change();
        });
    }
}
