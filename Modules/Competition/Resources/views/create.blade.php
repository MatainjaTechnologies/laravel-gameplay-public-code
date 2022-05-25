@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Add Competition</h5></li>
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
        <form class="needs-validation" action="{{ url('admin/competition/submit') }}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
            @csrf
            <div class="row row-xs">                
                <div class="col-lg-5">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Competition Type <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="custom-select select2" name="competition_type" id="competition_type" required>
                                    <option value="">Select...</option>
                                    <option @if (Request::old('competition_type') == "1") selected="selected"  @endif value="1">Daily</option>
                                    <option @if (Request::old('competition_type') == "2") selected="selected"  @endif value ="2">Weekly</option>
                                    <option @if (Request::old('competition_type') == "3") selected="selected"  @endif value="3">Monthly</option>
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
                                    value="{{Request::old('schedule_datepicker_start_date')}}" 
                                    style="display: block;"
                                    autocomplete="off"
                                    required
                                >
                                <div class="invalid-feedback mg-b-10">This is required</div>
                                <input 
                                    id="schedule_datepicker_end_date" 
                                    type="text" 
                                    name="schedule_datepicker_end_date" 
                                    class="form-control schedule-datepicker" 
                                    placeholder="dd-mm-yyyy" 
                                    value="{{Request::old('schedule_datepicker_end_date')}}" 
                                    autocomplete="off"
                                    style="display: none;"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Competition game <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="custom-select select2" name="compgame_name" id="compgame_name" required>
                                    <option value="">Select game</option>
                                    @foreach($game_list as $key=>$game)
                                     <option @if (Request::old('compgame_name') == $key) selected="selected"  @endif value="{{$key}}">{{$game}}</option>
                                    @endforeach
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
                                    <img src="https://via.placeholder.com/350" class="rounded" alt="" id="first_prizeicon_image" >
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
                                    <input type="number" class="form-control" name="first_prizecoin" placeholder="For e.g.., Sports"  value="{{Request::old('first_prizecoin')}}" required>
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
                                    <img src="https://via.placeholder.com/350" class="rounded" alt="" id="bnr" >
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
                                    <input type="number" class="form-control" name="second_prizecoin" placeholder="For e.g.., Sports"  value="{{Request::old('second_prizecoin')}}" required>
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
                                    <img src="https://via.placeholder.com/350" class="rounded" alt="" id="bnr" >
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
                                    <input type="number" class="form-control" name="third_prizecoin" placeholder="For e.g.., Sports"  value="{{Request::old('third_prizecoin')}}" required>
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