@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div class="d-inline-flex">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><h5>Subscription Logs</h5></li>
                </ol>
              </nav>
            </div>
        </div>
        
        <table id="example2" class="table tx-center">
            <thead>
                <tr>
                    <th> Sl No. </th>
                    <th> Date </th>
                    <th> Msisdns </th>
                </tr>
            </thead>
            <tbody>

                @if(count($all)>0)
                    @php
                        $count = 0;
                    @endphp
                    @foreach($all as $key => $subs)
                        @php
                            $count++;
                            @endphp
                        <tr>
                            <td> {{$count}} </td>
                            <td>
                                {{$key}}
                            </td>
                            <td>
                                @foreach ($subs as $sub)
                                    <p>{{$sub['msisdn']}}</p><br>
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
