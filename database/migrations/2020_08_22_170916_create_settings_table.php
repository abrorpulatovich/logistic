<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name')->nullable();
            $table->string('site_company_name')->nullable();
            $table->string('site_company_definition_uz')->nullable();
            $table->string('site_company_definition_en')->nullable();
            $table->string('site_company_definition_ar')->nullable();
            $table->string('site_company_definition_ko')->nullable();
            $table->string('site_company_definition_ru')->nullable();
            $table->string('site_keywords')->nullable();
            $table->string('site_desc')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_phone1')->nullable();
            $table->string('address_uz')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ru')->nullable();
            $table->string('address_ko')->nullable();
            $table->text('site_map_address')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_twitter_address')->nullable();
            $table->string('site_facebook_address')->nullable();
            $table->string('site_gmail_address')->nullable();
            $table->string('site_likedln_address')->nullable();
            $table->string('site_pinterest_address')->nullable();
            $table->string('site_telegram_bot')->nullable();
            $table->string('site_telegram_profile')->nullable();
            $table->string('site_telegram_channel')->nullable();
            $table->string('working_hours')->nullable();
            $table->date('site_created')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
