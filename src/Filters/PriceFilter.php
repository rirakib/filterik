<?php

namespace Filterik\Filters;

use Illuminate\Database\Eloquent\Builder;

class PriceFilter extends BaseFilter
{
    protected string $key;
    protected string $min_key;
    protected string $max_key;

    public function __construct(string $key = "price",$min_key="min",$max_key="max")
    {
        $this->key = $key;
        $this->min_key = $min_key;
        $this->max_key = $max_key;
    }

    public function apply(Builder $query, $value): Builder
    {
        if (!is_array($value)) return $query;

        if (!empty($value[$this->min_key])) {
            $query->where($this->key, '>=', $value[$this->min_key]);
        }

        if (!empty($value[$this->max_key])) {
            $query->where($this->key, '<=', $value[$this->max_key]);
        }

        return $query;
    }
}
