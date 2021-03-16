<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropertySoldByAsoldAtColInProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('sold_price_entered_by')->nullable()->after('sold_date');
            $table->timestamp('sold_price_entered_at')->nullable()->after('sold_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('sold_price_entered_by');
            $table->dropColumn('sold_price_entered_at');
        });
    }
}
