<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMetrovattamsTable extends Migration
{
    public function up()
    {
        Schema::table('metrovattams', function (Blueprint $table) {
            $table->unsignedInteger('area_id');
            $table->foreign('area_id', 'area_fk_1901717')->references('id')->on('areas');
        });
    }
}
