<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDealSaveCheckedCommentColInClientProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_property', function (Blueprint $table) {
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
        Schema::table('client_property', function (Blueprint $table) {
            $table->dropColumn('deal_save_checked_comment');
        });
    }
}
