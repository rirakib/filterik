<?php

namespace Filterik\Filters;

use Illuminate\Database\Eloquent\Builder;

class StatusFilter extends BaseFilter
{
    protected string $key = 'status';

    public function apply(Builder $query, $value): Builder
    {
        if ($value !== null && $value !== '') {
            $query->where($this->key, $value);
        }
        return $query;
    }
}
