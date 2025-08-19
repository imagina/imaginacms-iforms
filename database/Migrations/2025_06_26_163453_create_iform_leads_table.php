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
        Schema::create('iform__leads', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('iform__forms')->onDelete('cascade');
            $table->text('values')->nullable();
            $table->integer('assigned_to_id')->unsigned()->nullable();
            $table->foreign('assigned_to_id')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');

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
        Schema::dropIfExists('iform__leads');
    }
};
