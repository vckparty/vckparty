<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictpostingsTable extends Migration
{
    public function up()
    {
        Schema::create('districtpostings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('applied_post')->nullable();
            $table->string('current_post')->nullable();
            $table->string('district')->nullable();
            $table->string('assembly_name')->nullable();
            $table->string('social_division')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->string('join_year')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('marrital_status')->nullable();
            $table->longText('permanent_address')->nullable();
            $table->longText('communication_address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->longText('payment_status')->nullable();
            $table->string('husband_wife_name')->nullable();
            $table->string('email')->nullable();
            $table->boolean('selected')->default(0)->nullable();
            $table->string('selected_post')->nullable();
            $table->string('photo_1')->nullable();
            $table->string('receipt_1')->nullable();
            $table->string('receipt_2')->nullable();
            $table->string('receipt_3')->nullable();
            $table->string('document_1')->nullable();
            $table->string('document_2')->nullable();
            $table->string('document_3')->nullable();
            $table->string('document_4')->nullable();
            $table->string('document_5')->nullable();
            $table->string('document_6')->nullable();
            $table->string('document_7')->nullable();
            $table->string('document_8')->nullable();
            $table->string('document_9')->nullable();
            $table->string('document_10')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
