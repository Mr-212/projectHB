<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColmTypeOfTimestampToDateClients2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('due_diligence_option_payment_date');
            $table->dropColumn('additional_tenant');
            $table->date('property_closing_date')->change();

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
            $table->timestamp('property_closing_date')->change();
            $table->text('additional_tenant')->nullable();
            $table->date('due_diligence_option_payment_date')->nullable();
        });
    }
}
