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
                    <li class="breadcrumb-item"><h5>Games</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <a href="{{url('/game/admin/create')}}" class="btn btn-outline-success" >Add Game</a>
            </div>
        </div>

        <table id="UserDataTable" class="table tx-center display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Game Name</td>
                    <td>Image</td>
                    <td>Description</td>
                    <td>Rule</td>
                    <td>View</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

                </tbody>

                <tfoot>
                    <tr>
                    <td>Id</td>
                    <td>Game Name</td>
                    <td>Image</td>
                    <td>Description</td>
                    <td>Rule</td>
                    <td>View</td>
                    <td>Action</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
