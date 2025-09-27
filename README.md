# Filterik

## Project Overview

**Filterik** is a dynamic, customizable filtering package for Laravel (10/11/12).  
It allows developers to apply filters on Eloquent models easily using objects and pipelines.  
It supports DB-level filtering and Meilisearch (optional).

### Key Features:

- Dynamic filters for common use-cases: Status, Price, DateRange, Boolean, MultiSelect, Search
- Fully request-aware (GET / POST)
- Works on Eloquent models via a simple trait `HasFilterik`
- Supports large datasets using pipeline-based filtering
- Easy to extend with custom filters

### Who is this for:

- Laravel developers who want reusable, structured filtering
- Projects with large datasets and multiple filter conditions
- Developers who want to separate **filter logic** from controllers

## Installation

Install using composer

```bash
composer require filterik/filterik
```

## Usage

```php
#use trait inside model
use Filterik\Traits\HasFilterik;

class Product extends Model
{
    use HasFilterik;
}

#code example 

Route::get('products', function (Request $request) {
    $filters = [
        'status'      => new StatusFilter(),
        'price'       => new PriceFilter(),
        'created_at'  => new DateRangeFilter('created_at'),
        'is_featured' => new BooleanFilter('is_featured'),
        'category_id' => new BooleanFilter('category_id'),
    ];

    $products = Product::filterik($filters)->get();
    return response()->json($products);
});

```

##Available filter 
-- Boolean Filter
BooleanFilter is designed to filter Eloquent query results based on true/false values in a specific column. It is very handy for flags like is_featured, is_active, published, etc.


-- DateRangeFilter
-- MultiselectFilter
-- PriceFilter
-- SearchFilter
-- StatusFilter

