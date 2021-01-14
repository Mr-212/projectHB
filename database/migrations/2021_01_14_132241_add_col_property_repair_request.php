<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColPropertyRepairRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->renameColumn('property_repair_request','repair_request_checked');
        });

        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('repair_request_checked_by')->nullable()->after('repair_request_checked');
            $table->timestamp('repair_request_checked_at')->nullable()->after('repair_request_checked_by');
            $table->string('repair_request_checked_comment')->nullable()->after('repair_request_checked_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->renameColumn('repair_request_checked','property_repair_request');
        });

        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('repair_request_checked_by');
            $table->dropColumn('repair_request_checked_at');
            $table->dropColumn('repair_request_checked_comment');
        });
    }
}
