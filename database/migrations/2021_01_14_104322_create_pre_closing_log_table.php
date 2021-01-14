<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreClosingLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_closing_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pre_closing_id')->nullable();
            $table->unsignedBigInteger('property_id')->nullable();
            $table->string('action_type')->nullable();
            $table->json('original_data')->nullable();
            $table->json('new_data')->nullable();
            $table->json('changes')->nullable();

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_closing_logs');
    }
}
