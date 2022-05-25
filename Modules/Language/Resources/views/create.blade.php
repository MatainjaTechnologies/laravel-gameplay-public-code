@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Add Language</h5></li>
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
        <form class="needs-validation" action="{{url('/language/store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
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
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Short Code <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="short_code" placeholder="For e.g.., Sports"  value="{{Request::old('name')}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>


                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Content Type <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="content_type" placeholder="For e.g.., Sports"  value="{{Request::old('name')}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
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
