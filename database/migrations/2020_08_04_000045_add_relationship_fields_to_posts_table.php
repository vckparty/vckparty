<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id', 'subcategory_fk_1902670')->references('id')->on('subcategories');
        });
    }
}
