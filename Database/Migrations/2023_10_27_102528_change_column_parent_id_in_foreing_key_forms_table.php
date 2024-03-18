<?php

use Illuminate\Support\Facades\Schema;
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
    Schema::table('iforms__forms', function (Blueprint $table) {
      $table->integer('parent_id')->unsigned()->nullable()->after('options')->change();
      $table->foreign('parent_id')->references('id')->on('iforms__forms')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
  }
};
