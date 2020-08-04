<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubsubcategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('subsubcategories', function (Blueprint $table) {
            $table->unsignedInteger('subcategorypondichery_id');
            $table->foreign('subcategorypondichery_id', 'subcategorypondichery_fk_1926060')->references('id')->on('subcategory_pondicheries');
        });
    }
}
