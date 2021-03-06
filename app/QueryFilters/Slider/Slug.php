<?php
namespace App\QueryFilters\Slider;
use App\QueryFilters\Filter;

class Slug extends Filter
{
    protected $column_name = 'slug';
    protected $field_name = 'slug';

    protected function applyFilter($builder)
    {
        $slug = request('slug') ?? '';
        return $builder->where(function ($query) use ($slug) {
            return $query->where('slug', 'LIKE', '%' . $slug . '%');
        });
    }
}
