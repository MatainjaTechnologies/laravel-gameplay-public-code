<?php

namespace Modules\Reward\Entities;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    protected $fillable = ['reward_text', 'points', 'is_active', 'quantity'];
    
    protected static function newFactory()
    {
        return \Modules\Reward\Database\factories\PrizeFactory::new();
    }

    public function scopeGetAll($query)
    {
        return $query->get();
    }
   
    public function scopeGetDetailsById($query, $id)
    {
        return $query->whereId($id);
    }
    
    /*public function scopeGetUpdateById($query, $id, $data)
    {
        $status = $query->where('id', $id)
            ->update([
                'points' => $data['points'], 
                'quantity' => $data['quantity'], 
                'reward_text' => $data['reward_text'] 
            ]
        );

        return $status;
    }*/

    public function scopeGetPrzDelete($query, $id)
    {
        return $query->where('id', $id)->delete();
    }
}
