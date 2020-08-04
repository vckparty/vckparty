<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubcategoryPondicheriesTable extends Migration
{
    public function up()
    {
        Schema::table('subcategory_pondicheries', function (Blueprint $table) {
            $table->unsignedInteger('categorypondichery_id');
            $table->foreign('categorypondichery_id', 'categorypondichery_fk_1933918')->references('id')->on('category_pondicheries');
        });
    }
}
