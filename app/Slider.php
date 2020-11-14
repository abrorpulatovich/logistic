<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Slider extends Model
{
    protected $fillable = [
        'title_uz',
        'title_ar',
        'title_ko',
        'title_en',
        'title_ru',
        'short_desc_uz',
        'short_desc_ar',
        'short_desc_ko',
        'short_desc_en',
        'short_desc_ru',
        'added_user',
        'publish_date',
        'status',
        'slug',
        'image'
    ];

    protected $attributes = [
    ];

    public function scopeActive($query) {
        return $query->where('status', 2);
    }

    public function scopeInactive($query) {
        return $query->where('status', 1);
    }

    public function title_by_lang() {
        $lang = App::getLocale();
        if ($lang == 'uz-Latn') {
            $title = 'title_uz';
        } else {
            $title = 'title_' . $lang;
        }
        return $this->$title;
    }

    public function short_desc_by_lang() {
        $lang = App::getLocale();
        if ($lang == 'uz-Latn') {
            $short_desc = 'short_desc_uz';
        } else {
            $short_desc = 'short_desc_' . $lang;
        }
        return $this->$short_desc;
    }

    public function get_status() {
        return [
            1 => __('messages.Inactive'),
            2 => __('messages.Active')
        ];
    }

    protected $casts = [
    ];

    public function getPublishDateAttribute($value)
    {
        return date('d.m.Y', strtotime($value));
    } 

    public function setPublishDateAttribute($value)
    {
        $wrong_date = explode('/', $value);
        $this->attributes['publish_date'] = $wrong_date[2] . '-' . $wrong_date[0] . '-' . $wrong_date[1];
    }
}
