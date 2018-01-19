<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->integer('number_address');
            $table->string('zipcode', 11);
            $table->date('birthday');
            $table->string('city', 100);
            $table->string('state', 2);
            $table->string('country');
            $table->string('cpf', 15)->unique();
            $table->string('rg', 15)->unique();
            $table->text('description')->nullable();
            $table->boolean('gender');
            $table->string('phone')->nullable();
            $table->boolean('smoker');
            $table->boolean('alcoholic');
            $table->string('bloodtype', 10)->nullable();
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
        Schema::dropIfExists('patients');
    }
}
