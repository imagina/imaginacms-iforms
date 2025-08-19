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
        Schema::create('iform__form_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('success_text')->nullable();
            $table->string('submit_text')->nullable();

            $table->integer('form_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['form_id', 'locale']);
            $table->foreign('form_id')->references('id')->on('iform__forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iform__form_translations', function (Blueprint $table) {
            $table->dropForeign(['form_id']);
        });
        Schema::dropIfExists('iform__form_translations');
    }
};
