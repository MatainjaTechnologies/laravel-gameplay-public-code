<?php

namespace Modules\Reward\Entities;

use Illuminate\Database\Eloquent\Model;

class RewardType extends Model
{
    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Reward\Database\factories\RewardTypeFactory::new();
    }

    public function scopeGetAll($query)
    {
        return $query->whereStatus('1')->get();
    }

    public function scopeGetDetailsById($query, $id)
    {
        // dd($query->whereId($id)->first());
        return $query->whereId($id)->first();
    }
}
