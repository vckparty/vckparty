<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPanchayatsTable extends Migration
{
    public function up()
    {
        Schema::table('panchayats', function (Blueprint $table) {
            $table->unsignedInteger('block_id');
            $table->foreign('block_id', 'block_fk_1901629')->references('id')->on('blocks');
        });
    }
}
