<?php


namespace Modules\Game\QueryFilter;


use Closure;

class Active
{
    public function handle($query, Closure $next)
    {




        $builder = $next($query);

        return $builder->ActiveStatus();


    }
}
