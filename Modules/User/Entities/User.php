<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['uuid','msisdn','name','email','password','remember_token','email_verified_at','status', 'domain'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $keyType = 'string';

    
    public $incrementing = false;

    protected $guarded = [];

    public function notifications(){
        return $this->hasMany('Modules\Notification\Entities\Notification');
    }
    
    public function subscribe()
    {
        return $this->hasOne('Modules\User\Entities\Subscribe');
    }

    public function scopeCheckDetails($query,$user_id,$token)
    {
        return $query->where('id', $user_id)->where('remember_token',$token);
    }

    public function scopeGetUserDetails($query,$userId)
    {
        $postQuery= $query->whereId($userId)
                   ->first();
        return $postQuery;        
    }
    public static function scopeCheckUserExist($query,$msisdn)
    {
        $postQuery= $query->whereMsisdn($msisdn)
                   ->get();
        if(count($postQuery)>0){
            $userQuery= User::rightjoin('users_subscribe_status', 'users_subscribe_status.user_id', '=', 'users.id')
            ->select('users.uuid','users.msisdn','users_subscribe_status.*')->whereMsisdn($msisdn)->first()->toArray();
        }else{
             $userQuery=array();
        }
        
        return $userQuery;
    }

    public function scopeGetAllByDomain($query,$domain)
    {
        return $query->whereDomain($domain);
    }
    
    public function scopeGetDetailsByMsisdn($query,$msisdn)
    {   
        return $query->whereMsisdn($msisdn);
    }
    
}
