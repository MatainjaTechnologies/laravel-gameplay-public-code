@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div class="d-inline-flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><h5>Prizes</h5></li>
                    </ol>
                </nav>
            </div>
            <div class="d-inline-flex float-right">
                <a href="#offCanvas3" class="btn btn-sm pd-x-15 btn-white btn-uppercase mn-ht-0 off-canvas-menu prz_btn" data-type="add"><i data-feather="plus" class="wd-10 mg-r-5"></i> Add New</a>
            </div>
        </div>

        <div id="offCanvas3" class="off-canvas off-canvas-overlay off-canvas-right @if ($errors->any())  show @endif wd-400">
            <a href="#" class="close"><i data-feather="x"></i></a>
    
            <div class="pd-25 ht-100p tx-13">
                <h6 class="tx-inverse mg-t-30 mg-b-25">Add Prize</h6>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
                <form class="needs-validation" action="{{url('/admin/prize/store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Reward text<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" name="reward_text" class="form-control" value="{{Request::old('reward_text')}}" required>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Point to exchanged <span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" name="points" class="form-control" value="{{Request::old('points')}}" required>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Quantity <span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" name="quantity" class="form-control" value="{{Request::old('quantity')}}" required>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                    
                    <div class="form-group row mg-b-0">
                        <div class="col-sm-10 tx-center">
                            <button type="submit" class="btn btn-success wd-120">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="offCanvas1" class="off-canvas off-canvas-overlay off-canvas-right @if ($errors->any()) show @endif wd-400">
            <a href="#" class="close"><i data-feather="x"></i></a>
    
            <div class="pd-25 ht-100p tx-13">
                <h6 class="tx-inverse mg-t-30 mg-b-25">Edit Prize</h6>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
                <form class="needs-validation" action="{{url('/admin/prize/update')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
                    @csrf
                    <input type="hidden" name="prize_id" value="" id="prize_id">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Reward text<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" name="reward_text" id="reward_text" class="form-control" value="{{Request::old('reward_text')}}" required>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Point to exchanged <span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" name="points" id="points" class="form-control" value="{{Request::old('points')}}" required>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Quantity <span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" name="quantity" id="quantity" class="form-control" value="{{Request::old('quantity')}}" required>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                    
                    <div class="form-group row mg-b-0">
                        <div class="col-sm-10 tx-center">
                            <button type="submit" class="btn btn-success wd-120">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        @if(Session::has('flash_message_error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
            {{ Session::get('flash_message_error') }}
        </p>
        @endif
        @if(Session::has('flash_message_success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
            {{ Session::get('flash_message_success') }}
        </p>
        @endif
        <table id="example2" class="table tx-center">
            <thead>
                <tr>
                    <th> Sl No.</th>
                    <th> Reward Text</th>
                    <th> Point to exchanged</th>
                    <th> Quantity</th>
                    <th> Status </th>
                    <th> Created at </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>

                @if(count($all)>0)
                    @php
                        $count = 0;
                    @endphp
                    @foreach($all as $prz)
                        @php
                            $count++;
                        @endphp
                        @if ($prz->is_active == '1')
                            @php
                                $checked = 'checked';
                            @endphp
                        @else
                            @php
                                $checked = '';
                            @endphp
                        @endif
                        <tr>
                            <td> {{$count}} </td>
                            <td> {{$prz->reward_text}}</td>
                            <td> {{$prz->points}}</td>
                            <td> {{$prz->quantity}}</td>
                            <td> 
                                <input type="checkbox" class="prze_status" data-prz_id="{{$prz->id}}" @if ($prz->is_active == 1) checked  @endif data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="primary" data-offstyle="warning">
                            </td>
                            <td> {{date('d-m-Y', strtotime($prz->date_added))}} </td>
                            <td>
                                <a href="#offCanvas1" class="tx-success off-canvas-menu prz_btn" data-type="edit" data-prize_id="{{$prz->id}}"><i data-feather="edit-2"></i></a>
                                <a href="javascript:void(0)" class="tx-danger prz_del" data-prize_id="{{$prz->id}}"><i data-feather="trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
@endsection
