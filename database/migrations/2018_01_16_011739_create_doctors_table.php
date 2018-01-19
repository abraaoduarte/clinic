<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *name,
speciality,
hospital,
address,
number_address,
zipcode,
city,
state,
country,
gender,
email,
birthday,
crm,
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birthday');
            $table->boolean('gender');
            $table->string('cpf', 14)->unique();
            $table->string('email')->unique();
            $table->string('crm')->unique();
            $table->string('speciality')->nullable();
            $table->string('hospital')->nullable();
            $table->string('address');
            $table->string('number_address', 10);
            $table->string('zipcode', 14);
            $table->string('city', 100);
            $table->string('state', 2);
            $table->string('country');
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
        Schema::dropIfExists('doctors');
    }
}
