<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname',100);
            $table->string('lname',100);
            $table->string("gender",20);
            $table->string('phone',20);
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->string("access_token",64)->nullable();
            $table->string("is_admin")->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
