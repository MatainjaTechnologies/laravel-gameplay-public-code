<?php

namespace Modules\Game\Entities;
use Modules\Game\Http\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class GameModel extends Model
{
	use Uuids;
	protected $table = 'games';
    protected $fillable = [];
}
