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
                    <li class="breadcrumb-item"><h5>Competitions</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <a href="{{url('admin/competition/addcompetition')}}" class="btn btn-outline-success" >Add New</a>
            </div>
        </div>

        <table id="CompetitionDataTable" class="table tx-center display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Game Name</th> 
                    <th>Competition Type</th>
                    <th>Start Date</th>
                    <th>End Date</th> 
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Game Name</th> 
                    <th>Competition Type</th>
                    <th>Start Date</th>
                    <th>End Date</th> 
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection