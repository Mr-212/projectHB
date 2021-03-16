<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChanheClientProprtyTableToProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_property', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable()->change();
        });
        Schema::rename('client_property','properties');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_property', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable()->change();
        });
        Schema::rename('properties','client_property',);
    }
}
