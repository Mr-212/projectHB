<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientPreClosingChecklistInitColms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('appraisal_value_check')->default(0);
            $table->unsignedInteger('appraisal_value')->nullable();

            $table->string('driver_license_applicant')->nullable();
            $table->string('driver_license_co_applicant')->nullable();
            $table->string('soc_sec_card_applicant')->nullable();
            $table->string('soc_sec_card_co_applicant')->nullable();

            $table->boolean('renter_insurance_check')->default(0);
            $table->string('renter_insurance_company_name')->nullable();
            $table->boolean('flood_certificate_check')->default(0);
            $table->boolean('landloard_insurance_check')->default(0);

            $table->boolean('warranty_check')->default(0);
            $table->string('warranty_company_name')->nullable();
            $table->boolean('warranty_paid_by_seller_check')->default(0);

            $table->boolean('lease_check')->default(0);
            $table->date('lease_expire_date')->nullable();

            $table->boolean('termite_check')->default(0);
            $table->boolean('termite_paid_by')->default(0);

            $table->boolean('septic_inspection_check')->default(0);
            $table->boolean('clear_now_rent_payment_enrollment_check')->default(0);

            $table->boolean('prorated_rent_check')->default(0);
            $table->unsignedInteger('prorated_rent')->nullable();

            $table->boolean('other_check')->default(0);
            $table->string('other_value')->nullable();




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
            $table->dropColumn('appraisal_value_check');
            $table->dropColumn('appraisal_value');

            $table->dropColumn('driver_license_applicant');
            $table->dropColumn('driver_license_co_applicant');
            $table->dropColumn('soc_sec_card_applicant');
            $table->dropColumn('soc_sec_card_co_applicant');

            $table->dropColumn('renter_insurance_check');
            $table->dropColumn('renter_insurance_company_name');
            $table->dropColumn('flood_certificate_check');
            $table->dropColumn('landloard_insurance_check');

            $table->dropColumn('warranty_check');
            $table->dropColumn('warranty_company_name');
            $table->dropColumn('warranty_paid_by_seller_check');

            $table->dropColumn('lease_check');
            $table->dropColumn('lease_expire_date');

            $table->dropColumn('termite_check');
            $table->dropColumn('termite_paid_by');

            $table->dropColumn('septic_inspection_check');
            $table->dropColumn('clear_now_rent_payment_enrollment_check');

            $table->dropColumn('prorated_rent_check');
            $table->dropColumn('prorated_rent');

            $table->dropColumn('other_check');
            $table->dropColumn('other_value');
        });
    }
}
