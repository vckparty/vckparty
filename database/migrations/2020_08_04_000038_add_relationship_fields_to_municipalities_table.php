<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMunicipalitiesTable extends Migration
{
    public function up()
    {
        Schema::table('municipalities', function (Blueprint $table) {
            $table->unsignedInteger('district_id');
            $table->foreign('district_id', 'district_fk_1901654')->references('id')->on('districts');
        });
    }
}
