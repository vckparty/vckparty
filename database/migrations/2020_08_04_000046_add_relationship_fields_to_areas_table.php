<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAreasTable extends Migration
{
    public function up()
    {
        Schema::table('areas', function (Blueprint $table) {
            $table->unsignedInteger('metropolitan_id');
            $table->foreign('metropolitan_id', 'metropolitan_fk_1901690')->references('id')->on('metropolitans');
        });
    }
}
