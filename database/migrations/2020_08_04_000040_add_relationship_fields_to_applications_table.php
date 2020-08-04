<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedInteger('applying_post_id');
            $table->foreign('applying_post_id', 'applying_post_fk_1902692')->references('id')->on('posts');
            $table->unsignedInteger('district_id');
            $table->foreign('district_id', 'district_fk_1902694')->references('id')->on('districts');
            $table->unsignedInteger('block_id')->nullable();
            $table->foreign('block_id', 'block_fk_1902695')->references('id')->on('blocks');
            $table->unsignedInteger('municipality_id')->nullable();
            $table->foreign('municipality_id', 'municipality_fk_1902696')->references('id')->on('municipalities');
            $table->unsignedInteger('townpanchayat_id')->nullable();
            $table->foreign('townpanchayat_id', 'townpanchayat_fk_1902697')->references('id')->on('townpanchayats');
            $table->unsignedInteger('metropolitan_id')->nullable();
            $table->foreign('metropolitan_id', 'metropolitan_fk_1902698')->references('id')->on('metropolitans');
            $table->unsignedInteger('panchayat_id')->nullable();
            $table->foreign('panchayat_id', 'panchayat_fk_1903263')->references('id')->on('panchayats');
            $table->unsignedInteger('townvattam_id')->nullable();
            $table->foreign('townvattam_id', 'townvattam_fk_1903264')->references('id')->on('townvattams');
            $table->unsignedInteger('municipalityvattam_id')->nullable();
            $table->foreign('municipalityvattam_id', 'municipalityvattam_fk_1903265')->references('id')->on('municipalityvattams');
            $table->unsignedInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_1903266')->references('id')->on('areas');
            $table->unsignedInteger('metrovattam_id')->nullable();
            $table->foreign('metrovattam_id', 'metrovattam_fk_1903267')->references('id')->on('metrovattams');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_1916877')->references('id')->on('categories');
            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id', 'subcategory_fk_1916878')->references('id')->on('subcategories');
            $table->unsignedInteger('assemblys_id');
            $table->foreign('assemblys_id', 'assemblys_fk_1926551')->references('id')->on('assemblies');
        });
    }
}
