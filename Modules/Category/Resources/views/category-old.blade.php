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
                    <a href="index.html">@php echo ucfirst(trans(request()->route()->parameters['type'])) @endphp </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Category</span>
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
                            <span class="caption-subject font-dark sbold uppercase">Category List</span>
                        </div>
                        <div class="actions">
                            <div class="">
                                    <button id="sample_editable_1_new" class="btn green" data-toggle="modal" data-target="#newCategoryModal"> Add New
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
                                    <i class="fa fa-globe"></i>Game Category List</div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                        <tr>
                                            <th> Id</th>
                                            <th> Name</th>
                                            <th> Status </th>
                                            <th> Created at </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @if(count($categories)>0)
                                            @foreach($categories as $cat)
                                                <tr>
                                                    <td> {{$cat['id']}} </td>
                                                    <td> {{$cat['name']}}</td>
                                                    <td> {{$cat['status']}}</td>
                                                    <td> {{$cat['created_at']}} </td>
                                                    {{-- <td> <a href=""><i class="fa fa-pencil-square-o"></i></a> </td> --}}
                                                    <td>
                                                        <label id="edit_cat" for="" data-cat_uuid="{{$cat['uuid']}}" style="cursor: pointer"> 
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
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Create Category</h4>
        </div>
        <div class="modal-body">
            <form action="{{url('/category/admin/storeCategory')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="type" value="{{request()->route()->parameters['type']}}">
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label ">Category Name<span class="required"> * </span></label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Category Name" >
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
<div class="modal fade" id="editCategoryModel" tabindex="-1" role="dialog" aria-labelledby="editCategoryModel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
        </div>
        <div class="modal-body">
            <form action="{{url('/category/admin/editCategory')}}" method="POST" enctype="multipart/form-data" name="editCategoryForm">
                @csrf
                <input type="hidden" name="cat_uuid" >
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label ">Category Name<span class="required"> * </span></label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Category Name" >
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