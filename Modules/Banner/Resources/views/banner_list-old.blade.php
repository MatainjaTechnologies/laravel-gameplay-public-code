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
                    <span>Banners</span>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="portlet light portlet-fit  bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase">Banner List</span>
                        </div>
                        <div class="actions">
                            <div class="">
                                    <button id="sample_editable_1_new" class="btn green" data-toggle="modal" data-target="#newBannerModal"> Add New
                                        <i class="fa fa-plus"></i>
                                    </button>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Banner List</div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                        <tr>
                                            <th> Id</th>
                                            <th> Image</th>
                                            <th> Position</th>
                                            <th> Game Name</th>
                                            <th> Status </th>
                                            <th> Created at </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(count($banners)>0)
                                            @foreach($banners['banner_list'] as $bnr)
                                                <tr>
                                                    <td> {{$bnr['id']}} </td>
                                                    <td> <img src='{{asset('/uploads/banner/'.$bnr['image'])}}' alt="Banner Image"  height="60"> </td>
                                                    <td> {{$bnr['position']}}</td>
                                                    <td> {{$bnr['name']}}</td>
                                                    <td> {{$bnr['status']}}</td>
                                                    <td> {{$bnr['created_at']}} </td>
                                                    {{-- <td> <a href=""><i class="fa fa-pencil-square-o"></i></a> </td> --}}
                                                    <td>
                                                        <label id="edit_bnr" for="" data-bnr_id="{{$bnr['id']}}" style="cursor: pointer">
                                                            <i class="fa fa-pencil-square-o"></i>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<div class="modal fade" id="newBannerModal" tabindex="-1" role="dialog" aria-labelledby="newBannerModal">
    <div class="modal-dialog modal_body" role="document">
        <div class="modal-content">
        <div class="modal-header green">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title " id="myModalLabel">Add New Banner</h4>
        </div>
        <div class="modal-body">
            <form action="{{url('/banners/create')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <label class="control-label ">Banner Image<span class="required"> * </span></label>
                                </div>
                                <div>
                                    <label class="control-label "><span class="required">(Minimum dimension 330 X 150)</span></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="banner_image" accept="image/*">
                                            </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label ">Game<span class="required"> * </span></label>
                        <select class="form-control" name="game" id="">
                            <option value="">Choose game</option>
                            @foreach ($banners['game_list'] as $bnr)
                            <option @if (Request::old('game') == $bnr['id']) selected=selected @endif value="{{$bnr['id']}}">{{$bnr['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn green">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editBannerModel" tabindex="-1" role="dialog" aria-labelledby="editBannerModel">
    <div class="modal-dialog modal_body" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Banner</h4>
        </div>
        <div class="modal-body">
            <form action="{{url('/edit_banner')}}" method="POST" enctype="multipart/form-data" name="editBannerForm">
                @csrf
                <input type="hidden" name="banner_id" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label class="control-label ">Banner Image<span class="required"> * </span></label>
                                </div>
                                <div>
                                    <label class="control-label "><span class="required">(Minimum dimension 330 X 150)</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" class="bnr_img" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input type="file" name="banner_image" accept="image/*">
                                        </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label ">Game<span class="required"> * </span></label>
                        <select class="form-control" name="game_id" id="game_id">
                            <option value="">Choose game</option>
                            @foreach ($banners['game_list'] as $bnr)
                            <option value="{{$bnr['id']}}">{{$bnr['name']}}</option>
                            {{-- @if (Request::old('game_id') == $bnr['id']) selected=selected @endif --}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn green">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
