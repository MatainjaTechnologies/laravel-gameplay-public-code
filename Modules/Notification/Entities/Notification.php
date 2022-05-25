<?php

namespace Modules\Notification\Entities;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    
    public function scopeAllNotification($query, $deleted_at)
    {
        return $query->where('deleted_at',$deleted_at);
    }
}
