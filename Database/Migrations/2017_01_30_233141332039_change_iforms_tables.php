<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIformsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iforms_forms', function (Blueprint $table) {

            $table->integer('user_id')->unsigned()->nullable()->change();

            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('restrict');

        });

        Schema::table('iforms_leads', function (Blueprint $table) {

            $table->dropForeign(['form_id']);
            $table->foreign('form_id')->references('id')->on('iforms_forms')->onDelete('restrict');

        });

        Schema::table('iforms_lead_details', function (Blueprint $table) {

            $table->dropForeign(['form_id']);
            $table->foreign('form_id')->references('id')->on('iforms_forms')->onDelete('restrict');


            $table->dropForeign(['lead_id']);
            $table->foreign('lead_id')->references('id')->on('iforms_leads')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('iforms_forms', function (Blueprint $table) {

            $table->integer('user_id')->unsigned()->nullable(false)->change();

            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');

        });

    }
}
