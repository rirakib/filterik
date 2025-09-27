<?php

namespace Filterik\Filters;

use Illuminate\Database\Eloquent\Builder;

class MultiSelectFilter extends BaseFilter
{
    protected string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function apply(Builder $query, $value): Builder
    {
        if (!empty($value) && is_array($value)) {
            $query->whereIn($this->key, $value);
        }

        return $query;
    }
}
