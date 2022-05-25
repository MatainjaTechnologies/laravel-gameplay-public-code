@extends('layouts.admin_layout.admin_design')
@section('content')
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="index.html">App</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Video</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> 
                       
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Create Video</span>
                                    </div>
                                    <div class="actions">
                                        {{-- <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        </div> --}}
                                        <div class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                            {{-- <input type="radio" name="options" class="toggle" id="option2">Game List --}}
                                            <a href="{{ url('game/admin/list') }}" class="btn btn-xs cus-btn">Video List</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- BEGIN FORM-->
                                    <form action="{{url('/content/admin/video_store')}}"  method="POST" enctype="multipart/form-data" class="form-horizontal">
                                        @csrf
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Video Name" name="name" data-required="1" class="form-control" value="{{Request::old('name')}}" />
                                                    <!-- @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif --> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Video type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="type">
                                                        <option value="">Select...</option>
                                                        <option value="free" @if(Request::old('type')== 'free') selected @endif>Free</option>
                                                        <option value="buy" @if(Request::old('type')== 'buy') selected @endif>buy</option>  
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Category
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="category">
                                                        <option value="">Select...</option>
                                                        @if(!empty($category))
                                                            @foreach($category as $cat)

                                                                <option value="{{$cat['id']}}"  @if($cat['id'] == Request::old('category')) selected @endif>{{$cat['name']}}</option>
                                                                
                                                            @endforeach
                                                        @endif    
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Video Rating
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="rating">
                                                        <option value="">Select...</option>
                                                        @for($i=1;$i<=5;$i++)
                                                        <option value="{{$i}}" @if($i == Request::old('rating')) selected @endif>{{$i}}</option>
                                                        @endfor
                                                          
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Is Home
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="checkbox-list" data-error-container="#form_2_services_error">
                                                        <label>
                                                            <input type="radio" value="1" name="home" />Yes </label>
                                                        <label>
                                                            <input type="radio" value="0" name="home" checked="checked" /> No </label>
                                                    </div>
                                                    
                                                    <div id="form_2_services_error"> </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" name="description" rows="6" data-error-container="#editor2_error" placeholder="Game Description" 
                                                   >{{Request::old('description')}}</textarea>
                                                    <div id="editor2_error"> </div>
                                                </div>
                                            </div>

                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Video Image Upload
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image" accept="image/*"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Video File Upload <span class="required"> * </span></label>
                                                <div class="col-md-9 float-left" style="width: 0px">
                                                    <input type="file" class="dropzone dropzone-file-area " id="game_file" class="form-control" name="video_file">
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group last">
                                                <label class="control-label col-md-3">Multiple Screenshot Upload <span class="required"> * </span></label>
                                                <div class="col-md-9 float-left" style="width: 0px">
                                                <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select multiple image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" id="file-input" name="multiple_image_file[]" multiple /> </span>
                                                            
                                                        </div>
                                                </div>
                                            </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <!-- END FORM-->
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection            