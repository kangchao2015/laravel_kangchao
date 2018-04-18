<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_infos', function (Blueprint $table) {
            $table->increments('uuid');
            $table->bigInteger('id')->default(-1);
            $table->integer('seats_taken')->default(-1);
            $table->float('feedback_score')->default(-1);
            $table->integer('fee_original_price')->default(-1);
            $table->unsignedInteger('starts_at')->nullable($value = true);
            $table->mediumText('outline')->nullable($value = true)	;
            $table->text('subject')->nullable($value = true)	;
            $table->char('tags_0_name')->nullable($value = true)	;
            $table->mediumText('description')->nullable($value = true)	;
            $table->text('speaker_member_name')->nullable($value = true)	;
            $table->mediumText('speaker_member_headline')->nullable($value = true)	;
            $table->mediumText('speaker_description')->nullable($value = true)	;

            $table->unsignedInteger("updated_at");
            $table->unsignedInteger("created_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_infos');
    }
}
