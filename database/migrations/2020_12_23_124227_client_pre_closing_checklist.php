<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientPreClosingChecklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_pre_closing_checklist', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedInteger('client_id')->unique();

//            $table->json('letter_of_commitment')->nullable();
//            $table->json('on_boarding_fee_payment')->nullable();
//
//            $table->json('inspection')->nullable();
//            $table->json('termite_check')->nullable();
//            $table->json('septic_inspection')->nullable();
//            $table->json('repair_credit')->nullable();
//
//            $table->json('appraisal_value')->nullable();
//
//            $table->json('driver_license_applicant')->nullable();
//            $table->json('driver_license_co_applicant')->nullable();
//            $table->boolean('soc_sec_card_applicant')->nullable()->default(0);
//            $table->boolean('soc_sec_card_co_applicant')->nullable()->default(0);
//
//            $table->boolean('renter_insurance_check')->nullable()->default(0);
//            $table->string('renter_insurance_company_name')->nullable();
//            $table->boolean('flood_certificate_check')->nullable()->default(0);
//            $table->boolean('landlord_insurance_check')->nullable()->default(0);
//
//            $table->boolean('warranty_check')->nullable()->default(0);
//            $table->string('warranty_company_name')->nullable();
//            $table->boolean('warranty_paid_by_seller_check')->nullable()->default(0);
//
//            $table->boolean('lease_check')->nullable()->default(0);
//            $table->date('lease_expire_date')->nullable();
//
//            $table->boolean('clear_now_rent_payment_enrollment_check')->nullable()->default(0);
//
//            $table->boolean('prorated_rent_check')->nullable()->default(0);
//            $table->unsignedInteger('prorated_rent')->nullable();
//
//            $table->boolean('other_check')->nullable()->default(0);
//            $table->string('other_value')->nullable();



            //not json

            $table->boolean('letter_of_commitment_checked')->nullable()->default(0);
            $table->unsignedInteger('letter_of_commitment_checked_by')->nullable();
            $table->timestamp('letter_of_commitment_checked_at')->nullable();

            $table->boolean('on_boarding_fee_payment_checked')->nullable()->default(0);
            $table->unsignedInteger('on_boarding_fee_payment_checked_by')->nullable();
            $table->timestamp('on_boarding_fee_payment_checked_at')->nullable();

            $table->boolean('inspection_checked')->nullable()->default(0);
            $table->unsignedInteger('inspection_checked_by')->nullable();
            $table->timestamp('inspection_checked_at')->nullable();

            $table->boolean('termite_checked')->nullable()->default(0);
            $table->unsignedInteger('termite_checked_by')->nullable();
            $table->timestamp('termite_checked_at')->nullable();
            $table->boolean('termite_paid_by')->nullable()->default(0);

            $table->boolean('septic_inspection_checked')->nullable()->default(0);
            $table->unsignedInteger('septic_inspection_checked_by')->nullable();
            $table->timestamp('septic_inspection_checked_at')->nullable();

            $table->boolean('repair_credit_checked')->nullable()->default(0);
            $table->unsignedInteger('repair_credit_checked_by')->nullable();
            $table->timestamp('repair_credit_checked_at')->nullable();
            $table->string('repair_credit')->nullable();

            $table->boolean('appraisal_value_checked')->nullable()->default(0);
            $table->unsignedInteger('appraisal_value_checked_by')->nullable();
            $table->timestamp('appraisal_value_checked_at')->nullable();
            $table->unsignedInteger('appraisal_value')->nullable();

            $table->boolean('driver_license_applicant_checked')->nullable()->default(0);
            $table->unsignedInteger('driver_license_applicant_checked_by')->nullable();
            $table->timestamp('driver_license_applicant_checked_at')->nullable();

            $table->boolean('driver_license_co_applicant_checked')->nullable()->default(0);
            $table->unsignedInteger('driver_license_co_applicant_checked_by')->nullable();
            $table->timestamp('driver_license_co_applicant_checked_at')->nullable();

            $table->boolean('soc_sec_card_applicant_checked')->nullable()->default(0);
            $table->unsignedInteger('soc_sec_card_applicant_checked_by')->nullable();
            $table->timestamp('soc_sec_card_applicant_checked_at')->nullable();



            $table->boolean('soc_sec_card_co_applicant_checked')->nullable()->default(0);
            $table->unsignedInteger('soc_sec_card_co_applicant_checked_by')->nullable();
            $table->timestamp('soc_sec_card_co_applicant_checked_at')->nullable();

            $table->boolean('renter_insurance_checked')->nullable()->default(0);
            $table->unsignedInteger('renter_insurance_checked_by')->nullable();
            $table->timestamp('renter_insurance_checked_at')->nullable();
            $table->string('renter_insurance_name')->nullable();


            $table->boolean('flood_certificate_checked')->nullable()->default(0);
            $table->unsignedInteger('flood_certificate_checked_by')->nullable();
            $table->timestamp('flood_certificate_checked_at')->nullable();


            $table->boolean('landlord_insurance_checked')->nullable()->default(0);
            $table->unsignedInteger('landlord_insurance_checked_by')->nullable();
            $table->unsignedInteger('landlord_insurance_checked_at')->nullable();

            $table->boolean('warranty_check')->nullable()->default(0);
            $table->string('warranty_company_name')->nullable();
            $table->boolean('warranty_paid_by_seller_check')->nullable()->default(0);

            $table->boolean('lease_check')->nullable()->default(0);
            $table->date('lease_expire_date')->nullable();

            $table->boolean('clear_now_rent_payment_enrollment_check')->nullable()->default(0);

            $table->boolean('prorated_rent_check')->nullable()->default(0);
            $table->unsignedInteger('prorated_rent')->nullable();

            $table->boolean('other_check')->nullable()->default(0);
            $table->string('other_value')->nullable();


            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->softDeletes('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_pre_closing_checklist');
    }
}
