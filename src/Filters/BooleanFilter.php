<?php

namespace Filterik\Filters;

use Illuminate\Database\Eloquent\Builder;

class BooleanFilter extends BaseFilter
{
    protected string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function apply(Builder $query, $value): Builder
    {
        if ($value !== null) {
            $query->where($this->key, (bool) $value);
        }
        return $query;
    }
}
