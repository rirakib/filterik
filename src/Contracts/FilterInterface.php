<?php

namespace Filterik\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    /**
     * Apply filter to the query builder
     *
     * @param Builder $query
     * @param mixed $value
     * @return Builder
     */
    public function apply(Builder $query, $value): Builder;

    /**
     * Return filter key name (e.g., 'status', 'transaction_id')
     *
     * @return string
     */
    public function key(): string;
}
