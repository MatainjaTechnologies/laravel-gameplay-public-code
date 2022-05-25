<?php

namespace Modules\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = ['id', 'domain_name', 'logo', 'source_path', 'destination_path', 'daily_subs_url', 'weekly_subs_url' ,'monthly_subs_url','yearly_subs_url','renew_subs_url','subscribe_notify_url', 'unsubscribe_notify_url', 'status' ];

    public function scopeGetDetailsById($query, $id)
    {
        return $query->whereId($id);
    }
    
    public function scopeGetAll($query)
    {
        return $query->whereStatus('1')->where('is_deleted', null);
    }
    
    public function scopeGetByName($query, $name)
    {
        return $query->where('domain_name', $name);
    }
}
