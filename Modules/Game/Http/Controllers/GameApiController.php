<?php

namespace Modules\Game\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Game\Entities\Game;
use Modules\Winner\Entities\Winner;
use Modules\Competition\Entities\Competition;
use Illuminate\Support\Facades\DB;
class GameApiController extends Controller
{
    public function game_details($uuid)
    {
        $game_details = Game::getDataUuid($uuid)->first();
        return  $game_details;
    }
    public function GetgamesByCategory($id)
    {
         return Game::GetgamesByCategory($id);
    }
    public function CompGameDetails($comp_id, $uuid)
    {
        $winners = Winner::CompWinners($comp_id)->limit(3)->orderBy('id', 'DESC')->get();
        $game_details = Game::getDataUuid($uuid)->first();
        $comp_details = Competition::competitionDetailsById($comp_id)->first();
        $other_games = Game::getOtherGames($game_details->category_id, $uuid)->orderBy('view', 'DESC')->get();
        return [
            'routes' => [
                            [
                            'match' => [
                                'domains' => ['*'],
                                'prefixes' => ['/competition/*', 'apps/*'],
                            ],
                            'apply' => [
                                'headers' => [ 'Authorization' => 'Bearer {your-token}']
                            ]
                            ],
                            [
                            'match' => [
                                'domains' => ['*'],
                                'prefixes' => ['/competition*', '/competition*'],
                            ],
                            ],
                        ],
             compact('game_details', 'comp_details', 'winners', 'other_games'),
        ];

    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index()
    {
        return view('game::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('game::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('game::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('game::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
