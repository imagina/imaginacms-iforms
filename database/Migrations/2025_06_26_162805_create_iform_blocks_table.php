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
        Schema::create('iform__blocks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('sort_order')->unsigned()->nullable()->default(0);
            $table->integer('form_id')->unsigned()->nullable();
            $table->foreign('form_id')->references('id')->on('iform__forms')->onDelete('cascade');
            $table->json('options')->nullable();
            $table->string('name')->nullable();

            // Audit fields
            $table->timestamps();
            $table->auditStamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iform__blocks');
    }
};
