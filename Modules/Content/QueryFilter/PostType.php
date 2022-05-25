<?php


namespace Modules\Content\QueryFilter;


use Closure;

class PostType
{
    public function handle($query, Closure $next)
    {

        if(!(request()->has("type")))
        {
            return $next($query);
        }

        $type = request()->get("type");


        $builder = $next($query);

        return $builder->GetPostType($type);


    }
}
