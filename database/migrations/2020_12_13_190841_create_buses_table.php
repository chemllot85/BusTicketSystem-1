<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('bus_code');
            $table->foreignId('route_id')->constrained('routes')->onUpdate('cascade')->onDelete('cascade');
            $table->string('source');
            $table->string('dest');
            $table->integer('total_seats');
            $table->enum('status', ['avaliable', 'not_avaliable']);
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
        Schema::dropIfExists('buses');
    }
}
