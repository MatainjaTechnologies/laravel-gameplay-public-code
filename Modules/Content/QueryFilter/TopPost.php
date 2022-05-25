<?php


namespace Modules\Content\QueryFilter;


use Closure;

class TopPost
{
    public function handle($query, Closure $next)
    {

        if(!(request()->has("top")))
        {
            return $next($query);
        }

        $type = request()->get("top");


        $builder = $next($query);

        return $builder->GetTopApps();


    }
}
