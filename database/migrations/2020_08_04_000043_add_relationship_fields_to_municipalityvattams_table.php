<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMunicipalityvattamsTable extends Migration
{
    public function up()
    {
        Schema::table('municipalityvattams', function (Blueprint $table) {
            $table->unsignedInteger('municipality_id');
            $table->foreign('municipality_id', 'municipality_fk_1901660')->references('id')->on('municipalities');
        });
    }
}
