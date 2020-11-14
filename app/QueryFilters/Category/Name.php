<?php
namespace App\QueryFilters\Category;
use App\QueryFilters\Filter;

class Name extends Filter
{
    protected $column_name = 'name';
    protected $field_name = 'name';

    protected function applyFilter($builder)
    {
        $name = request('name') ?? '';
        return $builder->where(function ($query) use ($name){
            return $query->where('name_uz', 'LIKE', '%' . $name . '%')
            	->orWhere('name_ar', 'LIKE', '%' . $name . '%')
            	->orWhere('name_ko', 'LIKE', '%' . $name . '%')
            	->orWhere('name_en', 'LIKE', '%' . $name . '%')
            	->orWhere('name_ru', 'LIKE', '%' . $name . '%');
        });
    }
}
