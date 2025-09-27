<?php

namespace Filterik\Filters;

use Illuminate\Database\Eloquent\Builder;

class SearchFilter extends BaseFilter
{
    protected array $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public function key(): string
    {
        return 'search';
    }

    public function apply(Builder $query, $value): Builder
    {
        if (!$value) return $query;

        $query->where(function ($q) use ($value) {
            foreach ($this->columns as $column) {
                $q->orWhere($column, 'LIKE', "%{$value}%");
            }
        });

        return $query;
    }
}
