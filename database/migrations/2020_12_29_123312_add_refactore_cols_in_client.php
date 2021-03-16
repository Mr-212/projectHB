<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefactoreColsInClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            if(Schema::hasColumn('clients','welcome_down_payment_complete_check'))
            $table->renameColumn('welcome_down_payment_complete_check','welcome_payment_checked');
            if(Schema::hasColumn('clients','welcome_down_payment_complete_check_updated_by'))
            $table->renameColumn('welcome_down_payment_complete_check_updated_by','welcome_payment_checked_updated_by');
            if(Schema::hasColumn('clients','welcome_down_payment_complete_check_date'))
                $table->renameColumn('welcome_down_payment_complete_check_date','welcome_payment_checked_updated_at');
            if(!Schema::hasColumn('clients','welcome_payment_checked_comment'))
                $table->string('welcome_payment_checked_comment')->nullable()->after('welcome_down_payment_complete_check_date');
            if(Schema::hasColumn('clients','welcome_down_payment'))
                $table->renameColumn('welcome_down_payment','welcome_payment');


            if(Schema::hasColumn('clients','rental_verification_check'))
            $table->renameColumn('rental_verification_check','rental_verification_checked');

            if(Schema::hasColumn('clients','rental_verification_complete_check_updated_by'))
            $table->renameColumn('rental_verification_complete_check_updated_by','rental_verification_checked_updated_by');

            if(Schema::hasColumn('clients','rental_verification_complete_check_date'))
            $table->renameColumn('rental_verification_complete_check_date','rental_verification_checked_updated_at');

            if(!Schema::hasColumn('clients','rental_verification_checked_comment'))
                $table->string('rental_verification_checked_comment')->nullable()->after('rental_verification_complete_check_date');

            if(Schema::hasColumn('clients','rental_verification_complete_check'))
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
            //
        });
    }
}
