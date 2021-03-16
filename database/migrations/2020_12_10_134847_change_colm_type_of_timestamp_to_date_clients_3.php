<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColmTypeOfTimestampToDateClients3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('property_closing_date_complete_check_date');
            $table->date('due_diligence_option_payment_date')->nullable();
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
            $table->date('property_closing_date_complete_check_date')->nullable();
            $table->dropColumn('due_diligence_option_payment_date');
        });
    }
}
