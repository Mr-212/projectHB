<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColmsFromClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {

            if(Schema::hasColumn('clients','letter_of_commitment_signed'))
                $table->dropColumn('letter_of_commitment_signed');
            if(Schema::hasColumn('clients','on_boarding_fee_payment_check'))
                $table->dropColumn('on_boarding_fee_payment_check');
            if(Schema::hasColumn('clients','property_annual_property_tax'))
            $table->dropColumn('property_annual_property_tax');
            if(Schema::hasColumn('clients','other_value'))
            $table->dropColumn('other_value');
            if(Schema::hasColumn('clients','other_check'))
            $table->dropColumn('other_check');
            if(Schema::hasColumn('clients','prorated_rent'))
            $table->dropColumn('prorated_rent');
            if(Schema::hasColumn('clients','prorated_rent_check'))
            $table->dropColumn('prorated_rent_check');
            if(Schema::hasColumn('clients','clear_now_rent_payment_enrollment_check'))
            $table->dropColumn('clear_now_rent_payment_enrollment_check');
            if(Schema::hasColumn('clients','septic_inspection_check'))
            $table->dropColumn('septic_inspection_check');
            if(Schema::hasColumn('clients','termite_paid_by'))
            $table->dropColumn('termite_paid_by');
            if(Schema::hasColumn('clients','termite_check'))
            $table->dropColumn('termite_check');
            if(Schema::hasColumn('clients','lease_expire_date'))
            $table->dropColumn('lease_expire_date');
            if(Schema::hasColumn('clients','lease_check'))
            $table->dropColumn('lease_check');
            if(Schema::hasColumn('clients','warranty_paid_by_seller_check'))
            $table->dropColumn('warranty_paid_by_seller_check');
            if(Schema::hasColumn('clients','warranty_company_name'))
            $table->dropColumn('warranty_company_name');


            if(Schema::hasColumn('clients','warranty_check'))
            $table->dropColumn('warranty_check');
            if(Schema::hasColumn('clients','landlord_insurance_check'))
            $table->dropColumn('landlord_insurance_check');
            if(Schema::hasColumn('clients','flood_certificate_check'))
            $table->dropColumn('flood_certificate_check');
            if(Schema::hasColumn('clients','renter_insurance_company_name'))
            $table->dropColumn('renter_insurance_company_name');
            if(Schema::hasColumn('clients','renter_insurance_check'))
            $table->dropColumn('renter_insurance_check');
            if(Schema::hasColumn('clients','soc_sec_card_co_applicant'))
            $table->dropColumn('soc_sec_card_co_applicant');
            if(Schema::hasColumn('clients','soc_sec_card_applicant'))
            $table->dropColumn('soc_sec_card_applicant');
            if(Schema::hasColumn('clients','driver_license_co_applicant'))
            $table->dropColumn('driver_license_co_applicant');
            if(Schema::hasColumn('clients','driver_license_applicant'))
            $table->dropColumn('driver_license_applicant');
            if(Schema::hasColumn('clients','appraisal_value'))
            $table->dropColumn('appraisal_value');
            if(Schema::hasColumn('clients','appraisal_value_check'))
            $table->dropColumn('appraisal_value_check');
            if(Schema::hasColumn('clients','due_diligence_option_payment_date'))
            $table->dropColumn('due_diligence_option_payment_date');
            if(Schema::hasColumn('clients','due_diligence_inspection_check_date'))
            $table->dropColumn('due_diligence_inspection_check_date');
            if(Schema::hasColumn('clients','due_diligence_inspection_check'))
            $table->dropColumn('due_diligence_inspection_check');
            if(Schema::hasColumn('clients','due_diligence_option_payment_12_month'))
            $table->dropColumn('due_diligence_option_payment_12_month');
            if(Schema::hasColumn('clients','due_diligence_option_payment_6_month'))
            $table->dropColumn('due_diligence_option_payment_6_month');
            if(Schema::hasColumn('clients','due_diligence_option_payment_3_month'))
            $table->dropColumn('due_diligence_option_payment_3_month');
            if(Schema::hasColumn('clients','due_diligence_option_payment_check'))
            $table->dropColumn('due_diligence_option_payment_check');
            if(Schema::hasColumn('clients','due_diligence_rent'))
            $table->dropColumn('due_diligence_rent');
            if(Schema::hasColumn('clients','property_due_diligence_expire'))
            $table->dropColumn('property_due_diligence_expire');
            if(Schema::hasColumn('clients','property_closing_date'))
            $table->dropColumn('property_closing_date');
            if(Schema::hasColumn('clients','property_due_diligence_complete_check_date'))
            $table->dropColumn('property_due_diligence_complete_check_date');
            if(Schema::hasColumn('clients','property_due_diligence_expire_complete_check_updated_by'))
            $table->dropColumn('property_due_diligence_expire_complete_check_updated_by');
            if(Schema::hasColumn('clients','property_due_diligence_expire_complete_check'))
            $table->dropColumn('property_due_diligence_expire_complete_check');
            if(Schema::hasColumn('clients','property_closing_date_complete_check_updated_by'))
            $table->dropColumn('property_closing_date_complete_check_updated_by');
            if(Schema::hasColumn('clients','property_closing_date_complete_check'))
            $table->dropColumn('property_closing_date_complete_check');
            if(Schema::hasColumn('clients','property_lender_name'))
            $table->dropColumn('property_lender_name');
            if(Schema::hasColumn('clients','property_lender_check'))
            $table->dropColumn('property_lender_check');
            if(Schema::hasColumn('clients','property_repair_request_item_names'))
            $table->dropColumn('property_repair_request_item_names');
            if(Schema::hasColumn('clients','property_repair_request_check'))
            $table->dropColumn('property_repair_request_check');
            if(Schema::hasColumn('clients','property_hoa_phone'))
            $table->dropColumn('property_hoa_phone');
            if(Schema::hasColumn('clients','property_hoa_name'))
            $table->dropColumn('property_hoa_name');
            if(Schema::hasColumn('clients','property_hoa_check'))
            $table->dropColumn('property_hoa_check');
            if(Schema::hasColumn('clients','property_closing_credit_general'))
            $table->dropColumn('property_closing_credit_general');
            if(Schema::hasColumn('clients','property_closing_cost'))
            $table->dropColumn('property_closing_cost');
            if(Schema::hasColumn('clients','property_purchase_price'))
            $table->dropColumn('property_purchase_price');
            if(Schema::hasColumn('clients','property_zip'))
            $table->dropColumn('property_zip');
            if(Schema::hasColumn('clients','property_city'))
            $table->dropColumn('property_city');
            if(Schema::hasColumn('clients','property_state'))
            $table->dropColumn('property_state');
            if(Schema::hasColumn('clients','property_country'))
            $table->dropColumn('property_country');
            if(Schema::hasColumn('clients','property_new_construction_builder_name'))
            $table->dropColumn('property_new_construction_builder_name');

            if(Schema::hasColumn('clients','property_new_construction_check'))
            $table->dropColumn('property_new_construction_check');

            if(Schema::hasColumn('clients','on_boarding_fee_payment_check'))
            $table->dropColumn('on_boarding_fee_payment_check');

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
            //
        });
    }
}
