<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPondicheryapplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('pondicheryapplications', function (Blueprint $table) {
            $table->unsignedInteger('categorypondichery_id')->nullable();
            $table->foreign('categorypondichery_id', 'categorypondichery_fk_1926440')->references('id')->on('category_pondicheries');
            $table->unsignedInteger('subcategorypondichery_id')->nullable();
            $table->foreign('subcategorypondichery_id', 'subcategorypondichery_fk_1926441')->references('id')->on('subcategory_pondicheries');
            $table->unsignedInteger('pondicheryassemblys_id')->nullable();
            $table->foreign('pondicheryassemblys_id', 'pondicheryassemblys_fk_1926552')->references('id')->on('pondicheryassemblies');
            $table->unsignedInteger('subsubcategory_id')->nullable();
            $table->foreign('subsubcategory_id', 'subsubcategory_fk_1931776')->references('id')->on('subsubcategories');
            $table->unsignedInteger('districtspondichery_id')->nullable();
            $table->foreign('districtspondichery_id', 'districtspondichery_fk_1931777')->references('id')->on('districtspondicheries');
        });
    }
}
