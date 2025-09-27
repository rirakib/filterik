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



