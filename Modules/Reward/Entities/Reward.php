<?php

namespace Modules\Reward\Entities;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{

    protected $fillable = ['reward_type_id', 'title', 'description', 'reward_image', 'banner_image', 'coin', 'is_active', 'date_created', 'click_reward' ];
    
    protected static function newFactory()
    {
        return \Modules\Reward\Database\factories\RewardFactory::new();
    }

    public function scopeGetAll($query)
    {
        return $query->whereIs_active('1')->get();
    }
    
    public function scopeGetAllByType($query, $type_id)
    {
        return $query->whereIs_active('1')->whereReward_type_id($type_id)->get();
    }
    
    public function scopeGetDetailById($query, $id)
    {
        return $query->whereId($id)->whereIs_active('1')->first();
    }

    public function scopeAll($query)
    {
        return $query->get();
    }

    public function scopeGetDetailsById($query, $id)
    {
        return $query->whereId($id);
    }

    public function scopeGetRwdDelete($query, $id)
    {
        return $query->where('id', $id)->delete();
    }
}
