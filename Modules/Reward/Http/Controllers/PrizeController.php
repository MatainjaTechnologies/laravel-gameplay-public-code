<?php

namespace Modules\Reward\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Reward\Entities\Prize;
use Modules\Domain\Entities\Domain;
use Modules\Reward\Http\Requests\PrizeRequest;


class PrizeController extends Controller
{
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

    /* Admin methods start */
    public function add_prize()
    {
        return view('reward::add_prize');        
    }

    public function prize_store(PrizeRequest $request)
    {

        $request->validated();
        
        $reward_text = $request->reward_text;
        $points = $request->points;
        $quantity = $request->quantity;

                
        $status = Prize::create([
            'reward_text' => $reward_text,
            'points' => $points,
            'quantity' => $quantity,
            'is_active' => '1',
        ]);

        $last_id = $status['id'];

        if ($last_id) {
            
            $prz_dtl = Prize::getDetailsById($last_id)->first();

         if ($prz_dtl->save()) {
             return redirect('/admin/prize/list')->with('flash_message_success', 'Prize data saved successfilly');
           }
        }else {
          return redirect('/admin/prize/add')->withInput()->with('flash_message_error', 'Somthing went wrong, try again later ');
        }
    }

    public function prize_update(PrizeRequest $request)
    {
        $request->validated();
        
        $id = $request->prize_id;
        $points = $request->points;
        $quantity = $request->quantity;
        $reward_text = $request->reward_text;

        $dtl = Prize::getDetailsById($id)->first();

        $dtl->points = $points;
        $dtl->quantity = $quantity;
        $dtl->reward_text = $reward_text;

        if ($dtl->save()) {
            return redirect('/admin/prize/list');
        }else {
            return redirect('/admin/prize/edit/'.$id)->with('flash_message_error', 'Somthing went wrong, try again later ');
        }
    }

    public function prize_details(PrizeRequest $request)
    {
        $id = $request->prize_id;
        $prz_dtl = Prize::getDetailsById($id)->first();

        if ($prz_dtl) {
            $res['status'] = true;
            $res['data'] = $prz_dtl;
        } else {
            $res['status'] = true;
            $res['data'] = $prz_dtl;
        }

        echo json_encode($res);
        
    }

    public function edit_prize($id)
    {
        $dtl = Prize::getDetailsById($id)->first();
        // dd($dtl);
        return view('reward::edit_prize', compact('dtl'));
    }

    public function prize_list()
    {
        $domains = Domain::getAll()->orderBy('id', 'DESC')->get();
        $all = Prize::getAll();
        // dd($all);
        return view('reward::prize_list', compact('all', 'domains'));
    }

    public function delete_prize(Request $request)
    {
        $res = [];    
        $id = $request->prize_id;

        $status = Prize::getPrzDelete($id);

        if ($status) {
            $res['status'] = true;
            $res['msg'] = 'Prize deleted successfully';
        }else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later ';
        }
        
        echo json_encode($res);
    }
    /* Admin methods end */
}
