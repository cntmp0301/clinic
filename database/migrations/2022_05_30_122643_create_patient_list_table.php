<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_lists', function (Blueprint $table) {
            $table->id('patient_id');
            $table->string('name');
            $table->string('nickname');
            $table->string('tel');
            $table->string('address');
            $table->string('sex');
            $table->string('age');
            $table->string('drug_allergy');
            $table->string('users_image');
            $table->string('line_id');
            $table->integer('type');
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
        Schema::dropIfExists('patient_lists');
    }
}
