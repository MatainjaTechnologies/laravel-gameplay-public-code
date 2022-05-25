@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Rewards</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Quiz</button> --}}
            </div>
        </div>
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
        <table id="example2" class="table tx-center">
            <thead>
                <tr>
                    <th> Sl No.</th>
                    <th> Title </th>
                    <th> Coin </th>
                    <th> Banner</th>
                    <th> Icon</th>
                    <th> Is_active </th>
                    <th> Created </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>

                @if(count($rewards)>0)
                    @php
                        $count = 0;
                    @endphp
                    @foreach($rewards as $rwd)
                        @php
                            $count++;
                        @endphp
                        @if ($rwd->is_active)
                            @php
                                $checked = 'checked';
                            @endphp
                        @else
                            @php
                                $checked = '';
                            @endphp
                        @endif
                        <tr>
                            <td> {{$count}} </td>
                            <td> {{$rwd->title}}</td>
                            <td> {{$rwd->coin}} </td>
                            <td> 
                                @if ($rwd->banner_image && file_exists( public_path().'/uploads/reward/'.$rwd->id.'/'.$rwd->banner_image ))
                                    @php
                                        $src = asset('/uploads/reward/'.$rwd->id.'/'.$rwd->banner_image);
                                    @endphp
                                @else
                                    @php
                                        $src = 'https://via.placeholder.com/350';
                                    @endphp
                                @endif
                                <img src='{{$src}}' alt="Banner Image"  height="60"> 
                            </td>
                            <td> 
                                @if ($rwd->reward_image && file_exists( public_path().'/uploads/reward/'.$rwd->id.'/'.$rwd->reward_image ))
                                    @php
                                        $tsrc = asset('/uploads/reward/'.$rwd->id.'/'.$rwd->reward_image);
                                    @endphp
                                @else
                                    @php
                                        $tsrc = 'https://via.placeholder.com/350';
                                    @endphp
                                @endif
                                <img src='{{$tsrc}}' alt="Reward Image"  height="60"> 
                            </td>
                            <td> 
                                <input type="checkbox" class="rwd_status" data-reward_id="{{$rwd->id}}" @if ($rwd->is_active == 1) checked  @endif data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="primary" data-offstyle="warning">
                            </td>
                            <td> {{date('d-m-Y', strtotime($rwd->date_created))}} </td>
                            <td>
                                <a href="{{url('/admin/reward/edit/'.$rwd->id)}}" class="tx-success"><i data-feather="edit-2"></i></a>
                                <a href="javascript:void(0)" class="tx-danger rwd_del" data-reward_id="{{$rwd->id}}"><i data-feather="trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
@endsection
