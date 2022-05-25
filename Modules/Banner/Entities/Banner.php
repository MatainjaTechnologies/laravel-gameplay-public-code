<?php

namespace Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //Get banner details model
    public function scopeBnrDetails($query, $bnr_id)
    {
        return $query->where('status', 1)->where('id', $bnr_id);
    }


    protected $table = 'banners';

    protected $fillable = ['image','game_id','position', 'created_at','updated_at'];

    protected $keyType = 'string';

    public function game()
    {
        return $this->belongsTo(Banner::class);
    }

    public function scopeBannerStatus($query)
    {
        return $query->where('status', 1);
    }

   public static function scopeGetBanners()
    {
        $bannerQuery= Banner::join('games', 'games.id', '=', 'banners.game_id')->select('banners.*', 'games.name');

        $banners =  $bannerQuery->BannerStatus()->get();
        return $banners;
    }

    public static function scopeGetHomeBanners()
    {
        $bannerQuery= Banner::join('games', 'games.id', '=', 'banners.game_id')->join('categories', 'categories.id', '=', 'games.category_id')->select('banners.*', 'games.name','games.image as gameimage','games.uuid','categories.name as cat_name');

        $banners =  $bannerQuery->where('banners.status','1')->get()->toarray();
        return $banners;
    }
}
