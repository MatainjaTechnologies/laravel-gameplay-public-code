@extends('layouts.admin_layout.admin_design')
@section('content')
{{-- @php
    dd($game_details[0]);
@endphp --}}
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
                                <a href="index.html">Game</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Edit</span>
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
                                        <span class="caption-subject font-dark sbold uppercase">Edit Game</span>
                                    </div>
                                    <div class="actions">
                                        {{-- <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        </div> --}}
                                        <div class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                            {{-- <input type="radio" name="options" class="toggle" id="option2">Game List --}}
                                            <a href="{{ url('game/admin/list') }}" class="btn btn-xs cus-btn">Game List</a>
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
                                    <form action="{{url('/game/admin/edit_game')}}"  method="POST" enctype="multipart/form-data" class="form-horizontal">
                                        <input type="hidden" name="game_uuid" value="{{$game_details[0]->uuid}}">
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
                                                    <input type="text" placeholder="Game Name" name="name" data-required="1" class="form-control" value="{{$game_details[0]->name}}" />
                                                    <!-- @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif --> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Is Home
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="checkbox-list" data-error-container="#form_2_services_error">
                                                        <label>
                                                            <input type="radio" @if ($game_details[0]->is_home == 1)checked="checked" @endif value="1" name="home" />Yes </label>
                                                        <label>
                                                            <input type="radio" @if ($game_details[0]->is_home == 0)checked="checked" @endif value="0" name="home"  /> No </label>
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
                                                   >{{$game_details[0]->description}}</textarea>
                                                    <div id="editor2_error"> </div>
                                                </div>
                                            </div>

                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Game Rule
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" name="rule" rows="6" data-error-container="#editor2_error" placeholder="Rule of Game" >{{$game_details[0]->rule}}</textarea>
                                                    <div id="editor2_error"> </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Category
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="category">
                                                        <option value="">Select...</option>
                                                        @if(!empty($game_details->all_category))
                                                            @foreach($game_details->all_category as $cat)

                                                                <option value="{{$cat['id']}}"  @if($cat['id'] == $game_details[0]->category_id) selected @endif>{{$cat['name']}}</option>
                                                                
                                                            @endforeach
                                                        @endif    
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Version
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="version" data-required="1" class="form-control" placeholder="Version" value="{{$game_details[0]->version}}" /> </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Coin
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="coin" data-required="1" class="form-control" placeholder="Coin" value="{{$game_details[0]->coin}}" /> </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Game Url
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="url" data-required="1" class="form-control" placeholder="url" value="{{$game_details[0]->url}}" /> </div>
                                            </div>

                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Game Image Upload
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            @php
                                                                $src = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
                                                                if ($game_details[0]->image != '') {
                                                                    $src = asset('uploads/games/'.$game_details[0]->id.'/'.$game_details[0]->image);
                                                                }
                                                            @endphp
                                                            <img src="{{$src}}" alt="" /> </div>
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
                                                <label class="control-label col-md-3">Game File Upload <span class="required"> * </span></label>
                                                <div class="col-md-9 float-left" style="width: 0px">
                                                    <input type="file" class="dropzone dropzone-file-area " id="game_file" class="form-control" name="game_file" accept=".zip,.rar,.7zip">
                                                    
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Save</button>
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