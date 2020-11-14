<?php
namespace App\QueryFilters\Partner;
use App\QueryFilters\Filter;

class Name extends Filter
{
    protected $column_name = 'name';
    protected $field_name = 'name';

    protected function applyFilter($builder)
    {
        $name = request('name') ?? '';
        return $builder->where(function ($query) use ($name){
            return $query->where('name', 'LIKE', '%' . $name . '%');
        });
    }
}
