<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name');
            $table->string('applicant_email');
            $table->string('applicant_phone')->nullable();
            $table->string('partner_name')->nullable();
            $table->string('partner_email')->nullable();
            $table->string('partner_phone')->nullable();
            $table->string('co_applicant_name')->nullable();
            $table->string('co_applicant_email')->nullable();
            $table->string('co_applicant_phone')->nullable();
            $table->boolean('additional_tenant_check')->default(0);
            $table->string('additional_tenant_name')->nullable();
            $table->string('welcome_down_payment')->nullable();
            $table->string('mortgage_type')->nullable();
            $table->unsignedInteger('mortgage_type_id')->nullable();
            $table->boolean('rental_verification_check')->default(0);

            $table->boolean('property_new_construction_check')->default(0);
            $table->string('property_new_construction_builder_name')->nullable();
            $table->string('property_country')->nullable();
            $table->string('property_state')->nullable();
            $table->string('property_city')->nullable();
            $table->unsignedInteger('property_zip')->nullable();
            $table->unsignedInteger('property_purchase_price')->nullable();
            $table->unsignedInteger('property_closing_cost')->nullable();
            $table->unsignedInteger('property_closing_credit_general')->nullable();
            $table->boolean('property_hoa_check')->default(0);
            $table->string('property_hoa_name')->nullable();
            $table->string('property_hoa_phone')->nullable();
            $table->boolean('property_repair_request')->default(0);
            $table->boolean('property_lender_check')->default(0);
            $table->string('property_lender_name')->nullable();
            $table->timestamp('property_closing_date')->nullable();
            $table->timestamp('property_due_diligence_expire')->nullable();

            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('clients');
    }
}
