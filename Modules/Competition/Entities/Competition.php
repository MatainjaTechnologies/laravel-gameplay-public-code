<?php

namespace Modules\Competition\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\Game\Entities\Game;
use Modules\Winner\Entities\Winner;
use Modules\Competition\Entities\Prize;
use Modules\Category\Entities\Category;

class Competition extends Model
{
   protected $fillable = ['id_competitiongame','competition_type','prize_image1','prize_coins1','prize_image2','prize_coins2','prize_image3','prize_coins3','start_date','end_date','banner_image'];

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public function games(){
        return $this->hasMany('Modules\Game\Entities\Game');
    }

    public function game()
    {
        return $this->belongsTo(Game::class,"id_competitiongame","id");
    }

    public function Prize_details(){
        return $this->hasOne('App\Models\Address');
    }

    public function scopeCompetitionDetails($query, $data)
    {
        return $query->where('id', $data)->where('competition_type', 1);
    }

    public function winners(){
        return $this->hasMany(Winner::class)->WinnerRank("asc");
    }

    public function scopeCompetitionType($query, $type)
    {
        $date_now = date('Y-m-d');
        $date_now_month = date('Y-m-d', strtotime($date_now.'+30 days'));
        return $query->where('competition_type', '!=', $type)->where('start_date', '>=', $date_now)->where('end_date', '<=', $date_now_month);

    }

    public function scopeAllComprtitions($query)
    {
        return $query->get();
    }

    public static function getAllByDuration($duration)
    {
        $query = Competition::query();
        $where = '';
        $competitions = [];
        $date_now = date('Y-m-d');
        $date_now_week = date('Y-m-d', strtotime($date_now.'+7 days'));
        $date_now_month = date('Y-m-d', strtotime($date_now.'+30 days'));

        if ($duration == 'current') {
            $competitions = $query->leftjoin('games', 'competitions.id_competitiongame', '=', 'games.id')
                ->select(
                    'competitions.*',
                    'games.id as game_id',
                    'games.uuid as game_uuid',
                    'games.name as game_name',
                    'games.category_id as game_category',
                    'games.description as game_desc',
                    'games.rule as game_rule',
                    'games.image as game_image',
                    'games.url as game_url'
                )->where('competitions.start_date', '<=', $date_now)->where('competitions.end_date', '<=', $date_now_month) //where('competitions.start_date', '<=', $date_now)->
            ->get();
        }

        if ($duration == 'soon') {
            $competitions = $query->leftjoin('games', 'competitions.id_competitiongame', '=', 'games.id')
                ->select(
                    'competitions.*',
                    'games.id as game_id',
                    'games.uuid as game_uuid',
                    'games.name as game_name',
                    'games.category_id as game_category',
                    'games.description as game_desc',
                    'games.rule as game_rule',
                    'games.image as game_image',
                    'games.url as game_url'
                )->where("competitions.start_date", ">", $date_now
                )->orderBy('competitions.start_date', 'ASC')

            ->get();
        }

        if ($duration == 'finish') {
            $competitions = $query->leftjoin('games', 'competitions.id_competitiongame', '=', 'games.id')
                ->select(
                    'competitions.*',
                    'games.id as game_id',
                    'games.uuid as game_uuid',
                    'games.name as game_name',
                    'games.category_id as game_category',
                    'games.description as game_desc',
                    'games.rule as game_rule',
                    'games.image as game_image',
                    'games.url as game_url'
                )->where("competitions.end_date", "<", $date_now)
            ->simplePaginate(5);
            // ->get();
        }


        if( count($competitions) > 0 ){
            foreach($competitions as $comp){
                $image = unserialize($comp->game_image);
                $comp->game_image = $image[0];
                $category = Category::select("name as category_name")->whereId($comp->game_category)->first();
                $comp->category_name = $category;
            }
        }

        return $competitions;

    }

    public function scopeCompetitionDetailsById($query, $data)
    {
        return $query->where('id', $data);
    }

    public function scopeCompetitionsByDate($query, $type, $start_date, $end_date)
    {
        $q = $query->where('competition_type', '!=', $type);

        if ($start_date != '' && $end_date != '') {

            return $q->where('start_date', '>=', $start_date)->where('end_date', '<=', $end_date);

        }elseif($start_date != '' && $end_date == ''){

            // return $q->where('start_date', '=', $start_date);
            return $q->where('start_date', '>=', $start_date);

        }elseif($start_date == '' && $end_date != ''){

            // return $q->where('end_date', '=', $end_date);
            return $q->where('end_date', '<=', $end_date);

        }

    }

}
