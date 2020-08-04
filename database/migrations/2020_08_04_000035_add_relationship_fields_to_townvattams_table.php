<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTownvattamsTable extends Migration
{
    public function up()
    {
        Schema::table('townvattams', function (Blueprint $table) {
            $table->unsignedInteger('townpanchayat_id');
            $table->foreign('townpanchayat_id', 'townpanchayat_fk_1901648')->references('id')->on('townpanchayats');
        });
    }
}
