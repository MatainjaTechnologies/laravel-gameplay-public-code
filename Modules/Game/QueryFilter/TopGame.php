<?php


namespace Modules\Game\QueryFilter;


use Closure;

class TopGame
{
    public function handle($query, Closure $next)
    {

        // if(!(request()->has("top")))
        // {
        //     return $next($query);
        // }

        // $type = request()->get("top");


        $builder = $next($query);

        return $builder->GetTopChartGames();


    }
}
