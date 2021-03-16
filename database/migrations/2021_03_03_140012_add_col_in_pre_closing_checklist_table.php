<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColInPreClosingChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_closing_checklist', function (Blueprint $table) {
            $table->decimal('total_payment_options',12,2)->after('rent')->nullable();

            $table->boolean('monthly_payment_option_checked')->after('lease_expire_date')->nullable()->default(0);
            $table->decimal('monthly_payment_option_checked_amount',12,2)->after('lease_expire_date')->nullable();
            $table->unsignedInteger('monthly_payment_option_checked_by')->nullable()->after('lease_expire_date');
            $table->timestamp('monthly_payment_option_checked_at')->nullable()->after('lease_expire_date');
            $table->string('monthly_payment_option_checked_comment')->nullable()->after('lease_expire_date');
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
            $table->dropColumn('total_payment_options');
            $table->dropColumn('monthly_payment_option_checked');
            $table->dropColumn('monthly_payment_option_checked_amount');
            $table->dropColumn('monthly_payment_option_checked_by');
            $table->dropColumn('monthly_payment_option_checked_at');
            $table->dropColumn('monthly_payment_option_checked_comment');
        });
    }
}
