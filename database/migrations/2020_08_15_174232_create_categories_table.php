<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->default(1);
            $table->string('name_uz');
            $table->string('name_ar');
            $table->string('name_ko');
            $table->string('name_en');
            $table->string('name_ru');
            $table->integer('status');
            $table->string('slug')->unique();
            $table->string('breadcrumb_bg_image')->nullable();
            $table->integer('c_order')->comment('Joylashish tartibi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
