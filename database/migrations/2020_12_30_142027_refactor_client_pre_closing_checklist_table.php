<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactorClientPreClosingChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_pre_closing_checklist', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable()->change();
            $table->unsignedInteger('property_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_pre_closing_checklist', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable()->change();
            $table->dropColumn('property_id');
        });
    }
}
