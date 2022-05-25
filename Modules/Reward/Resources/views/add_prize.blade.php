@extends('admin.admin_template')

@section('admin_content')
    <style>
        .profile-wrapper{
            position: sticky;
            text-align: center;
            width: 100%;
        }
        .btn, .ui-datepicker-buttonpane button, .sp-container button{
            padding: 5px 0px;
            text-decoration: none !important;
        }
        .label-match{
            width: 100%;
            margin: 15px auto;
        }
        .btn-success{
            background-color: #337ab7;
        }
    </style>
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Add prize</h5></li>
                </ol>
            </nav>
        </div>

        <form class="needs-validation" action="{{url('/admin/prize/store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
            @csrf
            <div class="row row-xs">
                <div class="col-lg-5">
                    <div class="form-group row label-match">
                        <label class="col-sm-4 col-form-label">Reward text:</label>
                        <input type="text" name="reward_text" class="form-control" value="{{Request::old('reward_text')}}" required>
                    </div>
                    <div class="form-group row label-match">
                        <label class="col-sm-4 col-form-label">Point to exchanged:</label>
                        <input type="text" name="points" class="form-control" value="{{Request::old('points')}}" required>
                    </div>
                    <div class="form-group row label-match">
                        <label class="col-sm-4 col-form-label">Quantity:</label>
                        <input type="text" name="quantity" class="form-control" value="{{Request::old('quantity')}}" required>
                    </div>
                    
                    <div class="save-btn">
                        <button type="submit" class="btn btn-success wd-120">Save</button>
                    </div>
                </div>      
            </div>
        </form>
    </div>
@endsection