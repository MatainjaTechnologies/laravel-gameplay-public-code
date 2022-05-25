<?php

namespace Modules\Winner\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\User\Entities\User;
use Modules\Winner\Entities\Winner;
use Modules\Category\Entities\Category;
use Modules\Competition\Entities\Competition;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {   
        $competitions = Winner::CompetitionWinners(0);
        
        return view('winner::winner-list-portal', compact('competitions'));
    }
    
    public function winner_list($type)
    {
        $t = '';
        
        if($type == 'daily'){
            $t = 1;
        }
        
        if($type == 'weekly'){
            $t = 2;
        }
        
        if($type == 'monthly'){
            $t = 3;
        }
        
        $competitions = Winner:: CompetitionWinners(0);
        // $competitions->type = $type;
        
        return $competitions;
    }

    public function date_search(Request $request)
    {
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        $search_result = Winner::GetWinListByDate($start_date,$end_date);

        return view('winner::winner-search-result', compact('search_result', 'start_date', 'end_date'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('winner::create');
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
        return view('winner::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('winner::edit');
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


    /* Admin methods start */
    public function winners()
    {
        $all = Winner::getAllGroupByDate();
        return view('winner::winner_list', compact('all'));
    }
    
    public function leaderboard()
    {
        $all = Winner::getLeaderboard();
        return view('winner::leaderboard', compact('all'));
    }
    
    public function update_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        
        $dtl = Winner::getDetailsById($id)->first();
        $dtl->status = $status;

        if ($dtl->save()) {
            $res['status'] = true;
            $res['msg'] = 'Status updated successfully';
        }else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later ';
        }
        
        echo json_encode($res);
    }
    /* Admin methods end */
}
