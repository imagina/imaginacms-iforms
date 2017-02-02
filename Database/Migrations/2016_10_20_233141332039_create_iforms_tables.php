<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIformsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iforms_forms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();

            // fields
            $table->string('title');
            $table->text('options')->default('')->nullable();
            $table->text('fields')->default('')->nullable();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');
        });

        Schema::create('iforms_leads', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('form_id')->unsigned();

            // fields
            $table->text('options')->default('')->nullable();
            $table->foreign('form_id')->references('id')->on('iforms_forms')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('iforms_lead_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('form_id')->unsigned();
            $table->integer('lead_id')->unsigned();

            $table->integer('field_id');

            // fields
            $table->text('value')->default('')->nullable();
            $table->foreign('form_id')->references('id')->on('iforms_forms')->onDelete('cascade');
            $table->foreign('lead_id')->references('id')->on('iforms_leads')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iforms_lead_details');
        Schema::dropIfExists('iforms_leads');
        Schema::dropIfExists('iforms_forms');


    }
}
