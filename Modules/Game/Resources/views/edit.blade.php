@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Edit Game</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <a href="{{url('game/admin/list')}}" class="btn btn-outline-success" >Games</a>
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
        <form class="needs-validation" action="{{url('/game/admin/edit_game')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
            @csrf
            <input type="hidden" name="game_uuid" value="{{$game_details->uuid}}">
            <div class="row row-xs">                
                <div class="col-lg-5">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Name <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" placeholder="For e.g.., Sports"  value="{{$game_details->name}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Is Home
                                <span class="tx-danger"> * </span>
                            </label>
                            <div class="col-sm-8">
                                <div class="checkbox-list" data-error-container="#form_2_services_error">
                                    <label>
                                        <input type="radio" @if ($game_details->is_home == 1)checked="checked" @endif value="1" name="home" />Yes </label>
                                    <label>
                                        <input type="radio" @if ($game_details->is_home == 0)checked="checked" @endif value="0" name="home" checked="checked" /> No </label>
                                </div>
                                
                                <div id="form_2_services_error"> </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Top Chart
                                <span class="tx-danger"> * </span>
                            </label>
                            <div class="col-sm-8">
                                <div class="checkbox-list" data-error-container="#form_2_services_error">
                                    <input type="checkbox" name="top_chart" id="game_type" @if ($game_details->is_top_game == 1)checked="checked" @endif data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="warning">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Description <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="2" name="description" placeholder="e.g.., About" required>{{$game_details->description}}</textarea>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Game Rule <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="2" name="rule" placeholder="e.g.., Rule" required>{{$game_details->rule}}</textarea>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category<span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="custom-select select2" name="category" required="">
                                    <option value="">Select Category</option>
                                    @if(!empty($game_details->all_category))
                                        @foreach($game_details->all_category as $cat)
                                        <option value="{{$cat['id']}}"  @if($cat['id'] == $game_details->category_id) selected @endif>{{$cat['name']}}</option>                                    
                                        @endforeach
                                    @endif
                                </select>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Version <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="version" placeholder="For e.g.., 1.0.0"  value="{{$game_details->version}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Coin <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="coin" placeholder="For e.g.., 100"  value="{{$game_details->coin}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">URL <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="url" placeholder="For e.g.., www.google.com"  value="{{$game_details->url}}" >
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Game File Upload <span class="tx-danger">*</span> </label>
                        <div class="col-lg-8"> 
                            <div class="dropzone-file-area">
                                <input class="form-control dropzone  "  type="file" name="game_file" id="game_file" name="game_file" accept=".zip,.rar,.7zip" />
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="bd-r"></div>
                <div class="col-md-5">   
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label>Cover <span class="tx-danger">*</span> </label>
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-outline-secondary">Add</button>
                                <input type="file" name="cover_image" id="cover_image"/>
                            </div>
                            <div class="avatar avatar-xxl wd-150 ht-150 mg-b-10" style="margin: 0px auto;">
                                @if ($game_details->cover_image && file_exists( public_path().'/uploads/games/'.$game_details->id.'/cover_image/'.$game_details->cover_image ))
                                    @php
                                        $cov_src = asset('/uploads/games/'.$game_details->id.'/cover_image/'.$game_details->cover_image );
                                    @endphp
                                @else
                                    @php
                                        $cov_src = 'https://via.placeholder.com/650';
                                    @endphp
                                @endif
                                <div class="cover_image">
                                    <img src="{{$cov_src}}" class="rounded" alt="" id="bnr" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mg-t-10 tx-bold mg-b-5 bd pd-y-5">
                            N.B:
                            <ul class="tx-danger">
                                <li>PNG or JPEG or JPG</li>
                                <li>Size upto 2 MB</li>
                                <li>Ratio 705 X 441</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label>Image </label>
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-outline-secondary">Add</button>
                                <input type="file" name="image[]" id="gameImages" multiple />
                            </div>
                            {{-- <div class="input-image"></div> --}}
                        </div>
                        <div id="preview-image"></div>
                        <div class="col-sm-12 mg-t-10 tx-bold mg-b-5 bd pd-y-5">
                            N.B:
                            <ul class="tx-danger">
                                <li>PNG or JPEG or JPG</li>
                                <li>Size upto 2 MB</li>
                                {{-- <li>Width between 800px and 990px</li>
                                <li>Height 464px</li> --}}
                            </ul>
                        </div>
                    </div>   
                    <div class="col-lg-12">
                       
                    @if(isset($game_details->image))

                        @if(count($game_details->image) > 0)
                            
                        {{-- @if ($game_details->image && file_exists( public_path().'/uploads/games/'.$game_details->id.'/'.$game_details->image)) --}}
                        <div class="com_img_prev_div banner_image">
                            <label>Old Images </label>
                            <div class="imgs"></div>
                                @foreach ($game_details->image as $img)
                                    @php
                                        $src = asset('uploads/games/'.$game_details->id.'/'.$img);
                                    @endphp
                                    {{-- <div class="wd-130">
                                        <i data-feather="x" class="pos-absolute wd-25 ht-25 bg-white rounded-15 pd-4 r--8 t--15 remove remove_btn" style="cursor: pointer;">X</i>
                                    </div> --}}
                                    <img src="{{$src}}" style="height: 8rem; width: 8rem;border-radius: 7px; margin-top:2px">                                    
                                @endforeach
                        </div>
                        @endif  
                    @endif  

                    </div>
                </div>

                <div class="col-lg-11 tx-left mg-t-25">
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