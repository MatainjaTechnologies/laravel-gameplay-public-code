@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Edit Domain</h5></li>
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
        <form class="needs-validation" action="{{url('/admin/domain/update')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
            @csrf
            <input type="hidden" name="id" value="{{$dmn_dtl->id}}">
            <div class="row row-xs">
                <div class="col-lg-5">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Name <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <label class="col-form-label form-control">{{$dmn_dtl->domain_name}}</label>
                                {{-- <input type="text" class="form-control" name="domian_name" placeholder="For e.g.., Sports"  value="{{$dmn_dtl->domian_name}}" required> --}}
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Source Path <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="source_path" placeholder="For e.g.., www.facebook.com"  value="{{$dmn_dtl->source_path}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Destination Path <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="destination_path" placeholder="For e.g.., www.google.com"  value="{{$dmn_dtl->destination_path}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Daily Subscription URL <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="daily_subs_url" placeholder="For e.g.., www.youtube.com"  value="{{$dmn_dtl->daily_subs_url}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Weekly Subscription URL <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="weekly_subs_url" placeholder="For e.g.., www.youtube.com"  value="{{$dmn_dtl->weekly_subs_url}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Monthly Subscription URL <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="monthly_subs_url" placeholder="For e.g.., www.youtube.com"  value="{{$dmn_dtl->monthly_subs_url}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Yearly Subscription URL <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="yearly_subs_url" placeholder="For e.g.., www.youtube.com"  value="{{$dmn_dtl->yearly_subs_url}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Renew Subscription URL <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="renew_subs_url" placeholder="For e.g.., www.youtube.com"  value="{{$dmn_dtl->renew_subs_url}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Subscription Notify URL <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="subscribe_notify_url" placeholder="For e.g.., www.wikipedia.org"  value="{{$dmn_dtl->subscribe_notify_url}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Unsubscription Notify URL <span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="unsubscribe_notify_url" placeholder="For e.g.., www.gmail.com"  value="{{$dmn_dtl->unsubscribe_notify_url}}" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bd-r"></div>
                <div class="col-md-5">                    
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label>Logo <span class="tx-danger">*</span></label>
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-outline-secondary">Browse</button>
                                <input type="file" name="logo" id="icon_image" />
                            </div>
                            <div class="com_img_div icon_image">
                                @if ($dmn_dtl->logo && file_exists( public_path().'/uploads/domain/'.$dmn_dtl->id.'/logo/'.$dmn_dtl->logo ))
                                    @php
                                        $b_src = asset('/uploads/domain/'.$dmn_dtl->id.'/logo/'.$dmn_dtl->logo);
                                    @endphp
                                @else
                                    @php
                                        $b_src = 'https://via.placeholder.com/350';
                                    @endphp
                                @endif
                                <img src="{{$b_src}}" class="rounded" alt="" id="bnr" >
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