<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPostingsTable extends Migration
{
    public function up()
    {
        Schema::table('postings', function (Blueprint $table) {
            $table->unsignedInteger('district_id');
            $table->foreign('district_id', 'district_fk_1903593')->references('id')->on('districts');
            $table->unsignedInteger('block_id')->nullable();
            $table->foreign('block_id', 'block_fk_1903594')->references('id')->on('blocks');
            $table->unsignedInteger('panchayat_id')->nullable();
            $table->foreign('panchayat_id', 'panchayat_fk_1903595')->references('id')->on('panchayats');
            $table->unsignedInteger('townpanchayat_id')->nullable();
            $table->foreign('townpanchayat_id', 'townpanchayat_fk_1903596')->references('id')->on('townpanchayats');
            $table->unsignedInteger('townvattam_id')->nullable();
            $table->foreign('townvattam_id', 'townvattam_fk_1903597')->references('id')->on('townvattams');
            $table->unsignedInteger('municipality_id')->nullable();
            $table->foreign('municipality_id', 'municipality_fk_1903598')->references('id')->on('municipalities');
            $table->unsignedInteger('municipalityvattam_id')->nullable();
            $table->foreign('municipalityvattam_id', 'municipalityvattam_fk_1903599')->references('id')->on('municipalityvattams');
            $table->unsignedInteger('metropolitan_id')->nullable();
            $table->foreign('metropolitan_id', 'metropolitan_fk_1903600')->references('id')->on('metropolitans');
            $table->unsignedInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_1903601')->references('id')->on('areas');
            $table->unsignedInteger('metrovattam_id')->nullable();
            $table->foreign('metrovattam_id', 'metrovattam_fk_1903602')->references('id')->on('metrovattams');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_1926336')->references('id')->on('categories');
            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id', 'subcategory_fk_1926337')->references('id')->on('subsubcategories');
            $table->unsignedInteger('assemblys_id');
            $table->foreign('assemblys_id', 'assemblys_fk_1926553')->references('id')->on('assemblies');
            $table->unsignedInteger('posts_id')->nullable();
            $table->foreign('posts_id', 'posts_fk_1926615')->references('id')->on('posts');
        });
    }
}
