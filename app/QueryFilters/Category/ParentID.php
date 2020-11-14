<?php
namespace App\QueryFilters\Category;
use App\QueryFilters\Filter;
use Auth;

class ParentID extends Filter
{
    protected $column_name = 'parent_id';
    protected $field_name = 'parent_id';

    protected function applyFilter($builder)
    {
        $parent_id = request('parent_id') ?? '';
        return $builder->where(function ($query) use ($parent_id){
            return ($parent_id) ? $query->where('parent_id', $parent_id): '';
        });
    }

}
