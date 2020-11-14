<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title_uz');
            $table->string('title_ar');
            $table->string('title_ko');
            $table->string('title_en');
            $table->string('title_ru');

            $table->text('short_desc_uz');
            $table->text('short_desc_ar');
            $table->text('short_desc_ko');
            $table->text('short_desc_en');
            $table->text('short_desc_ru');

            $table->text('desc_uz');
            $table->text('desc_ar');
            $table->text('desc_ko');
            $table->text('desc_en');
            $table->text('desc_ru');

            $table->integer('added_user')->nullable();
            $table->date('publish_date');
            $table->tinyInteger('status');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->integer('view_count')->default(0);
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
        Schema::dropIfExists('pages');
    }
}
