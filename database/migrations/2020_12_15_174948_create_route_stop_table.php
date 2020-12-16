<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteStopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_stop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained('routes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('stop_id')->constrained('stops')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('route_stop');
    }
}
