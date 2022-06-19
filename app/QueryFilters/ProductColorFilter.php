<?php

namespace App\QueryFilters;
use Closure;


class ProductColorFilter
{
    public function handle($request, Closure $next)
    {
        if (! request()->has('color')) {
            return $next($request);
        }


        return $next($request)->whereHas('attributes', function ($query) {
           $query->whereIn('value', request()->input('color'));
        });
    }
}
