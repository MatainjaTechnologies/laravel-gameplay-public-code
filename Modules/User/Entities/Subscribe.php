<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
	protected $table = 'users_subscribe_status';
    
    protected $fillable = ['user_id','package','status','lastcharge','nextcharge','token','token_status',];

    protected $keyType = 'string';

    
   
    
}
