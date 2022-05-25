@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        @if(Session::has('flash_message_success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
            {{ Session::get('flash_message_success') }}
        </p>
        @endif
        @if(Session::has('flash_message_error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
            {{ Session::get('flash_message_error') }}
        </p>
        @endif
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Categories</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <a href="{{url('admin/category/add')}}" class="btn btn-outline-success" >Add New</a>
                {{-- <button id="sample_editable_1_new" class="btn btn-outline-success" data-toggle="modal" data-target="#newCategoryModal"> Add New </button> --}}
            </div>
        </div>

        <table id="example2" class="table tx-center">
            <thead>
                <tr>
                    <th> Id</th>
                    <th> Name</th>
                    <th> Short Code</th>
                    <th> Content Type</th>
                    <th> Status </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach($languages as $lan)
                    <tr>
                        <td> {{$lan['id']}} </td>
                        <td> {{$lan['name']}}</td>
                        <td> {{$lan['short_code']}}</td>
                        <td> {{$lan['content_type']}}</td>
                        <td>
                            <input class="status_btn" type="checkbox" @if ($lan['status'] == 1) checked  @endif  data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="primary" data-offstyle="warning">
                        </td>
                        {{-- <td>
                            @if ($cat->icon && file_exists( public_path().'/uploads/category/'.$cat->uuid.'/icon/'.$cat->icon ))
                                @php
                                    $src = asset('/uploads/category/'.$cat->uuid.'/icon/'.$cat->icon);
                                @endphp
                            @else
                                @php
                                    $src = 'https://via.placeholder.com/350';
                                @endphp
                            @endif

                            <img src='{{$src}}' alt="Category Image"  height="60">
                        </td>
                        <td>
                            <input class="status_btn" type="checkbox" @if ($cat['status'] == 1) checked  @endif data-cat_uuid={{$cat['uuid']}}  data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="primary" data-offstyle="warning">
                        </td>
                        <td> {{ date('d-m-Y', strtotime($cat['created_at']))}} </td>--}}
                        <td>
                            <a href="{{url('/admin/language/'.$lan['id'].'/edit')}}" class="btn btn-info btn-sm ">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{url('/admin/language/'.$lan['id'].'/delete')}}" class="btn btn-danger btn-sm lang_del" data-lang_id="{{$lan['id']}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
