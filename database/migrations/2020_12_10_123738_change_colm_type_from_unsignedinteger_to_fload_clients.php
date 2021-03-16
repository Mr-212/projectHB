<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColmTypeFromUnsignedintegerToFloadClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedFloat('due_diligence_rent',10,2)->change();
            $table->unsignedFloat('due_diligence_option_payment_3_month',10,2)->change();
            $table->unsignedFloat('due_diligence_option_payment_6_month',10,2)->change();
            $table->unsignedFloat('due_diligence_option_payment_12_month',10,2)->change();
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
            $table->unsignedInteger('due_diligence_rent')->nullable();
            $table->unsignedInteger('due_diligence_option_payment_3_month')->nullable();
            $table->unsignedInteger('due_diligence_option_payment_6_month')->nullable();
            $table->unsignedInteger('due_diligence_option_payment_12_month')->nullable();
        });
    }
}
