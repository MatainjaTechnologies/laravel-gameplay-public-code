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
                                <a href="index.html">Competition</a>
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
                                        <span class="caption-subject font-dark sbold uppercase">Edit Competition</span>
                                    </div>
                                    <div class="actions">
                                        {{-- <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        </div> --}}
                                        <div class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                            {{-- <input type="radio" name="options" class="toggle" id="option2">Game List --}}
                                            <a href="{{ url('admin/competition/show') }}" class="btn btn-xs cus-btn">Competition Schedule List</a>
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
                                    <form action="{{ url('admin/competition/' . $data['competition_details']['id'] . '/update') }}" method="POST"  enctype="multipart/form-data" class="form-horizontal">
                                     @csrf
                                     @method('PATCH')

                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                            <div class="form-group">
                                               <label class="control-label col-md-3">Competition Type
                                                 <span class="required"> * </span>
                                               </label>
                                               <div class="col-md-4">
                                               <select class="form-control select2me" name="competition_type" id="competition_type">
                                                        <option value="">Select...</option>
                                                        <option value="1" @if($data['competition_details']['competition_type'] == 1) selected @endif>Daily</option>
                                                        <option value="2" @if($data['competition_details']['competition_type'] == 2) selected @endif>Weekly</option>
                                                        <option value="3" @if($data['competition_details']['competition_type'] == 3) selected @endif>Monthy</option>
                                                    </select>
                                               </div>
                                             </div> 
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Schedule Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input id="schedule_datepicker_start_date" type="text" name="schedule_datepicker_start_date" class="form-control schedule-datepicker" placeholder="dd-mm-yyyy" value="{{$data['competition_details']['start_date']}}" style="display: block;">
                                                    @if($data['competition_details']['competition_type'] != 1)
                                                   <input id="schedule_datepicker_end_date" type="text" name="schedule_datepicker_end_date" class="form-control schedule-datepicker" placeholder=" End Date dd-mm-yyyy" value="{{$data['competition_details']['end_date']}}" style="display: block;">
                                                    @endif  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Competition game
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  <select class="form-control select2me" name="compgame_name" id="compgame_name">
                                                   <option value="">Select day game</option>
                                                   @if(isset($data['games']))
                                                    @foreach($data['games'] as $g)
                                                    <option value="{{$g['id']}}" @if($data['competition_details']['id_competitiongame'] == $g['id'] ) selected @endif>{{$g['name']}}</option>  
                                                   @endforeach
                                                  @endif 
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="form-group last">
                                               <label class="control-label col-md-3">Competition Banner
                                                 <span class="required"> *  </span>
                                               </label>
                                               <div class="col-md-9">
                                                 <div class="fileinput fileinput-new" data-provides="fileinput">
                                                   <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">@php
                                                                $src = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
                                                                if ($data['competition_details']['prize_image1'] != '') {
                                                                    $src = asset('/uploads/prizes/'.$data['competition_details']['id'].'/'.$data['competition_details']['banner_image']);
                                                                }
                                                            @endphp </div>
                                                            <img src="{{$src}}" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                    <div>
                                                    <span class="required"> *527 x 239  </span></div>
                                                   <span class="btn default btn-file">
                                                   <span class="fileinput-new"> Select Competition Banner </span>
                                                   <span class="fileinput-exists"> Change </span>
                                                     <input type="file" id="competition_banner" name="competition_banner" accept="image/*"> </span>
                                                        <a href="javascript:void(0);" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        <input type="hidden" id="first_prizeicon_image_old" name="first_prizeicon_image_old" value ="{{$data['competition_details']['banner_image']}}">
                                                </div>
                                               </div>
                                              </div>
                                             </div>
                                            <div class="form-group last">
                                               <label class="control-label col-md-3">Prize Image Upload
                                                 <span class="required"> * </span>
                                               </label>
                                               <div class="col-md-9">
                                                 <div class="fileinput fileinput-new" data-provides="fileinput">
                                                   <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">@php
                                                                $src = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
                                                                if ($data['competition_details']['prize_image1'] != '') {
                                                                    $src = asset('/uploads/prizes/'.$data['competition_details']['id'].'/'.$data['competition_details']['prize_image1']);
                                                                }
                                                            @endphp </div>
                                                            <img src="{{$src}}" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                   <span class="btn default btn-file">
                                                   <span class="fileinput-new"> Select image for 1st prize </span>
                                                   <span class="fileinput-exists"> Change </span>
                                                     <input type="file" id="first_prizeicon_image" name="first_prizeicon_image" accept="image/*"> </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        <input type="hidden" id="first_prizeicon_image_old" name="first_prizeicon_image_old" value ="{{$data['competition_details']['prize_image1']}}">
                                                </div>
                                               </div>
                                              </div>
                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-3">1st prize avilable points:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input id="first_prizecoin" class="form-control" type="number" name="first_prizecoin" placeholder="1st prize avilable points" value="{{$data['competition_details']['prize_coins1']}}">
                                                </div>
                                            </div>
                                            <div class="form-group last">
                                               <label class="control-label col-md-3">Prize Image Upload
                                                <span class="required"> * </span>
                                               </label>
                                            <div class="col-md-9">
                                               <div class="fileinput fileinput-new" data-provides="fileinput">
                                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">@php
                                                                $src = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
                                                                if ($data['competition_details']['prize_image1'] != '') {
                                                                    $src = asset('/uploads/prizes/'.$data['competition_details']['id'].'/'.$data['competition_details']['prize_image2']);
                                                                }
                                                            @endphp </div>
                                                            <img src="{{$src}}" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                 <div>
                                                    <span class="btn default btn-file">
                                                       <span class="fileinput-new"> Select image for 2nd prize </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                     <input type="file" id="second_prizeicon_image" name="second_prizeicon_image" accept="image/*"> </span>
                                                     <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                     <input type="hidden" id="second_prizeicon_image_old" name="second_prizeicon_image_old" value ="{{$data['competition_details']['prize_image2']}}">
                                                 </div>
                                               </div>                             
                                             </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">2nd prize avilable points:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input id="second_prizecoin" class="form-control" type="number" name="second_prizecoin" placeholder="2nd prize avilable points" value="{{$data['competition_details']['prize_coins2']}}">
                                                </div>
                                            </div>
                                            <div class="form-group last">
                                              <label class="control-label col-md-3">Prize Image Upload
                                              <span class="required"> * </span>
                                              </label>
                                              <div class="col-md-9">
                                                 <div class="fileinput fileinput-new" data-provides="fileinput">
                                                   <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">@php
                                                                $src = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
                                                                if ($data['competition_details']['prize_image2'] != '') {
                                                                    $src = asset('/uploads/prizes/'.$data['competition_details']['id'].'/'.$data['competition_details']['prize_image3']);
                                                                }
                                                            @endphp </div>
                                                            <img src="{{$src}}" alt="" /> </div>
                                                   <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                   <div>
                                                   <span class="btn default btn-file">
                                                       <span class="fileinput-new"> Select image for 3rd prize </span>
                                                         <span class="fileinput-exists"> Change </span>
                                                        <input type="file" id="third_prizeicon_image" name="third_prizeicon_image" accept="image/*"> </span>
                                                         <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                         <input type="hidden" id="third_prizeicon_image_old" name="third_prizeicon_image_old" value ="{{$data['competition_details']['prize_image2']}}">
                                                        </div>
                                                       </div>                             
                                                      </div>
                                                     </div>
                                                    <div class="form-group">
                                                <label class="control-label col-md-3">3rd prize avilable points:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input id="third_prizecoin" class="form-control" type="number" name="third_prizecoin" placeholder="3rd prize avilable points" value="{{$data['competition_details']['prize_coins3']}}">
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
                 </div>
              </form>
                    </div>
                </div>
            </div>
        </div>
@endsection 
         