<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColmTypeOfTimestampToDateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->date('due_diligence_option_payment_date')->change();
            $table->date('due_diligence_inspection_check_date')->change();
            $table->date('property_closing_date_complete_check_date')->change();
            $table->date('property_due_diligence_complete_check_date')->change();
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
            $table->timestamp('due_diligence_option_payment_date')->change();
            $table->timestamp('due_diligence_inspection_check_date')->change();
            $table->timestamp('property_closing_date_complete_check_date')->change();
            $table->timestamp('property_due_diligence_complete_check_date')->change();
        });
    }
}
