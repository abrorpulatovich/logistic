<?php
namespace App\QueryFilters\Post;
use App\QueryFilters\Filter;
use Auth;

class Status extends Filter
{
    protected $column_name = 'status';
    protected $field_name = 'status';

    protected function applyFilter($builder)
    {
        $status = request('status') ?? '';
        return $builder->where(function ($query) use ($status) {
            return ($status) ? $query->where('status', $status): '';
        });
    }

}
