@extends('admin.layout.admin_template')

@section('admin_content')
<style>
    .profile-wrapper{
        position: sticky;
        text-align: center;
        width: 100%;
    }
    .profile-wrapper button.btn{
        padding: 5px 0;
        text-decoration: none;
    }
    .text-right{
        text-align: right;
    }
</style>
<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><h5>Add Rewards</h5></li>
            </ol>
            </nav>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('flash_message_error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
        {{ Session::get('flash_message_error') }}
    </p>
    @endif
    <form class="needs-validation" action="{{url('/admin/reward/store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
        @csrf
        <div class="row row-xs">              
            <div class="col-lg-5">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Title<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="For e.g.., First prize" name="title" value="{{Request::old('title')}}" required="">
                        </div>
                    </div>            
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Description<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <textarea class="form-control " rows="2" placeholder="For e.g.., details" name="description"  required="">{{Request::old('description')}}</textarea>
                        </div>
                        {{-- summernote --}}
                    </div>            
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Coin<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="For e.g.., 10" name="coin" value="{{Request::old('coin')}}" required="">
                        </div>                
                    </div>            
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Type<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select select2" name="type" id="" required>
                                <option value="">Select Type</option>
                                @foreach ($all_types as $type)
                                    <option @if (Request::old('type') == $type->id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>                
                    </div>            
                </div> 
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>Banner</label>
                        <div class="input-image"></div>
                    </div>
                    <div class="col-sm-12 mg-t-10 tx-bold mg-b-5 bd pd-y-5">
                        N.B:
                        <ul class="tx-danger">
                            <li>PNG or JPEG or JPE</li>
                            <li>Width between 800px and 990px</li>
                            <li>Height 464px</li>
                            <li>Size upto 2 MB</li>
                        </ul>
                    </div>
                </div>           
            </div>            
            <div class="bd-r mg-r-10"></div>
            <div class="clo-md-5">                    
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>Thumbnail </label>
                        <div class="upload-btn-wrapper">
                            <button class="btn btn-outline-secondary">Browse</button>
                            <input type="file" name="thumb_image" id="thumb_image" />
                        </div>
                        <div class="avatar avatar-xxl wd-150 ht-150 mg-b-10" style="margin: 0px auto;">
                            <div class="thumb_image">
                                <img src="https://via.placeholder.com/350" class="rounded" alt="" id="bnr" >
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mg-t-10 tx-bold mg-b-5 bd pd-y-5">
                        N.B:
                        <ul class="tx-danger">
                            <li>PNG or JPEG or JPE</li>
                            <li>Width 256px</li>
                            <li>Height 256px</li>
                            <li>Size upto 1 MB</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-11 tx-right mg-t-25">
                <div class="form-group row mg-b-0">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-secondary mg-r-15 wd-120">Cancel</button>
                    <button type="submit" class="btn btn-success wd-120">Save</button>
                  </div>
                </div>
            </div>
        </div> 
    </form>
</div>
@endsection