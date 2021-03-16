<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetClientColNullableAndDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('additional_tenant_check')->nullable()->change();
            $table->boolean('rental_verification_check')->nullable()->change();
            $table->boolean('property_new_construction_check')->nullable()->change();
            $table->boolean('property_hoa_check')->nullable()->change();
            $table->boolean('property_repair_request_check')->nullable()->change();
            $table->boolean('property_lender_check')->nullable()->change();
            $table->boolean('rental_verification_complete_check')->nullable()->change();
            $table->boolean('welcome_down_payment_complete_check')->nullable()->change();
            $table->boolean('due_diligence_option_payment_check')->nullable()->change();
            $table->boolean('appraisal_value_check')->nullable()->change();
            $table->boolean('appraisal_value_check')->nullable()->change();

            $table->boolean('renter_insurance_check')->nullable()->change();
            $table->boolean('flood_certificate_check')->nullable()->change();
            $table->boolean('landloard_insurance_check')->nullable()->change();

            $table->boolean('warranty_check')->nullable()->change();
            $table->boolean('warranty_paid_by_seller_check')->nullable()->change();
            $table->boolean('lease_check')->nullable()->change();

            $table->boolean('termite_check')->nullable()->change();
            $table->boolean('termite_paid_by')->nullable()->change();

            $table->boolean('septic_inspection_check')->nullable()->change();
            $table->boolean('clear_now_rent_payment_enrollment_check')->nullable()->change();
            $table->boolean('prorated_rent_check')->nullable()->change();
            $table->boolean('other_check')->nullable()->change();
            $table->boolean('property_closing_date_complete_check')->nullable()->change();
            $table->boolean('property_due_diligence_expire_complete_check')->nullable()->change();


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
        });
    }
}
