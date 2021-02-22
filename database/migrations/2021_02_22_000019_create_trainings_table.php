<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('district');
            $table->string('assembly');
            $table->date('dob');
            $table->string('father_name');
            $table->string('gender');
            $table->string('email');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp_number');
            $table->string('youtube_channel')->nullable();
            $table->string('instagram')->nullable();
            $table->string('interested_in')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->longText('address');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
