@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div class="d-inline-flex">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><h5>Winners</h5></li>
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
                    <th> Date </th>
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
                    @foreach($all as $key => $winner)
                        @php
                            $count++;
                            @endphp
                        <tr>
                            <td> {{$count}} </td>
                            <td> {{ $key }} </td>
                            <td>
                                @foreach($winner as $wn_key => $wnr)
                                    <p>{{$wnr->msisdn}}</p><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($winner as $wn_key => $wnr)
                                    <p>{{$wnr->game_score}}</p><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($winner as $wn_key => $wnr)
                                    <p>{{$wnr->position}}</p><br>
                                @endforeach
                            </td>
                            {{-- <td>{{$wnr->reward}}</td>
                            <td> 
                                <select name="" id="">
                                    <option @if ($wnr->status == 'sent') selected @endif value="sent">Sent</option>
                                    <option @if ($wnr->status == 'pending') selected @endif value="pending">Pending</option>
                                </select>
                            </td>
                            <td>{{$wnr->voucher_code}}</td> --}}
                        </tr>
                    @endforeach
                @else
                    <tr> <td>No data to show</td></tr>
                @endif

            </tbody>
        </table>
    </div>
@endsection
