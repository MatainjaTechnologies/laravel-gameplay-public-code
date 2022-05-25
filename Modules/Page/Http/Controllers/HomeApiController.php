<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Game\Entities\Game;
use Modules\Category\Entities\Category;

class HomeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function CatGame(Request $request)
    {
        $games=[];
        $paginate = 5;
        $type = $request->type;

        if ($type != 'top_chart')
        {
            $data = Game::where('is_home', '1')->getPaginateByCategory($type, $paginate);
            $t_name = Category::getOneCategoryById($type)->first();

            foreach ($data as $key => $value)
            {
                $value->category_name = $t_name->name;
                $games[] = (object)$value;
            }
            $arr['type'] = $type;
            $arr['games'] = $games;
            $arr['type_name'] = $t_name->name;
            // $arr['type_name'] = $t_name['name'];
        }
        else {

            $type_name = 'Top Chart';
            $data = Game::getTopChartPaginateGames($paginate);

            foreach ($data as $key => $value)
            {

                $cat_dtl = Category::getOneCategoryById($value->category_id)->first();
                $value->category_name = $cat_dtl->name;
                $games[] = (object)$value;
            }

            $arr['type'] = $type;
            $arr['games'] = $games;
            $arr['type_name'] = $type_name;
        }
        return $arr;
    }
    public function HtmlGameDetails(Request $request,$game_uuid=null)
    {
        $details = Game::whereUuid($game_uuid)->first();
        $otherGame = Game::inRandomOrder()->limit(3)->get();

        return compact('details','otherGame');
    }
    public function index()
    {
        return view('page::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('page::create');
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
        return view('page::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('page::edit');
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
