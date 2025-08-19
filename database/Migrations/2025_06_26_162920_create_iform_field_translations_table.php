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
        Schema::create('iform__field_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('label')->index();
            $table->string('placeholder')->nullable();
            $table->string('description')->nullable();

            $table->integer('field_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['field_id', 'locale']);
            $table->foreign('field_id')->references('id')->on('iform__fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iform__field_translations', function (Blueprint $table) {
            $table->dropForeign(['field_id']);
        });
        Schema::dropIfExists('iform__field_translations');
    }
};
