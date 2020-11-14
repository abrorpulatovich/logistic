<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'name_uz',
        'name_ar',
        'name_ko',
        'name_en',
        'name_ru',
        'status',
        'c_order',
        'slug',
        'breadcrumb_bg_image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function scopeActive($query) {
        return $query->where('status', 2);
    }

    public function scopeInactive($query) {
        return $query->where('status', 1);
    }

    public function name_by_lang() {
        $lang = App::getLocale();
        if ($lang == 'uz-Latn') {
            $name = 'name_uz';
        } else {
            $name = 'name_' . $lang;
        }
        return $this->$name;
    }

    public function get_status() {
        return [
            1 => __('messages.Inactive'),
            2 => __('messages.Active')
        ];
    }

    protected $casts = [
        // 'created_at' => 'datetime:d.m.Y H:i:s',
        // 'updated_at' => 'datetime:d.m.Y H:i:s'
    ];

    public function child() {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }

    public function parent() {
        return $this->hasOne('App\Category', 'id', 'parent_id');
    }
}
