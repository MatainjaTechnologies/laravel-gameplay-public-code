<?php

namespace Modules\Game\Entities;
//use Modules\Game\Http\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Modules\Competition\Entities\Competition;

class Game extends Model
{

    protected $table = 'games';


    protected $fillable = ['uuid','name','description','rule','category_id','coin','version','is_home','image', 'cover_image', 'is_top_game', 'url','created_at','updated_at'];

    protected $keyType = 'string';



    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function banner()
    {
        return $this->hasOne('Modules\Banner\Entities\Banner');
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'id', 'id_competitiongame');
    }

    public function scopeActiveDetails($query,$uuid)
    {
        return $query->where('uuid', $uuid)->where('is_deleted', null);
    }


    public static function getAllGame()
    {

        $game_query = Game::query();
        $games = $game_query->ActiveStatus(null)->get();
        //dd($games);
        //select('*')->ActiveStatus(null)->get();
        return $games;
    }

    /*public function scopeGetGameByKeyWord($query, $name)
    {
        return Game::where('name','LIKE','%'.$name.'%')->whereIs_deleted(null);
    }*/

    public function scopeGetDetailsById($query, $id)
    {
        return $query->whereId($id)->first();
    }

    public function scopeGetByCategory($query, $category_id)
    {
        return $query->whereCategory_id($category_id);
    }

    public function scopeGetPaginateByCategory($query, $category_id, $limit=null)
    {
        return $query->whereCategory_id($category_id)->simplePaginate($limit);
    }

    public function scopeGetTopChartPaginateGames($query, $limit=null)
    {
        return $query->where('is_top_game', '1')->simplePaginate($limit);
    }

    public function scopeGetIsHomeGames($query, $limit=null)
    {
        return $query->where('is_home', '1');
    }
    public function scopeGetDataUuid($query,$uuid)
    {
        return $query->where('uuid', $uuid);
    }

    public function scopeGetOtherGames($query, $cat_id, $uuid)
    {
        return $query->where('category_id', $cat_id)->where('uuid', '!=', $uuid);
    }

    /* Search methods start */
    public  function scopeSearchGame($query,$q)
    {
        $query->where('name', 'LIKE', '%'.$q.'%')->orWhere('description', 'LIKE', '%'.$q.'%');
    }

    public function scopeGetTopChartGames($query)
    {
        return $query->where('is_top_game', '1');
    }

    public function scopeActiveStatus($query,$is_deleted=null)
    {
        return $query->where('is_deleted', $is_deleted);
    }
    public function scopeGetgamesByCategory($query,$id)
    {
        return $query->where('category_id',  $id)->get();
    }
    /* Search methods end */
}

