<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_company_name',
        'site_keywords',
        'site_desc',
        'site_phone',
        'site_phone1',
        'address_uz',
        'address_ar',
        'address_en',
        'address_ru',
        'address_ko',
        'site_email',
        'site_twitter_address',
        'site_facebook_address',
        'site_gmail_address',
        'site_likedln_address',
        'site_pinterest_address',
        'site_telegram_bot',
        'site_telegram_profile',
        'site_telegram_channel',
        'site_map_address',
        'site_created',
        'site_company_definition_uz',
        'site_company_definition_ar',
        'site_company_definition_ko',
        'site_company_definition_en',
        'site_company_definition_ru',
        'working_hours'
    ];

    protected $casts = [
        'site_created' => 'date:d.m.Y'
    ];

    public function getDefinitionAttribute()
    {
        $locale = App::getLocale();
        $column = "site_company_definition_" . $locale;
        
        if ($locale == 'uz-Latn') {
            $column = "site_company_definition_uz";
        }
        return $this->{$column};
    }

    public function getAddressAttribute()
    {
        $locale = App::getLocale();
        $column = "address_" . $locale;
        
        if ($locale == 'uz-Latn') {
            $column = "address_uz";
        }
        return $this->{$column};
    }
}
