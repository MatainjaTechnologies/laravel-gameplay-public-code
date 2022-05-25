@extends('admin.layout.admin_template')

@section('admin_content')
  <div class="container-fluid pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard & statistics</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
      </div>
      {{-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> --}}
    </div>
<style>
  .border
  {
    column-rule: 1px solid;
  }
</style>
    <div class="row row-xs">
      <div class="col-sm-6 col-lg-4">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Games</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">500</h3>
            {{-- {{$quiz_set_count}} --}}
          </div>
          <div class="chart-three">
              <div id="flotChart3" class="flot-chart ht-30"></div>
            </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4 mg-t-10 mg-sm-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Subscriber</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">100</h3>
            {{-- {{$subscriber_count}} --}}
          </div>
          <div class="chart-three">
              <div id="flotChart4" class="flot-chart ht-30"></div>
            </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4 mg-t-10 mg-lg-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">User</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1000</h3>
            {{-- {{$user_count}} --}}
          </div>
          <div class="chart-three">
              <div id="flotChart5" class="flot-chart ht-30"></div>
            </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-12 mg-t-10">
        <div class="card ht-100p">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h4 class="mg-b-0">New Subscribers</h4>
          </div>
          {{-- <li class="list-group-item d-flex pd-sm-x-20 border">
            <h6 class="mg-b-0 col-6">Subscriber</h6>
            <h6 class="mg-b-0 col-6">Subscription Date</h6>
          </li> --}}
          <div class="card-body pd-0">
            <div class="table-responsive">
              <table class="table table-dashboard table-dashboard-one tx-center">
                <thead>
                  <tr>
                    <th class="wd-40">Subscriber Name</th>
                    <th class="wd-40">Subscriber Msisdn</th>
                    <th class="wd-25">Subscription Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @forelse ($all as $subs)
                      <tr>
                        <td class="tx-medium">{{$subs->user_details->name}}</td>
                        <td class="tx-medium">{{$subs->user_details->msisdn}}</td>
                        <td class="tx-medium">{{date('d-m-Y', strtotime($subs->start_date))}}</td>
                      </tr>
                    @empty
                      <td class="tx-medium">No record</td>                        
                    @endforelse
                  </tr> 
                </tbody>
              </table>
            </div> 
          </div>
          {{-- <ul class="list-group list-group-flush tx-13">
            @if (count($all_subscribes) > 0)
              @foreach ($all_subscribes as $sb_usr)
              <li class="list-group-item d-flex pd-sm-x-20">
                <div class="avatar">
                  <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">{{ucfirst($sb_usr->user_details->username)}}</p>
                    <small class="tx-12 tx-color-03 mg-b-0">{{$sb_usr->user_details->msisdn}}</small>
                  </div>
                </div>
              </li>
              @endforeach
            @else  
              <li class="list-group-item d-flex pd-sm-x-20">
                <span class="nav-link d-none d-sm-block">No user to show</span>
              </li>
            @endif
          </ul> --}}

      <div class="card-footer text-center tx-13">
        <a href="" class="link-03">View More Subscribers <i class="icon ion-md-arrow-down mg-l-5"></i></a>
        </div>
      </div>  
      {{-- <div class="col-md-6 col-lg-6 mg-t-10">
        <div class="card ht-100p">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">New Users</h6>
          </div>
          <ul class="list-group list-group-flush tx-13">
            @if (count($all_new_users) > 0)
              @foreach ($all_new_users as $usr)
              <li class="list-group-item d-flex pd-sm-x-20">
                <div class="avatar">
                  <span class="avatar-initial rounded-circle bg-gray-600">
                    @if ($usr->image && file_exists('/images/user/'.$usr->id_user.'/'.$usr->image))
                      @php
                        $u_src = asset('/images/user/'.$usr->id_user.'/'.$usr->image);
                      @endphp
                    @else
                      @php
                        $u_src = asset('theme/images/dp.png');
                      @endphp
                    @endif
                    <img class="img-fluid heading-profile-pic" src="{{$u_src}}" alt="Images">
                  </span>
                </div>
                <div class="pd-l-10">
                  <p class="tx-medium mg-b-0">{{ucfirst($usr->username)}}</p>
                  <small class="tx-12 tx-color-03 mg-b-0">{{$usr->msisdn}}</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                  <nav class="nav nav-icon-only">
                    <span class="nav-link d-none d-sm-block">Registration Date: {{date('d-m-Y', strtotime($usr->registration_date))}}</span>
                  </nav>
                </div>
              </li>
              @endforeach
            @else
              <li class="list-group-item d-flex pd-sm-x-20">
                <span class="nav-link d-none d-sm-block">No user to show</span>
              </li>
            @endif
          </ul>
          <div class="card-footer text-center tx-13">
            <a href="#" class="link-03">View More Users <i class="icon ion-md-arrow-down mg-l-5"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 mg-t-10">
        <div class="card ht-100p">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">New Subscribers</h6>
          </div>
          <ul class="list-group list-group-flush tx-13">
            @if (count($all_new_subscribes) > 0)
              @foreach ($all_new_subscribes as $sb_usr)
              <li class="list-group-item d-flex pd-sm-x-20">
                <div class="avatar">
                  <span class="avatar-initial rounded-circle bg-gray-600">
                    @if ($sb_usr->image && file_exists('/images/user/'.$sb_usr->id_user.'/'.$sb_usr->image))
                      @php
                        $us_src = asset('/images/user/'.$sb_usr->id_user.'/'.$sb_usr->image);
                      @endphp
                    @else
                      @php
                        $us_src = asset('theme/images/dp.png');
                      @endphp
                    @endif
                    <img class="img-fluid heading-profile-pic" src="{{$us_src}}" alt="Images">
                  </span>
                </div>
                <div class="pd-l-10">
                  <p class="tx-medium mg-b-0">{{ucfirst($sb_usr->user_details->username)}}</p>
                  <small class="tx-12 tx-color-03 mg-b-0">{{$sb_usr->user_details->msisdn}}</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                  <nav class="nav nav-icon-only">
                    <span class="nav-link d-none d-sm-block">Renewal Date: {{date('d-m-Y', strtotime($sb_usr->renewal_startdate))}}</span>
                  </nav>
                </div>
              </li>
              @endforeach
            @else
              <li class="list-group-item d-flex pd-sm-x-20">
                <span class="nav-link d-none d-sm-block">No user to show</span>
              </li>
            @endif
            </ul>
          <div class="card-footer text-center tx-13">
            <a href="" class="link-03">View More Users <i class="icon ion-md-arrow-down mg-l-5"></i></a>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div>
      <div class="col-md-12 col-lg-12 mg-t-10">
        <div class="card ht-100p">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">New Quiz Sets</h6>
          </div>
          <ul class="list-group list-group-flush tx-13">
            @if (count($all_new_sets) > 0)
              @foreach ($all_new_sets as $set)
              <li class="list-group-item d-flex pd-sm-x-20">
                <div class="avatar">
                  <span class="avatar-initial rounded-circle bg-gray-600">
                    @if ($set->title_image && file_exists( public_path().'/images/quiz_set/'.$set->id.'/icon/'.$set->title_image ))
                      @php
                          $src = asset('/images/quiz_set/'.$set->id.'/icon/'.$set->title_image);
                      @endphp
                    @else
                        @php
                          $src = 'https://via.placeholder.com/350';
                        @endphp
                    @endif
                    <img class="img-fluid heading-profile-pic" src="{{$src}}" alt="Images">
                  </span>
                </div>
                <div class="pd-l-10">
                  <p class="tx-medium mg-b-0">{{ucfirst($set->title)}}</p>
                  <small class="tx-12 tx-color-03 mg-b-0">Category: {{$set->category_title}}</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                  <nav class="nav nav-icon-only">
                    <span class="nav-link d-none d-sm-block">Create Date: {{date('d-m-Y', strtotime($set->date_created))}}</span>
                  </nav>
                </div>
              </li>
              @endforeach
            @else
              <li class="list-group-item d-flex pd-sm-x-20">
                <span class="nav-link d-none d-sm-block">No user to show</span>
              </li>
            @endif
          </ul>
          <div class="card-footer text-center tx-13">
            <a href="{{url('/admin/quizset/list')}}" class="link-03">View More Users <i class="icon ion-md-arrow-down mg-l-5"></i></a>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div> --}}
    </div>
  </div>
@endsection