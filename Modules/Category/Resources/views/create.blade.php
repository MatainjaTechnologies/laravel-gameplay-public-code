@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Add Category</h5></li>
                </ol>
                </nav>
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
        <form class="needs-validation" action="{{url('/admin/category/store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
            @csrf
            <div class="row row-xs">                
                <div class="col-lg-5">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Name <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" placeholder="For e.g.., Sports"  value="{{Request::old('name')}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Description <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="2" name="description" placeholder="e.g.., About" required>{{Request::old('description')}}</textarea>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div> --}}
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label>Banner </label>
                            <div class="input-image"></div>
                        </div>
                        {{-- <div id="DocsName">
                            <div class="wd-100p-f ht-30 border-dashed"></div>                    
                        </div> --}}
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
                <div class="bd-r"></div>
                <div class="col-md-5">                    
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label>Icon </label>
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-outline-secondary">Browse</button>
                                <input type="file" name="icon" id="icon_image" />
                            </div>
                            {{-- <div class="avatar avatar-xxl wd-150 ht-150 mg-b-10" style="margin: 0px auto;">
                            </div> --}}
                            <div class="com_img_div icon_image">
                                <img src="https://via.placeholder.com/350" class="rounded" alt="" id="bnr" >
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

                <div class="col-lg-11 tx-left mg-t-25">
                    <div class="form-group row mg-b-0">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-success wd-120" id="cmn_btn">Save</button>
                      </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection