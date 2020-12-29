<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColsClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('welcome_payment_checked_updated_by','welcome_payment_checked_by');
            $table->renameColumn('welcome_payment_checked_updated_at','welcome_payment_checked_at');

            $table->renameColumn('rental_verification_checked_updated_by','rental_verification_checked_by');
            $table->renameColumn('rental_verification_checked_updated_at','rental_verification_checked_at');

            $table->removeColumn('rental_verification_complete_check');
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
            $table->renameColumn('welcome_payment_checked_by','welcome_payment_checked_updated_by');
            $table->renameColumn('welcome_payment_checked_at','welcome_payment_checked_updated_at');

            $table->renameColumn('rental_verification_checked_by','rental_verification_checked_updated_by');
            $table->renameColumn('rental_verification_checked_at','rental_verification_checked_updated_at');

            $table->boolean('rental_verification_complete_check')->nullable()->default(0);

        });
    }
}
