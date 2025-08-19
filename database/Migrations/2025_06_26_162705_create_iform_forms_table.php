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
        Schema::create('iform__forms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');
            $table->json('options')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('iform__forms')->onDelete('cascade');
            $table->string('system_name', 180);
            $table->boolean('active')->default(false);
            $table->text('destination_email')->nullable();
            $table->integer('form_type')->unsigned()->nullable();

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
        Schema::dropIfExists('iform__forms');
    }
};
