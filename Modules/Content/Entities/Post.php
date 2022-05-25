<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';


    protected $fillable = ['uuid','name','category_id','rating','description','is_home','image','file','post_type','application_type','top_chart','application_platform','created_at','updated_at','post'];

    protected $keyType = 'string';



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function media(){
        return $this->hasOne('Modules\Media\Entities\Media');
    }

    public  function scopeActivePost($query)
    {
        $query->where('status', 1);
    }

    public  function scopeSearchPost($query,$q)
    {


        $query->where('name', 'LIKE', '%'.$q.'%')

            ->orWhere('description', 'LIKE', '%'.$q.'%');
    }

    public  function scopeGetApplicationType($query,$type)
    {
        $query->where('Application_type', $type);
    }

    public  function scopeGetTopApps($query)
    {
        $query->where('Top_chart', 'yes');
    }
    public  function scopeGetPostType($query,$type)
    {
        $query->where('Post_type', $type);
    }
    public static function scopeGetPostTopChartWallpaper()
    {
        $postQuery= Post::GetPostType('Wallpaper')
                        ->GetTopApps()
                         ->get();
        return $postQuery;
    }

    public static function scopeGetPostTopChartVideo()
    {
        $postQuery= Post::GetPostType('video')
                        ->GetTopApps()
                         ->get();
        return $postQuery;
    }

    public static function scopeGetApplicationGameTopChart()
    {
        $postQuery= Post::GetPostType('application')
            ->GetApplicationType('game')
            ->GetTopApps()
            ->get();
        return $postQuery;
    }

    public static function scopeGetApplicationAppTopChart()
    {
        $postQuery= Post::GetPostType('application')
            ->GetApplicationType('software')
            ->GetTopApps()
            ->get();
        return $postQuery;
    }


    public static function scopeGetTopChartWaV($type)
    {
        $postQuery= Post::GetPostType($type)
                        ->GetTopApps()
                         ->get();
        return $postQuery;
    }


    public static function scopeGetTopChartresult($query,$type,$application)
    {
        $postQuery= Post::GetPostType($type)
                          ->GetApplicationType($application)
                          ->GetTopApps()
                           ->get();
        return $postQuery;
    }


    public function scopeGetDetailById($query,$uuid,$type,$application)
    {
        if($application !='')
        {
            return $query->ActivePost()
                   ->GetPostType($type)
                   ->GetApplicationType($application)
                   ->where("uuid",$uuid);

        }
        else
        {
            return $query->ActivePost()
                        ->GetPostType($type)
                        ->where("uuid",$uuid);
        }
    }

    public function scopeGetSimilar($query,$uuid, $type)
    {

    	$getCatId = Post::select('category_id')->whereUuid($uuid)->first();
    	return $result = Post::whereCategory_id($getCatId->category_id)
                      ->where('uuid', '!=' , $uuid)
                      ->GetPostType($type)
                      ->inRandomOrder()
                      ->limit(6)
                      ->get();
    }


    public function scopeGetAppDataAnyTwo()
    {

        $postQuery= Post::GetPostType('application')
            ->GetApplicationType('software')
            ->inRandomOrder()
            ->limit(2)
            ->get();
        return $postQuery;
    }

    public function scopeGetSimilarApp($query,$uuid)
    {

        $getCatId = Post::select('category_id')->whereUuid($uuid)->first();
        return $result = Post::whereCategory_id($getCatId->category_id)
                                ->where('uuid', '!=' , $uuid)
                                ->GetPostType('application')
                                ->GetApplicationType('software')
                               ->inRandomOrder()
                               ->limit(6)
                               ->get();
    }
    public function scopeGetSimilarGame($query,$uuid)
    {

        $getCatId = Post::select('category_id')->whereUuid($uuid)->first();
        return $result = Post::whereCategory_id($getCatId->category_id)
            ->where('uuid', '!=' , $uuid)
            ->GetPostType('application')
            ->GetApplicationType('game')
            ->inRandomOrder()->limit(6)->get();
    }

    public function scopeGetRandomContent()
    {

        $postQuery= Post::wherePost_type('Wallpaper')
            ->orWhere('post_type', 'video')
            ->inRandomOrder()
            ->limit(10)
            ->get();
        return $postQuery;
    }

    public function scopeGetAppByUUID($query,$uuid)
    {

        $postQuery= Post::whereUuid($uuid)->first();
        return $postQuery;
    }

    public function scopeGetAppByKeyWord($query, $name)
    {
        return Post::where('name','LIKE','%'.$name.'%');
    }

    public function scopeGetAllGame($query)
    {
        $postQuery= Post::GetApplicationType('game')->get();

        return $postQuery;
    }
    
}
