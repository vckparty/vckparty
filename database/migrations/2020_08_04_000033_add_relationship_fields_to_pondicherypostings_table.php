<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPondicherypostingsTable extends Migration
{
    public function up()
    {
        Schema::table('pondicherypostings', function (Blueprint $table) {
            $table->unsignedInteger('categorypondichery_id')->nullable();
            $table->foreign('categorypondichery_id', 'categorypondichery_fk_1926450')->references('id')->on('category_pondicheries');
            $table->unsignedInteger('subcategorypondichery_id')->nullable();
            $table->foreign('subcategorypondichery_id', 'subcategorypondichery_fk_1926451')->references('id')->on('subcategory_pondicheries');
            $table->unsignedInteger('subsubcategory_id')->nullable();
            $table->foreign('subsubcategory_id', 'subsubcategory_fk_1926452')->references('id')->on('subsubcategories');
            $table->unsignedInteger('pondicheryassembly_id')->nullable();
            $table->foreign('pondicheryassembly_id', 'pondicheryassembly_fk_1926580')->references('id')->on('pondicheryassemblies');
            $table->unsignedInteger('districtspondichery_id');
            $table->foreign('districtspondichery_id', 'districtspondichery_fk_1933953')->references('id')->on('districtspondicheries');
        });
    }
}
