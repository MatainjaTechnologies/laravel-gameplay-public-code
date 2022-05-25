<?php

namespace Modules\Language\Entities;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name', 'short_code', 'content_type'];

    public function scopeGetOneLanguage($query,$id)
    {
        return $query->where("id",$id);
    }
    
    public static function getAll()
    {
        $query = Language::query();
        return $query->get();
    }

}
