<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->uuid('event_id')->primary();
            $table->integer('event_type_id');
            $table->uuid('sec_user_id')->nullable();
            $table->json('metadata')->before('created_at')->nullable();
            $table->timestamps();

            $table->foreign('event_type_id')->references('event_type_id')->on('event_type');
            $table->foreign('sec_user_id')->references('sec_user_id')->on('sec_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
