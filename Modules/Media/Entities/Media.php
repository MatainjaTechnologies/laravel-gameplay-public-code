<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Post\Entities\Post;

class media extends Model
{
    protected $fillable = ['post_type','post_id','media','media_status','status'];

    protected $table = 'media';

    public function post(){
        return $this->hasOne('Modules\Content\Entities\Post');
    }

    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

}
