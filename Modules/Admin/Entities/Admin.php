<?php

namespace Modules\Admin\Entities;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;
	
	protected $guard = 'admin';
	
	protected $table = 'admin';

    protected $fillable = ['email',  'password'];

    protected $hidden = ['password',  'remember_token'];

    public function scopeAll($query)
    {
        return $query->get();
    }
    
}
