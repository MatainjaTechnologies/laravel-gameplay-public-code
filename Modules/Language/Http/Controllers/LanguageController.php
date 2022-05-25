<?php

namespace Modules\Language\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Domain\Entities\Domain;
use Modules\Language\Entities\Language;
use Modules\Language\Http\Requests\LanguageRequest;
class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
        $all_domain = Domain::getAll()->orderBy('id', 'DESC')->where('is_deleted', null)->get();

        $this->domains = $all_domain;
    }

    public function index()
    {
        return view('language::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $domains = $this->domains;
        return view('language::create', compact('domains'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(LanguageRequest $request)
    {
        $status = Language::create([
            'name'=> $request->name,
            'short_code'=> $request->short_code,
            'content_type'=> $request->content_type,
        ]);

        $last_id = $status['id'];

        if ($last_id) {

            return redirect('admin/language/all')->with('flash_message_success', 'Language saved successfully');
        } else {
            return redirect('admin/language/add')->with('flash_message_error', 'Somthing went wrong, try again later');
        }
    }
    public function language()
    {
        $languages =[];
        $domains =$this->domains;
        $languages= Language::all();
        // dd($categories);
        return view('language::language', compact('languages', 'domains'));
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('language::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $domains =$this->domains;
        $lang_detl = Language::getOneLanguage($id)->first();
        //dd($lang_detl);
        return view('language::edit', compact('lang_detl', 'domains'));
    }
    public function edit_store(LanguageRequest $request)
    {
        $status = Language::GetOneLanguage($request->id)->first();
        $status->id= $request->id;
        $status->name= $request->name;
        $status->short_code= $request->short_code;
        $status->content_type= $request->content_type;

        if ($status->save()) {
            return redirect('admin/language/all')->with('flash_message_success', 'Language saved successfully');
        } else {
            return redirect('admin/language/'.$request->id.'/edit')->with('flash_message_error', 'Somthing went wrong, try again later');
        }
    }
    public function delete($id)
    {
        $status = Language::GetOneLanguage($id)->delete();
        return redirect('admin/language/all')->with('flash_message_success', 'Language delete successfully');
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
