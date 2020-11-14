<?php
namespace App\QueryFilters\Post;
use App\QueryFilters\Filter;
use Auth;

class CategoryId extends Filter
{
    protected $column_name = 'category_id';
    protected $field_name = 'category_id';

    protected function applyFilter($builder)
    {
        $category_id = request('category_id') ?? '';
        return $builder->where(function ($query) use ($category_id){
            return ($category_id) ? $query->where('category_id', $category_id): '';
        });
    }

}
