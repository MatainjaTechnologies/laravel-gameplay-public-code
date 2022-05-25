@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div class="d-inline-flex">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><h5>Leaderboard</h5></li>
                </ol>
              </nav>
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
                    <th> Sl No. </th>
                    <th> Game </th>
                    <th> Competition Date </th>
                    <th> Play Date </th>
                    <th> Msisdn </th>
                    <th> Score </th>
                    <th> Position </th>
                </tr>
            </thead>
            <tbody>

                @if(count($all)>0)
                    @php
                        $count = 0;
                    @endphp
                    @foreach($all as $key => $leaders)
                        @php
                            $count++;
                            @endphp
                        <tr>
                            <td> {{$count}} </td>
                            <td>
                                {{$key}}
                            </td>
                            <td>
                                @foreach ($leaders as $leader)
                                    <p>{{$leader['comp_date']}}</p><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($leaders as $leader)
                                    <p>{{$leader['play_date']}}</p><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($leaders as $leader)
                                    <p>{{$leader['msisdn']}}</p><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($leaders as $leader)
                                    <p>{{$leader['score']}}</p><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($leaders as $leader)
                                    <p>{{$leader['position']}}</p><br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr> <td>No data to show</td></tr>
                @endif

            </tbody>
        </table>
    </div>
@endsection
