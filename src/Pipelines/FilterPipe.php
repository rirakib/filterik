<?php

namespace Filterik\Pipelines;

use Closure;

class FilterPipe
{
    protected string $key;
    protected $value;
    protected $callback;

    public function __construct(string $key, $value, callable $callback)
    {
        $this->key = $key;
        $this->value = $value;
        $this->callback = $callback;
    }

    public function handle($query, Closure $next)
    {
        $callback = $this->callback;
        $query = $callback($query, $this->key, $this->value);

        return $next($query);
    }
}
