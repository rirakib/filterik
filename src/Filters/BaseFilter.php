<?php

namespace Filterik\Filters;

use Filterik\Contracts\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseFilter implements FilterInterface
{
    protected string $key;

    public function __construct(?string $key = null)
    {
        if ($key) {
            $this->key = $key;
        }
    }

    public function key(): string
    {
        return $this->key ?? strtolower((new \ReflectionClass($this))->getShortName());
    }

    /**
     * Apply the filter logic (must be implemented by child)
     *
     * @param Builder $query
     * @param mixed $value
     * @return Builder
     */
    abstract public function apply(Builder $query, $value): Builder;
}
