<?php

namespace App\QueryFilters;
use Closure;

class ProductCategoryFilter
{
    public function handle($request, Closure $next)
    {
        if (! request()->has('category_id')) {
            return $next($request);
        }

        
        return $next($request)->where('category_id', request()->input('category_id'));
    }
}
