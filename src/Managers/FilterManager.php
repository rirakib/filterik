<?php

namespace Filterik\Managers;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Contracts\Foundation\Application;

class FilterManager
{
    protected Application $app;
    protected $model;
    protected array $filters = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function model(string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function filters(array $filters): self
    {
        $this->filters = $filters;
        return $this;
    }

    public function apply()
    {
        if (!$this->model) {
            throw new \Exception("No model set for Filterik FilterManager");
        }

        $query = ($this->model)::query();
        $pipes = $this->resolveFilters($this->filters);

        $query = app(Pipeline::class)
            ->send($query)
            ->through($pipes)
            ->thenReturn();

        return $query;
    }

    protected function resolveFilters(array $filters): array
    {
        return collect($filters)->map(function ($filter, $requestKey) {
            return function ($query, $next) use ($filter, $requestKey) {
                if ($filter instanceof \Filterik\Contracts\FilterInterface) {
                    $value = request($requestKey);
                    $query = $filter->apply($query, $value);
                } elseif ($filter !== null && $filter !== '') {
                    $query->where($requestKey, $filter);
                }
                return $next($query);
            };
        })->toArray();
    }


    public function applyFiltersToQuery($query, array $filters)
    {
        $pipes = $this->resolveFilters($filters);
        foreach ($pipes as $pipe) {
            $query = $pipe($query, fn($q) => $q);
        }
        return $query;
    }
}
