<?php


namespace Modules\Content\QueryFilter;


use Closure;

class Search
{

    public function handle($query, Closure $next)
    {

        if(!(request()->has("q")))
        {
            return $next($query);
        }

        $q = request()->get("q");
        $builder = $next($query);

        return $builder->SearchPost($q);


    }

}


