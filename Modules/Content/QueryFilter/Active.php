<?php


namespace Modules\Content\QueryFilter;


use Closure;

class Active
{
    public function handle($query, Closure $next)
    {




        $builder = $next($query);

        return $builder->ActivePost();


    }
}
