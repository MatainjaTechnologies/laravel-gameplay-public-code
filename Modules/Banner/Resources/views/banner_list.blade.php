@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        @if(Session::has('flash_message_success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
            {{ Session::get('flash_message_success') }}
        </p>
        @endif
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Banners</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                {{-- <a href="{{url('/game/admin/create')}}" class="btn btn-outline-success" >Add Game</a> --}}
                <button id="sample_editable_1_new" class="btn btn-outline-success" data-toggle="modal" data-target="#newCategoryModal"> Add New
                </button>
            </div>
        </div>

        <table id="example2" class="table tx-center display" cellspacing="0" width="100%">
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
                                <a href="javascript:void(0);" class="btn btn-info btn-sm " id="edit_bnr" for="" data-bnr_id="{{$bnr['id']}}" style="cursor: pointer">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    
@endsection