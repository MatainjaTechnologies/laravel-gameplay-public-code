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
                    <li class="breadcrumb-item"><h5>Users</h5></li>
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
                    <th> Name</th>
                    <th> MSIDN</th>
                    <th> Email</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>                                        
                @if(count($list)>0)
                    @foreach($list as $user)
                        <tr>
                            <td> {{$user->id}} </td>
                            <td> {{$user->name}}</td>
                            <td> {{$user->msisdn}}</td>
                            <td> {{$user->email}}</td>
                            <td>
                                {{-- <label id="edit_bnr" for="" data-bnr_id="{{$user->id}}" style="cursor: pointer">
                                    
                                </label> --}}
                                <a href="javascript:void(0);" class="btn btn-info btn-sm ">
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