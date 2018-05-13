<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Keywords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('keywords', function (Blueprint $table) {
            $table->increments('uuid');
            $table->text('subject')->nullable($value = true);
            $table->text('author')->nullable($value = true);
            $table->text('category')->nullable($value = true);
            $table->text('remote_ip')->nullable($value = true);
            $table->unsignedInteger("created_at");
        });
    }

    /**
     * Reverse the migrations.s
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('keywords');
    }
}
