<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratedCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generated_certificates', function (Blueprint $table) {
            $table->id();
            $table->string("achievement_id");
            $table->string('status');
            $table->string('verification_date')->nullable();
            $table->string('user_id')->nullable();
            $table->string('code')->unique();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('generated_certificates');
    }
}
