<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledsInClientsModify extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('landloard_insurance_check','landlord_insurance_check');
            $table->unsignedInteger('property_annual_property_tax')->nullable();
            $table->boolean('on_boarding_fee_payment_check')->nullable()->default(0);
            $table->boolean('letter_of_commitment_signed')->nullable()->default(0);
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
            $table->renameColumn('landlord_insurance_check','landloard_insurance_check');
            $table->dropColumn('property_annual_property_tax');
            $table->dropColumn('on_boarding_fee_payment_check');
            $table->dropColumn('letter_of_commitment_signed');

        });
    }
}
