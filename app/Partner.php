<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'opinion',
        'added_user',
        'status',
        'slug',
        'image',
        'official_site'
    ];

    protected $attributes = [
    ];

    public function getRouteKeyName() {
        return 'id';
    }

    public function scopeActive($query) {
        return $query->where('status', 2);
    }

    public function scopeInactive($query) {
        return $query->where('status', 1);
    }

    public function get_status() {
        return [
            1 => __('messages.Inactive'),
            2 => __('messages.Active')
        ];
    }

    protected $casts = [
    ];
}
