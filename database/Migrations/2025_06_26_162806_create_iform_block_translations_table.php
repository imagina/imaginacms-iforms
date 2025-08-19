<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iform__block_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->integer('block_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['block_id', 'locale']);
            $table->foreign('block_id')->references('id')->on('iform__blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iform__block_translations', function (Blueprint $table) {
            $table->dropForeign(['block_id']);
        });
        Schema::dropIfExists('iform__block_translations');
    }
};
