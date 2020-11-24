<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClientTableClientDateCheckAndColsRename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('property_repair_request','property_repair_request_check');
            $table->string('property_repair_request_item_names')->after('property_repair_request')->nullable();
            $table->boolean('property_closing_date_complete_check')->after('property_lender_name')->default(0);
            $table->unsignedInteger('property_closing_date_complete_check_updated_by')->nullable()->after('property_closing_date_complete_check');
            $table->timestamp('property_closing_date_complete_check_date')->nullable()->after('property_closing_date_complete_check_updated_by');

            $table->boolean('property_due_diligence_complete_check')->after('property_closing_date_complete_check_date')->default(0);
            $table->unsignedInteger('property_due_diligence_complete_check_updated_by')->nullable()->after('property_due_diligence_complete_check');
            $table->timestamp('property_due_diligence_complete_check_date')->nullable()->after('property_due_diligence_complete_check_updated_by');
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
            $table->renameColumn('property_repair_request_check','property_repair_request');
            $table->dropColumn('property_repair_request_item_names');
            $table->dropColumn('property_closing_date_complete_check');
            $table->dropColumn('property_closing_date_complete_check_updated_by');
            $table->dropColumn('property_closing_date_complete_check_date');

            $table->dropColumn('property_due_diligence_complete_check');
            $table->dropColumn('property_due_diligence_complete_check_updated_by');
            $table->dropColumn('property_due_diligence_complete_check_date');
        });
    }
}
