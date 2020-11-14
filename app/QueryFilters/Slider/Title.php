<?php
namespace App\QueryFilters\Slider;
use App\QueryFilters\Filter;

class Title extends Filter
{
    protected $column_name = 'title';
    protected $field_name = 'title';

    protected function applyFilter($builder)
    {
        $title = request('title') ?? '';
        return $builder->where(function ($query) use ($title){
            return $query->where('title_uz', 'LIKE', '%' . $title . '%')
            	->orWhere('title_ar', 'LIKE', '%' . $title . '%')
            	->orWhere('title_ko', 'LIKE', '%' . $title . '%')
            	->orWhere('title_en', 'LIKE', '%' . $title . '%')
            	->orWhere('title_ru', 'LIKE', '%' . $title . '%');
        });
    }
}
