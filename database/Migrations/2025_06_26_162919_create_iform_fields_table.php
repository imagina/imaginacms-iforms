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
        Schema::create('iform__fields', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('type')->index();
            $table->string('system_name')->nullable();
            $table->boolean('required')->nullable()->default(false);
            $table->json('selectable')->nullable();
            $table->integer('order')->unsigned()->default(0);
            $table->json('suffix')->nullable();
            $table->json('prefix')->nullable();
            $table->integer('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('iform__forms')->onDelete('cascade');
            $table->string('system_type')->nullable();
            $table->string('visibility')->nullable()->default('full');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('iform__fields')->onDelete('cascade');
            $table->integer('width')->unsigned()->default(12);
            $table->integer('block_id')->unsigned()->nullable();
            $table->foreign('block_id')->references('id')->on('iform__blocks')->onDelete('cascade');
            $table->json('options')->nullable();
            $table->json('rules')->nullable();

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
        Schema::dropIfExists('iform__fields');
    }
};
