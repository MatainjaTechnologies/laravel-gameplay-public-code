<?php

namespace App\Listener;

use App\Event\GameViewCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Modules\Game\Entities\Game;

class GameViewSave
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GameViewCreated  $event
     * @return void
     */
    public function handle(GameViewCreated $event)
    {
        //
        $view=$event->view+1;
        $gameview=Game::find($event->id);
        $gameview->view=$view;
        $gameview->save();
    }
}
