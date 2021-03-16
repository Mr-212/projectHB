<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDueDiligenceFieldsClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedInteger('due_diligence_rent')->nullable();
            $table->boolean('due_diligence_option_payment_check')->default(0);
            $table->unsignedInteger('due_diligence_option_payment_3_month')->nullable();
            $table->unsignedInteger('due_diligence_option_payment_6_month')->nullable();
            $table->unsignedInteger('due_diligence_option_payment_12_month')->nullable();
            $table->timestamp('due_diligence_option_payment_date')->nullable();

            $table->boolean('due_diligence_inspection_check')->nullable();
            $table->timestamp('due_diligence_inspection_check_date')->nullable();
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
            $table->dropColumn('due_diligence_rent');
            $table->dropColumn('due_diligence_option_payment_check');
            $table->dropColumn('due_diligence_option_payment_3_month');
            $table->dropColumn('due_diligence_option_payment_6_month');
            $table->dropColumn('due_diligence_option_payment_12_month');
            $table->dropColumn('due_diligence_option_payment_date');

            $table->dropColumn('due_diligence_inspection_check');
            $table->dropColumn('due_diligence_inspection_check_date');
        });
    }
}
