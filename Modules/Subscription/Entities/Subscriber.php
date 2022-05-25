<?php

namespace Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

class Subscriber extends Model
{
    protected $fillable = ['user_id', 'msisdn', 'package', 'trxid', 'event', 'start_date', 'end_date', 'recharge_date',];

    protected $table = 'subscriber';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public static function getAllNewSubs()
    {
        $query = Subscriber::query();
        $start = date('Y-m-d H:i:s');

        $end = date('Y-m-d H:i:s', strtotime("-30 days"));

        $users = $query->where('start_date', '<=', date($start))
            ->where('start_date', '>=', date($end))
            ->orderBy('start_date', 'desc')
        ->get();

        foreach ($users as $key => $user) {
            $user_dtl = User::getDetailsByMsisdn($user->msisdn)->first();
            $user->user_details = $user_dtl;
        }

        return $users;
    }

    public function scopeGetByDate($query, $date)
    {
        return $query->where('recharge_date', date($date));
    }

    public static function getAllByDate()
    {
        $mainArr = [];
        $query = Subscriber::query();
        $all_dates = $query->get(['recharge_date']);

        foreach ($all_dates as $key => $date) {
            $dtl = Subscriber::getByDate($date->recharge_date)->get();
            
            if (count($dtl) > 0) {
                $mainArr[date_format(date_create($date->recharge_date),"d F Y")] = $dtl;
            }
        }

        return $mainArr;
    }
    
}
