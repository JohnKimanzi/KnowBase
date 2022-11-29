<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

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
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('national_id')->unique();
            $table->foreignId('reference_id')->constrained('references');
            $table->string('poccupation');
            $table->string('dependants');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('marital_status_id')->constrained('marital_statuses');
            $table->string('phone1')->unique();
            $table->string('phone2')->unique()->nullable();
            $table->string('personal_email')->unique();
            $table->date('dob');
            $table->integer('salary');
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
