<?php

namespace Filterik\Filters;

use Illuminate\Database\Eloquent\Builder;

class DateRangeFilter extends BaseFilter
{
    protected string $key = 'created_at';

    public function apply(Builder $query, $value): Builder
    {
        if (!is_array($value) || count($value) !== 2) {
            return $query;
        }

        [$start, $end] = $value;

        return $query->whereBetween($this->key, [$start, $end]);
    }
}
