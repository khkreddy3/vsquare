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
            $table->bigIncrements('id');
            $table->string('memid');
            $table->string('referalid');
            $table->string('name');
            $table->string('mobile');
            $table->string('gender');
            $table->date('dob');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile');
            $table->string('accno');
            $table->string('bankname');
            $table->string('ifsccode');
            $table->string('amount');
            $table->string('paymenttype');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('panno');
            $table->string('aadharno');
            $table->date('joindate');
            $table->integer('withdraw');
            $table->date('enddate');
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
