<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('social_medias')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->string('youtube_channel')->nullable();
            $table->string('instagram')->nullable();
            $table->string('current_post')->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->string('mother');
            $table->string('father');
            $table->string('marrital_status');
            $table->string('husband_wife_name')->nullable();
            $table->string('education');
            $table->string('profession');
            $table->string('join_date')->nullable();
            $table->longText('permanent_address');
            $table->longText('communication_address');
            $table->string('social_category')->nullable();
            $table->string('payment_status');
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
