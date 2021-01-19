<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledsPreClosingChecklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_closing_checklist', function (Blueprint $table) {
            $table->boolean('welcome_payment_checked')->nullable()->default(0)->after('id');
            $table->unsignedInteger('welcome_payment_checked_by')->nullable()->after('welcome_payment_checked');
            $table->timestamp('welcome_payment_checked_at')->nullable()->after('welcome_payment_checked_by');
            $table->string('welcome_payment_checked_comment')->nullable()->after('welcome_payment_checked_at');

            $table->boolean('rental_verification_checked')->nullable()->default(0)->after('welcome_payment_checked_comment');
            $table->unsignedInteger('rental_verification_checked_by')->nullable()->after('rental_verification_checked');
            $table->timestamp('rental_verification_checked_at')->nullable()->after('rental_verification_checked_by');
            $table->string('rental_verification_checked_comment')->nullable()->after('rental_verification_checked_at');

            $table->boolean('deal_save_checked')->nullable()->default(0)->after('rental_verification_checked_comment');
            $table->unsignedInteger('deal_save_checked_by')->nullable()->after('deal_save_checked');
            $table->timestamp('deal_save_checked_at')->nullable()->after('deal_save_checked_by');
            $table->string('deal_save_checked_comment')->nullable()->after('deal_save_checked_at');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pre_closing_checklist', function (Blueprint $table) {
            $table->dropColumn('welcome_payment_checked');
            $table->dropColumn('welcome_payment_checked_by');
            $table->dropColumn('welcome_payment_checked_at');
            $table->dropColumn('welcome_payment_checked_comment');

            $table->dropColumn('rental_verification_checked');
            $table->dropColumn('rental_verification_checked_by');
            $table->dropColumn('rental_verification_checked_at');
            $table->dropColumn('rental_verification_checked_comment');

            $table->dropColumn('deal_save_checked');
            $table->dropColumn('deal_save_checked_by');
            $table->dropColumn('deal_save_checked_at');
            $table->dropColumn('deal_save_checked_comment');


        });
    }
}
