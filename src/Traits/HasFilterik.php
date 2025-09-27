<?php

namespace Filterik\Traits;

use Filterik\Managers\FilterManager;

trait HasFilterik
{
    /**
     * Apply filters to the model via scope
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterik($query, array $filters)
    {
        $manager = app(FilterManager::class)
            ->model($this->getModel())
            ->filters($filters);

        return $manager->applyFiltersToQuery($query, $filters);
    }

    // helper to get model class
    protected function getModel()
    {
        return get_class($this);
    }
}
