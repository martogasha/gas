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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('due_date')->nullable();
            $table->string('location')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('idno')->nullable();
            $table->integer('role');
            $table->integer('payment_method')->nullable();
            $table->string('phone')->unique();
            $table->string('password');
            $table->integer('dashboard')->nullable();
            $table->integer('orders')->nullable();
            $table->integer('customers')->nullable();
            $table->integer('mpesa')->nullable();
            $table->integer('cash')->nullable();
            $table->integer('stock')->nullable();

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
