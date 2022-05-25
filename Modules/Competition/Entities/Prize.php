<?php

namespace Modules\Competition\Entities;

use Illuminate\Database\Eloquent\Model;

class prize extends Model
{
    protected $fillable = ['schedule_id','prize_name','prize_text','prize_coins'];

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

}
