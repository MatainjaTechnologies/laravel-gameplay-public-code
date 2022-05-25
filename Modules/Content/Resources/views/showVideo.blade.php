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
                                <a href="index.html">Game</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>List All Video</span>
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
                            <div class="portlet light portlet-fit  bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">List Video</span>
                                    </div>
                                    <div class="actions">
                                        {{-- <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        </div> --}}
                                        <div class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                            {{-- <input type="radio" name="options" class="toggle" id="option2">Game List --}}
                                            <a href="{{ url('content/admin/video') }}" class="btn btn-xs cus-btn">Add Video</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">

                                    @if(Session::has('success'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                         {{ Session::get('success') }}
                                    </p>
                                    @endif

                                    <table id="videoTable" class="display" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <td>Id</td>
                                                <td>Name</td>
                                                <td>Image</td>
                                                <td>Description</td>
                                                <td>Top Chart</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td>Id</td>
                                                <td>Name</td>
                                                <td>Image</td>
                                                <td>Description</td>
                                                <td>Top Chart</td>
                                                <td>Action</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                   
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>

            
@endsection            