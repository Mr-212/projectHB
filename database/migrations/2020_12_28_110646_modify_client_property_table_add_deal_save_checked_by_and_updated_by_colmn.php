<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyClientPropertyTableAddDealSaveCheckedByAndUpdatedByColmn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_property', function (Blueprint $table) {
            $table->renameColumn('deal_save_check','deal_save_checked');
            $table->unsignedInteger('deal_save_checked_by')->nullable()->after('deal_save_check');
            $table->timestamp('deal_save_checked_at')->nullable()->after('deal_save_checked_by');
            $table->dropColumn('deal_save_check_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_property', function (Blueprint $table) {
            $table->timestamp('deal_save_check_date')->nullable()->after('deal_save_check');
            $table->dropColumn('deal_save_checked_by');
            $table->dropColumn('deal_save_checked_at');
        });
    }
}
