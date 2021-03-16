<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAddCommentFieldsPreClosigList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_pre_closing_checklist', function (Blueprint $table) {
            $table->dropColumn('landlord_insurance_checked_at');
            $table->dropColumn('lease_signed_checked_at');
            $table->boolean('payment_option_select_checked')->nullable()->default(0)->after('rent');


            $table->string('letter_of_commitment_checked_comment')->nullable()->after('letter_of_commitment_checked_at');
            $table->string('on_boarding_fee_payment_checked_comment')->nullable()->after('on_boarding_fee_payment_checked_at');
            $table->string('inspection_checked_comment')->nullable()->after('inspection_checked_at');
            $table->string('termite_checked_comment')->nullable()->after('termite_checked_at');
            $table->string('septic_inspection_checked_comment')->nullable()->after('septic_inspection_checked_at');
            $table->string('appraisal_value_checked_comment')->nullable()->after('appraisal_value_checked_at');
            $table->string('driver_license_applicant_checked_comment')->nullable()->after('driver_license_applicant_checked_at');
            $table->string('driver_license_co_applicant_checked_comment')->nullable()->after('driver_license_co_applicant_checked_at');
            $table->string('soc_sec_card_applicant_checked_comment')->nullable()->after('soc_sec_card_applicant_checked_at');
            $table->string('soc_sec_card_co_applicant_checked_comment')->nullable()->after('soc_sec_card_co_applicant_checked_at');
            $table->string('renter_insurance_checked_comment')->nullable()->after('renter_insurance_checked_at');
            $table->string('flood_certificate_checked_comment')->nullable()->after('flood_certificate_checked_at');
            $table->string('landlord_insurance_checked_comment')->nullable()->after('landlord_insurance_checked_at');
            $table->string('warranty_checked_comment')->nullable()->after('warranty_checked_at');
            $table->string('lease_signed_checked_comment')->nullable()->after('lease_signed_checked_at');

            $table->dropColumn('payment_option');

        });

        Schema::table('client_pre_closing_checklist', function (Blueprint $table) {
            $table->timestamp('landlord_insurance_checked_at')->nullable()->after('landlord_insurance_checked_by');
            $table->timestamp('lease_signed_checked_at')->nullable()->after('lease_signed_checked_by');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_pre_closing_checklist', function (Blueprint $table) {
            $table->unsignedBigInteger('landlord_insurance_checked_at')->nullable();
            $table->unsignedBigInteger('lease_signed_checked_at')->nullable();
            $table->dropColumn('payment_option_select_checked');


            $table->dropColumn('letter_of_commitment_checked_comment');
            $table->dropColumn('on_boarding_fee_payment_checked_comment');
            $table->dropColumn('inspection_checked_comment');
            $table->dropColumn('termite_checked_comment');
            $table->dropColumn('septic_inspection_checked_comment');
            $table->dropColumn('appraisal_value_checked_comment');
            $table->dropColumn('driver_license_applicant_checked_comment');
            $table->dropColumn('driver_license_co_applicant_checked_comment');
            $table->dropColumn('soc_sec_card_applicant_checked_comment');
            $table->dropColumn('soc_sec_card_co_applicant_checked_comment');
            $table->dropColumn('renter_insurance_checked_comment');
            $table->dropColumn('flood_certificate_checked_comment');
            $table->dropColumn('landlord_insurance_checked_comment');
            $table->dropColumn('warranty_checked_comment');
            $table->dropColumn('lease_signed_checked_comment');

            $table->json('payment_option')->nullable();
        });
    }
}
