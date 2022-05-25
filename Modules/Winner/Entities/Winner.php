<?php

namespace Modules\Winner\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\Game\Entities\Game;
use Modules\User\Entities\User;
use Modules\Category\Entities\Category;
use Modules\Competition\Entities\Competition;

class Winner extends Model
{
    protected $table = 'winners';

    protected $fillable = ['id', 'competition_id', 'competition_start_date', 'competition_end_date', 'game_uuid', 'user_id', 'date_of_users_played', 'game_score', 'position', 'prize_image', 'cron_type'];

    public function scopeWinnerList($query, $cron_type)
    {
        // dd($query);
        return $query->select('winners.*', 'games.id as game_id', 'games.uuid as game_uuid', 'games.name as game_name', 'games.category_id as game_category', 'games.image as game_image', 'users.name as user_name')->where('winners.cron_type', $cron_type);
    }

    public function scopeWinnerRank($query, $sortType)
    {


        return $query->orderBy('position', $sortType);

    }



    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }




    public static function CompetitionWinners($type)
    {
        $competition = Competition::query()
                        ->CompetitionType($type);

        $competition = $competition->get();

        return $competition;
    }
    public static function getWinners($type)
    {
        $winner_list = [];
        $comp_details = [];
        $final_winner_list = [];

        $winner_list = Winner::leftjoin('games', 'winners.game_uuid', '=', 'games.uuid')->leftjoin('users', 'winners.user_id', '=', 'users.id')->WinnerList($type)->get();

        if(count($winner_list)>0){
            foreach($winner_list as $key => $winner){
                $category=Category::select("name as category_name")->CompetitionCategory($winner->game_category)->first();

                $comp_details['competition_id'] = $winner->competition_id;
                $comp_details['game_id'] = $winner->game_id;
                $comp_details['game_uuid'] = $winner->game_uuid;
                $comp_details['game_name'] = $winner->game_name;
                $comp_details['game_image'] = $winner->game_image;
                if($category != null){
                    $comp_details['game_category'] = $category->category_name;
                }
                $comp_details['competition_start_date'] = $winner->competition_start_date;
                $comp_details['cron_type'] = $winner->cron_type;

                $winners[$winner->competition_id][$winner->position]['user_name'] = $winner->user_name;
                $winners[$winner->competition_id][$winner->position]['user_played'] = $winner->date_of_users_played;
                $winners[$winner->competition_id][$winner->position]['prize_image'] = $winner->prize_image;
                $winners[$winner->competition_id][$winner->position]['game_score'] = $winner->game_score;
                $winners[$winner->competition_id][$winner->position]['position'] = $winner->position;

                $final_winner_list[$winner->competition_id] = $comp_details;
                $final_winner_list[$winner->competition_id]['winner_list'] = $winners[$winner->competition_id];
            }
        }


        return $final_winner_list;
    }

    public static function GetWinListByDate($start_date, $end_date)
    {
        $competition = Competition::query()->CompetitionsByDate(0, $start_date, $end_date);
        
        $competitions = $competition->orderBy('id', 'ASC')->get();

        return $competitions;
    }

    public function scopeCompWinners($query, $comp_id)
    {
        return $query->where('competition_id', $comp_id);
    }


    public static function getAllDate()
    {
        $query = Winner::query();
        return $query->orderBy('position', 'ASC')->get(['date_of_users_played']);
    }
    
    public function scopeGetAllByDate($query, $date){
        return $query->where('date_of_users_played', date($date));
    }
    
    public static function getAllGroupByDate()
    {
        $mainArr = [];
        $query = Winner::query();
        $all_dates = Winner::getAllDate();
        
        if (count($all_dates) > 0) {
            
            foreach ($all_dates as $key => $dt) {
                
                $data = Winner::getAllByDate($dt->date_of_users_played)->get();  
                
                if (count($data) > 0) {
                    foreach ($data as $key => $value) {
                        $user_data = User::getUserDetails($value->user_id);
                        $value->msisdn = $user_data->msisdn;
                    }

                    $mainArr[date_format(date_create($dt->date_of_users_played),"d F Y")] = $data;
                }
            }
            
        }
        
        return $mainArr;
    }
    
    public static function getWinListByGame($game_id)
    {
        $query = Winner::query();
        return $query->where('game_uuid', $game_id)->orderBy('position', 'ASC')->get();
    }
    
    public static function getLeaderboard()
    {
        $mainArr = [];
        $all_comps = Competition::allComprtitions();
        
        foreach ($all_comps as $key => $comp) {

            $game_dtl = Game::getDetailsById($comp->id_competitiongame);
            $leaders = Winner::getWinListByGame($game_dtl->uuid);
                        
            if (count($leaders) > 0) {

                foreach ($leaders as $key => $lead) {                    
                    $user_data = User::getUserDetails($lead->user_id);
                    $temp['msisdn'] = $user_data->msisdn;
                    $temp['score'] = $lead->game_score;
                    $temp['position'] = $lead->position;
                    $temp['play_date'] = $lead->date_of_users_played;
                    $temp['comp_date'] = $lead->competition_start_date;
                }

            }else {
                $temp['score'] = 'Will declear soon';
                $temp['msisdn'] = 'Will declear soon';
                $temp['position'] = 'Will declear soon';
                $temp['play_date'] = 'Will declear soon';
                $temp['comp_date'] = 'Will declear soon';
            }

            $temp2[] = $temp;
            $mainArr[ucfirst($game_dtl->name)] = $temp2;
        }
        
        return $mainArr;
    }
}
