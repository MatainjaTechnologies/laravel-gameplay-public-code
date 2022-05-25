<?php

namespace Modules\Domain\Http\Controllers;

use File;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Domain\Http\Requests\DomainRequest;
use Modules\Domain\Http\Requests\DomainRequestWI;
use Modules\Domain\Entities\Domain;

class DomainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        return view('domain::index');
    }

    /* Admin Methods Start */
    public function create()
    {
        return view('domain::add');
    }

    public function store(DomainRequest $request)
    {
        $request->validated();

        $logo_image_name = '';
        $domain_name = $request->domain_name;
        $source_path = $request->source_path;
        $destination_path = $request->destination_path;
        $daily_subs_url = $request->daily_subs_url;
        $weekly_subs_url = $request->weekly_subs_url;
        $monthly_subs_url = $request->monthly_subs_url;
        $yearly_subs_url = $request->yearly_subs_url;
        $renew_subs_url = $request->renew_subs_url;
        $subscribe_notify_url = $request->subscribe_notify_url;
        $unsubscribe_notify_url = $request->unsubscribe_notify_url;
        
        $domain_name_status = Domain::getByName($domain_name)->first();

        if($domain_name_status){
            return redirect('/admin/domain/add')->withInput()->with('flash_message_error', 'Domain name alredy exist');
        }else{

            $status = Domain::create([
                'domain_name' => $domain_name,
                'source_path' => $source_path,
                'destination_path' => $destination_path,
                'daily_subs_url' =>$daily_subs_url,
                'weekly_subs_url' =>$weekly_subs_url,
                'monthly_subs_url' =>$monthly_subs_url,
                'yearly_subs_url' =>$yearly_subs_url,
                'renew_subs_url' =>$renew_subs_url,
                'subscribe_notify_url' => $subscribe_notify_url,
                'unsubscribe_notify_url' => $unsubscribe_notify_url,
            ]);
    
            $last_id = $status['id'];
    
            if ($last_id) {
    
                if ($request->hasFile('logo')) {
                
                    //Logo image upload
                    $logo_image = $request->file('logo');
                    $logo_extention = $request->file('logo')->extension();
                    $logo_img_name = $last_id.'_'.date('dmYHis').'_logo_image.'.$logo_extention;
    
                    //logo image save destination
                    $icn_img_destination = public_path().'/uploads/domain/'.$last_id.'/logo/';
    
                    if ( ! File::exists($icn_img_destination)) {
                        File::makeDirectory($icn_img_destination, 0777, true, true);
                    }
                    
                    if ($logo_image->move($icn_img_destination, $logo_img_name)) {
                        $logo_image_name = $logo_img_name;
                    }
                }
    
                $dmn_dtl = Domain::getDetailsById($last_id)->first();
                $dmn_dtl->logo = $logo_image_name;
    
                if ($dmn_dtl->save()) {
                    return redirect('/admin/domains')->withInput()->with('flash_message_success', 'Domain saved successfully');
                }
            } else {
                return redirect('/admin/domain/add')->withInput()->with('flash_message_error', 'Somthing went wrong, try again later ');
            }

        }

    }
    
    public function show()
    {   
        $all = Domain::getAll()->orderBy('id', 'DESC')->where('is_deleted', null)->get();
        return view('domain::show', compact('all'));
    }
    
    public function edit($id)
    {   
        $dmn_dtl = Domain::getDetailsById($id)->first();
        return view('domain::edit', compact('dmn_dtl'));
    }
    
    public function update(DomainRequestWI $request)
    {
        $request->validated();

        $logo_image_name = '';
        
        $id = $request->id;
        $domain_name = $request->domain_name;
        $source_path = $request->source_path;
        $destination_path = $request->destination_path;
        $daily_subs_url = $request->daily_subs_url;
        $weekly_subs_url = $request->weekly_subs_url;
        $monthly_subs_url = $request->monthly_subs_url;
        $yearly_subs_url = $request->yearly_subs_url;
        $renew_subs_url = $request->renew_subs_url;
        $subscribe_notify_url = $request->subscribe_notify_url;
        $unsubscribe_notify_url = $request->unsubscribe_notify_url;

        if ($request->hasFile('logo')) {
            
            //Logo image upload
            $logo_image = $request->file('logo');
            $logo_extention = $request->file('logo')->extension();
            $logo_img_name = $id.'_'.date('dmYHis').'_logo_image.'.$logo_extention;

            //logo image save destination
            $icn_img_destination = public_path().'/uploads/domain/'.$id.'/logo/';

            if ( ! File::exists($icn_img_destination)) {
                File::makeDirectory($icn_img_destination, 0777, true, true);
            }
            
            if ($logo_image->move($icn_img_destination, $logo_img_name)) {
                $logo_image_name = $logo_img_name;
            }
        }

        $dmn_dtl = Domain::getDetailsById($id)->first();

        

        // $dmn_dtl->domain_name = $domain_name;
        $dmn_dtl->source_path = $source_path;
        $dmn_dtl->destination_path = $destination_path;
        $dmn_dtl -> daily_subs_url=$daily_subs_url;
        $dmn_dtl -> weekly_subs_url=$weekly_subs_url;
        $dmn_dtl -> monthly_subs_url=$monthly_subs_url;
        $dmn_dtl -> yearly_subs_url=$yearly_subs_url;
        $dmn_dtl -> renew_subs_url=$renew_subs_url;
        $dmn_dtl->subscribe_notify_url = $subscribe_notify_url;
        $dmn_dtl->unsubscribe_notify_url = $unsubscribe_notify_url;

        if ($logo_image_name != '') {
            $dmn_dtl->logo = $logo_image_name;
        }
        if($dmn_dtl->save()){            
            return redirect('/admin/domains')->withInput()->with('flash_message_success', 'Domain saved successfully');
        }else {
            return redirect('/admin/domain/'.$id.'/edit')->withInput()->with('flash_message_error', 'Somthing went wrong, try again later ');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->dmn_id;
        $dmn_dtl = Domain::getDetailsById($id)->first();
        
        $dmn_dtl->is_deleted = '1';
        
        if ($dmn_dtl->save()) {
            $res['status'] = true;
            $res['msg'] = 'Domain deleted successfully';
        } else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';
        }
        
        echo json_encode($res);
        exit();        
    }
    
    public function details(Request $request)
    {
        $dmn_dtl = Domain::getDetailsById($request->dmn_id)->first();
        // dd($dmn_dtl);

        if ($dmn_dtl) {
            $res['status'] = true;
            $res['data'] = $dmn_dtl;
        }else {
            $res['status'] = false;            
        }

        echo json_encode($res);
        exit();
    }

    /* Admin Methods End */
}
