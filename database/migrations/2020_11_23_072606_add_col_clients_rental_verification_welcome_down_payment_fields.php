<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColClientsRentalVerificationWelcomeDownPaymentFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('rental_verification_complete_check')->default(0)->after('rental_verification_check');
            $table->unsignedInteger('rental_verification_complete_check_updated_by')->after('rental_verification_complete_check')->nullable();
            $table->timestamp('rental_verification_complete_check_date')->after('rental_verification_complete_check_updated_by')->nullable();

            $table->boolean('welcome_down_payment_complete_check')->default(0)->after('welcome_down_payment');
            $table->unsignedInteger('welcome_down_payment_complete_check_updated_by')->after('welcome_down_payment_complete_check')->nullable();
            $table->timestamp('welcome_down_payment_complete_check_date')->after('welcome_down_payment_complete_check_updated_by')->nullable();


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
            $table->dropColumn('welcome_down_payment_complete_check');
            $table->dropColumn('welcome_down_payment_complete_check_updated_by');
            $table->dropColumn('welcome_down_payment_complete_check_date');

            $table->dropColumn('rental_verification_complete_check');
            $table->dropColumn('rental_verification_complete_check_updated_by');
            $table->dropColumn('rental_verification_complete_check_date');
        });
    }
}
