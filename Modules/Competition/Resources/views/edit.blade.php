@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Edit Competition</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <a href="{{url('admin/competition/show')}}" class="btn btn-outline-success" >Competition Schedule List</a>
            </div>
        </div>
        @if(Session::has('flash_message_error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
            {{ Session::get('flash_message_error') }}
        </p>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="needs-validation" action="{{ url('admin/competition/'.$data['competition_details']['id'].'/update') }}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
            @csrf
            <div class="row row-xs">                
                <div class="col-lg-5">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Competition Type <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="custom-select select2" name="competition_type" id="competition_type" required>
                                    <option value="">Select...</option>
                                    <option @if ($data['competition_details']['competition_type'] == "1") selected="selected"  @endif value="1">Daily</option>
                                    <option @if ($data['competition_details']['competition_type'] == "2") selected="selected"  @endif value ="2">Weekly</option>
                                    <option @if ($data['competition_details']['competition_type'] == "3") selected="selected"  @endif value="3">Monthly</option>
                                </select>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Schedule Date
                                <span class="tx-danger"> * </span>
                            </label>
                            <div class="col-sm-8">
                                <input 
                                    id="schedule_datepicker_start_date" 
                                    type="text" 
                                    name="schedule_datepicker_start_date" 
                                    class="form-control schedule-datepicker" 
                                    placeholder="dd-mm-yyyy" 
                                    value="{{$data['competition_details']['start_date']}}"
                                    style="display: block;"
                                    autocomplete="off"
                                    required
                                >
                                <div class="invalid-feedback mg-b-10">This is required</div>
                                @if($data['competition_details']['competition_type'] != 1)
                                <input 
                                    id="schedule_datepicker_end_date" 
                                    type="text" 
                                    name="schedule_datepicker_end_date" 
                                    class="form-control schedule-datepicker" 
                                    placeholder="dd-mm-yyyy" 
                                    value="{{$data['competition_details']['end_date']}}"
                                    autocomplete="off"
                                    style="display: none;"
                                >
                                @endif 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Competition game <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="custom-select select2" name="compgame_name" id="compgame_name" required>
                                    <option value="">Select game</option>
                                    @if(isset($data['games']))
                                        @foreach($data['games'] as $g)
                                        <option @if($data['competition_details']['id_competitiongame'] == $g['id'] ) selected @endif value="{{$g['id']}}">{{$g['name']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label>Banner <span class="tx-danger">*</span></label>
                            <div class="input-image"></div>
                        </div>
                        <div class="col-sm-12 mg-t-10 tx-bold mg-b-5 bd pd-y-5">
                            N.B:
                            <ul class="tx-danger">
                                <li>PNG or JPEG or JPG</li>
                                <li>Width 527px</li>
                                <li>Height 239px</li>
                                <li>Size upto 2 MB</li>
                            </ul>
                        </div>
                    </div> 
                    <div class="col-lg-12">
                        @if ($data['competition_details']['banner_image'] && file_exists( public_path().'/uploads/competetion/'.$data['competition_details']['id'].'/banner/'.$data['competition_details']['banner_image']))
                        <div class="com_img_prev_div banner_image">
                            <label>Old Banner </label>
                                @php
                                    $src = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';             
                                    if ($data['competition_details']['prize_image1'] != ''){
                                        $src = asset('/uploads/competetion/'.$data['competition_details']['id'].'/banner/'.$data['competition_details']['banner_image']);
                                    }
                                @endphp
                                <img src="{{$src}}" class="rounded" alt="" id="bnr" >
                        </div>
                        @endif              
                    </div>                    
                </div>
                
                <div class="bd-r"></div>
                <div class="col-md-5">                    
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label>First Prize Image <span class="tx-danger">*</span></label>
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-outline-secondary">Browse</button>
                                <input type="file" id="first_prizeicon_image" name="first_prizeicon_image" />
                            </div>
                            <div class="avatar avatar-xxl wd-150 ht-150 mg-b-10" style="margin: 0px auto;">
                                <div class="first_prizeicon_image">
                                    @php
                                        $src = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
                                        if ($data['competition_details']['prize_image1'] != '') {
                                            $src = asset('/uploads/competetion/'.$data['competition_details']['id'].'/prize1/'.$data['competition_details']['prize_image1']);
                                        }
                                    @endphp
                                    <img src="{{$src}}" class="rounded" alt="" id="first_prizeicon_image" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mg-t-10 tx-bold mg-b-5 bd pd-y-5">
                            N.B:
                            <ul class="tx-danger">
                                <li>PNG or JPEG or JPG</li>
                                <li>Width 256px</li>
                                <li>Height 256px</li>
                                <li>Size upto 1 MB</li>
                            </ul>
                        </div>
                        <div class="col-lg-12 tx-bold">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">First Prize Point<span class="tx-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="first_prizecoin" placeholder="For e.g.., Sports"  value="{{$data['competition_details']['prize_coins1']}}" required>
                                    <div class="invalid-feedback mg-b-10">This is required</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label>Second Prize Image <span class="tx-danger">*</span></label>
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-outline-secondary">Browse</button>
                                <input type="file" name="second_prizeicon_image" id="second_prizeicon_image" />
                            </div>
                            <div class="avatar avatar-xxl wd-150 ht-150 mg-b-10" style="margin: 0px auto;">
                                <div class="second_prizeicon_image">
                                    @php
                                        $src = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
                                        if ($data['competition_details']['prize_image2'] != '') {
                                            $src = asset('/uploads/competetion/'.$data['competition_details']['id'].'/prize2/'.$data['competition_details']['prize_image2']);
                                        }
                                    @endphp
                                    <img src="{{$src}}" class="rounded" alt="" id="bnr" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mg-t-10 tx-bold mg-b-5 bd pd-y-5">
                            N.B:
                            <ul class="tx-danger">
                                <li>PNG or JPEG or JPG</li>
                                <li>Width 256px</li>
                                <li>Height 256px</li>
                                <li>Size upto 1 MB</li>
                            </ul>
                        </div>
                        <div class="col-lg-12 tx-bold">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Second Prize Point <span class="tx-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="second_prizecoin" placeholder="For e.g.., Sports"  value="{{$data['competition_details']['prize_coins2']}}" required>
                                    <div class="invalid-feedback mg-b-10">This is required</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label>Third Prize Image <span class="tx-danger">*</span></label>
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-outline-secondary">Browse</button>
                                <input type="file" name="third_prizeicon_image" id="third_prizeicon_image" />
                            </div>
                            <div class="avatar avatar-xxl wd-150 ht-150 mg-b-10" style="margin: 0px auto;">
                                <div class="third_prizeicon_image">
                                    @php
                                        $src = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
                                        if ($data['competition_details']['prize_image3'] != '') {
                                            $src = asset('/uploads/competetion/'.$data['competition_details']['id'].'/prize3/'.$data['competition_details']['prize_image3']);
                                        }
                                    @endphp
                                    <img src="{{$src}}" class="rounded" alt="" id="bnr" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mg-t-10 tx-bold mg-b-5 bd pd-y-5">
                            N.B:
                            <ul class="tx-danger">
                                <li>PNG or JPEG or JPG</li>
                                <li>Width 256px</li>
                                <li>Height 256px</li>
                                <li>Size upto 1 MB</li>
                            </ul>
                        </div>
                        <div class="col-lg-12 tx-bold">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Third Prize Point<span class="tx-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="third_prizecoin" placeholder="For e.g.., Sports"  value="{{$data['competition_details']['prize_coins3']}}" required>
                                    <div class="invalid-feedback mg-b-10">This is required</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 tx-right mg-t-25">
                    <div class="form-group row mg-b-0">
                      <div class="col-sm-10">
                        {{-- <button type="submit" class="btn btn-secondary mg-r-15 wd-120">Cancel</button> --}}
                        <button type="submit" class="btn btn-success wd-120" id="cmn_btn">Save</button>
                      </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection