<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_property', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedInteger('client_id')->unique();
            $table->tinyInteger('deal_save_check')->nullable()->default(0);
            $table->timestamp('deal_save_check_date')->nullable();


            $table->string('county')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();

            $table->boolean('new_construction_check')->nullable()->default(0);
            $table->string('new_construction_builder')->nullable();

            $table->unsignedInteger('purchase_price')->nullable();
            $table->unsignedInteger('closing_cost')->nullable();
            $table->unsignedInteger('closing_credit_general')->nullable();
            $table->unsignedInteger('annual_property_tax')->nullable();

            $table->boolean('hoa_check')->default(0);
            $table->string('hoa_name')->nullable();
            $table->string('hoa_phone')->nullable();
            $table->unsignedInteger('hoa_annual_fee')->nullable();

            $table->timestamp('closing_date')->nullable();
            $table->timestamp('due_diligence_expire')->nullable();

            $table->boolean('property_repair_request')->default(0);
            $table->boolean('lender_check')->default(0);
            $table->string('lender_name')->nullable();

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
        Schema::dropIfExists('client_property');
    }
}
