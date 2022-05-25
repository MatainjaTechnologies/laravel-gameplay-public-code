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
                    <li class="breadcrumb-item"><h5>Domains</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <a href="{{url('admin/domain/add')}}" class="btn btn-outline-success" >Add New</a>
            </div>
        </div>

        <table id="example2" class="table tx-center">
            <thead>
                <tr>
                    <th> Id</th>
                    <th> Name</th>
                    <th>Image</th>
                    <th>Source Path</th>
                    <th>Destination Path</th>
                    <th> Created at </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>                                        
                @foreach($all as $domain)
                    <tr>
                        <td> {{$domain->id}} </td>
                        <td> {{$domain->domain_name}}</td>
                        <td> 
                            @if ($domain->logo && file_exists( public_path().'/uploads/domain/'.$domain->id.'/logo/'.$domain->logo ))
                            @php
                                    $src = asset('/uploads/domain/'.$domain->id.'/logo/'.$domain->logo);
                                    @endphp
                            @else
                            @php
                                    $src = 'https://via.placeholder.com/350';
                                    @endphp
                            @endif
                            
                            <img src='{{$src}}' alt="Category Image"  height="60"> 
                        </td>
                        <td> {{$domain->source_path}}</td>
                        <td> {{$domain->destination_path}}</td>
                        <td> {{ date('d-m-Y', strtotime($domain->created_at))}} </td>
                        <td>
                            <a href="{{url('/admin/domain/'.$domain->id.'/edit')}}" class="btn btn-info btn-sm ">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm dmn_del" data-dmn_id="{{$domain->id}}"><i class="fas fa-trash-alt"></i></a>
                            <button class="btn btn-info btn-sm domain_dtl_btn" type="button" data-dmn_id="{{$domain->id}}"><i data-feather="eye"></i></button>
                            {{-- <a href="javascript:void(0);" class="btn btn-info btn-sm domain_dtl_btn" data-dmn_id="{{$domain->id}}"> data-toggle="modal" data-target="#exampleModal"
                                <i data-feather="eye"></i>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">DETAILS</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1>Hi</h1>
                {{-- <table class="table table-bordered ">
                    {{-- <th>Domain Name</th>
                    <th>Source path</th>
                    <th>destination path</th>
                @foreach ($dmn_dtl as $dtl)
                 <tr>
                    <td>{{$dmn_dtl['domian_name']}}</td>
                    <td>{{$dmn_dtl['source_path']}}</td>
                    <td>{{$dmn_dtl['destintion_path']}}</td>
                   {{--  </tr>
                @endforeach
            </table> --}}
        {{--</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div> --}}

    @include('components.view_domain')
@endsection