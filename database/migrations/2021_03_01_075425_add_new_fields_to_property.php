<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->decimal('repair_credit',12,2)->nullable()->after('annual_property_tax');
            $table->decimal('gross_monthly_rent',12,2)->nullable()->after('hoa_annual_fee');
            $table->decimal('annual_insurance_fee',12,2)->nullable()->after('hoa_annual_fee');
            $table->decimal('net_monthly_rent',12,2)->nullable()->after('hoa_annual_fee');
            $table->decimal('yield',12,2)->nullable()->after('hoa_annual_fee');
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
            $table->dropColumn('repair_credit');
            $table->dropColumn('gross_monthly_rent');
            $table->dropColumn('annual_insurance_fee');
            $table->dropColumn('net_monthly_rent');
            $table->dropColumn('yield');
        });
    }
}
