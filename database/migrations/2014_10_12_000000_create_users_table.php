<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->increments('id');
          $table->string('first_name');
          $table->string('last_name')->nullable();
          $table->string('phone_no')->nullable();
          $table->string('email')->unique();
          $table->string('password');
          $table->string('city')->nullable();
          $table->string('country')->nullable();
          $table->text('address');
          $table->unsignedTinyInteger('status')->default(0)->comment('0=Inactive|1=Active|2=Ban');
          $table->string('ip_address')->nullable();
          $table->string('avatar')->nullable();
          $table->text('shipping_address')->nullable();

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
