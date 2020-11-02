<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('father_name');
            $table->string('educational_qualification');
            $table->string('block_area_town_vattam');
            $table->string('district');
            $table->string('state');
            $table->string('country');
            $table->string('current_post')->nullable();
            $table->string('profession')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp_number');
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }
}
