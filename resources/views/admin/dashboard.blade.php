@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sales Monitoring</li>
            </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
        </div>
        <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
        </div>
        </div>

        <div class="row row-xs">
        <div class="col-sm-6 col-lg-4">
            <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Car</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">250</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">1.2% <i class="icon ion-md-arrow-up"></i></span></p>
            </div>
            <div class="chart-three">
                <div id="flotChart3" class="flot-chart ht-30"></div>
                </div><!-- chart-three -->
            </div>
        </div><!-- col -->
        <div class="col-sm-6 col-lg-4 mg-t-10 mg-sm-t-0">
            <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Driver</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1500</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.7% <i class="icon ion-md-arrow-down"></i></span></p>
            </div>
            <div class="chart-three">
                <div id="flotChart4" class="flot-chart ht-30"></div>
                </div><!-- chart-three -->
            </div>
        </div><!-- col -->
        <div class="col-sm-6 col-lg-4 mg-t-10 mg-lg-t-0">
            <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">User</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1800</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.3% <i class="icon ion-md-arrow-down"></i></span></p>
            </div>
            <div class="chart-three">
                <div id="flotChart5" class="flot-chart ht-30"></div>
                </div><!-- chart-three -->
            </div>
        </div><!-- col -->
        <div class="col-lg-12 mg-t-10">
            <div class="card">
            <div class="card-header pd-y-20 d-md-flex align-items-center justify-content-between">
                <h6 class="mg-b-0">Tracking Map</h6>
            </div><!-- card-header -->
            <div class="card-body pos-relative pd-0">
                <div id="map2" class="ht-300"></div>                  
            </div><!-- card-body -->
            </div><!-- card -->
        </div>
        <div class="col-md-6 col-xl-4 mg-t-10 order-md-1 order-xl-0">
            <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mg-b-0">Trip List</h6>
            </div><!-- card-header -->
            <div class="card-body pd-0">
                <div class="table-responsive">
                <table class="table table-borderless table-dashboard table-dashboard-one tx-center">
                    <thead>
                    <tr>
                        <th class="wd-40">Car</th>
                        <th class="wd-25">Source</th>
                        <th class="wd-35">Destination</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="tx-medium">Tata Nano</td>
                        <td>Shyambazar</td>
                        <td>Dankuni</td>
                    </tr>
                    <tr>
                        <td class="tx-medium">Tata Nano</td>
                        <td>Shyambazar</td>
                        <td>Dankuni</td>
                    </tr>
                    <tr>
                        <td class="tx-medium">Tata Nano</td>
                        <td>Shyambazar</td>
                        <td>Dankuni</td>
                    </tr>
                    <tr>
                        <td class="tx-medium">Tata Nano</td>
                        <td>Shyambazar</td>
                        <td>Dankuni</td>
                    </tr>
                    <tr>
                        <td class="tx-medium">Tata Nano</td>
                        <td>Shyambazar</td>
                        <td>Dankuni</td>
                    </tr>
                    <tr>
                        <td class="tx-medium">Tata Nano</td>
                        <td>Shyambazar</td>
                        <td>Dankuni</td>
                    </tr>
                    <tr>
                        <td class="tx-medium">Tata Nano</td>
                        <td>Shyambazar</td>
                        <td>Dankuni</td>
                    </tr>
                    <tr>
                        <td class="tx-medium">Tata Nano</td>
                        <td>Shyambazar</td>
                        <td>Dankuni</td>
                    </tr>
                    </tbody>
                </table>
                </div><!-- table-responsive -->
            </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-lg-12 col-xl-8 mg-t-10">
            <div class="card mg-b-10">
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <div>
                <h6 class="mg-b-5">Car List</h6>
                </div>
            </div><!-- card-header -->
            <div class="table-responsive">
                <table class="table table-dashboard mg-b-0 tx-center">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Vehicle Class</th>
                    <th>Plate No</th>
                    <th>Seating Capacity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="tx-color-03 tx-normal">Mauti Suzuki</td>
                    <td class="tx-medium">ADF12587</td>
                    <td class="tx-teal">MC EX50CC</td>
                    <td class="tx-pink">WB075AS45</td>
                    <td class="tx-medium">5</td>
                    </tr>
                    <tr>
                    <td class="tx-color-03 tx-normal">Mauti Suzuki</td>
                    <td class="tx-medium">ADF12587</td>
                    <td class="tx-teal">MC EX50CC</td>
                    <td class="tx-pink">WB075AS45</td>
                    <td class="tx-medium">5</td>
                    </tr>
                    <tr>
                    <td class="tx-color-03 tx-normal">Mauti Suzuki</td>
                    <td class="tx-medium">ADF12587</td>
                    <td class="tx-teal">MC EX50CC</td>
                    <td class="tx-pink">WB075AS45</td>
                    <td class="tx-medium">5</td>
                    </tr>
                    <tr>
                    <td class="tx-color-03 tx-normal">Mauti Suzuki</td>
                    <td class="tx-medium">ADF12587</td>
                    <td class="tx-teal">MC EX50CC</td>
                    <td class="tx-pink">WB075AS45</td>
                    <td class="tx-medium">5</td>
                    </tr>
                    <tr>
                    <td class="tx-color-03 tx-normal">Mauti Suzuki</td>
                    <td class="tx-medium">ADF12587</td>
                    <td class="tx-teal">MC EX50CC</td>
                    <td class="tx-pink">WB075AS45</td>
                    <td class="tx-medium">5</td>
                    </tr>
                    <tr>
                    <td class="tx-color-03 tx-normal">Mauti Suzuki</td>
                    <td class="tx-medium">ADF12587</td>
                    <td class="tx-teal">MC EX50CC</td>
                    <td class="tx-pink">WB075AS45</td>
                    <td class="tx-medium">5</td>
                    </tr>
                    <tr>
                    <td class="tx-color-03 tx-normal">Mauti Suzuki</td>
                    <td class="tx-medium">ADF12587</td>
                    <td class="tx-teal">MC EX50CC</td>
                    <td class="tx-pink">WB075AS45</td>
                    <td class="tx-medium">5</td>
                    </tr>
                </tbody>
                </table>
            </div><!-- table-responsive -->
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-md-6 col-lg-6 mg-t-10">
            <div class="card ht-100p">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mg-b-0">New Drivers</h6>
                <div class="d-flex align-items-center tx-18">
                <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                </div>
            </div>
            <ul class="list-group list-group-flush tx-13">
                <li class="list-group-item d-flex pd-sm-x-20">
                <div class="avatar"><span class="avatar-initial rounded-circle bg-gray-600">s</span></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Socrates Itumay</p>
                    <small class="tx-12 tx-color-03 mg-b-0">Driver ID#00222</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
                <li class="list-group-item d-flex pd-x-20">
                <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Reynante Labares</p>
                    <small class="tx-12 tx-color-03 mg-b-0">Driver ID#00221</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
                <li class="list-group-item d-flex pd-x-20">
                <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Marianne Audrey</p>
                    <small class="tx-12 tx-color-03 mg-b-0">Driver ID#00220</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
                <li class="list-group-item d-flex pd-x-20">
                <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo op-5">o</span></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Owen Bongcaras</p>
                    <small class="tx-12 tx-color-03 mg-b-0">Driver ID#00219</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
                <li class="list-group-item d-flex pd-x-20">
                <div class="avatar"><span class="avatar-initial rounded-circle bg-primary op-5">k</span></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Kirby Avendula</p>
                    <small class="tx-12 tx-color-03 mg-b-0">Driver ID#00218</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
            </ul>
            <div class="card-footer text-center tx-13">
                <a href="" class="link-03">View More Drivers <i class="icon ion-md-arrow-down mg-l-5"></i></a>
            </div><!-- card-footer -->
            </div><!-- card -->
        </div>
        <div class="col-md-6 col-lg-6 mg-t-10">
            <div class="card ht-100p">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mg-b-0">New Users</h6>
                <div class="d-flex align-items-center tx-18">
                <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                </div>
            </div>
            <ul class="list-group list-group-flush tx-13">
                <li class="list-group-item d-flex pd-sm-x-20">
                <div class="avatar"><span class="avatar-initial rounded-circle bg-gray-600">s</span></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Socrates Itumay</p>
                    <small class="tx-12 tx-color-03 mg-b-0">User ID#00222</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
                <li class="list-group-item d-flex pd-x-20">
                <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Reynante Labares</p>
                    <small class="tx-12 tx-color-03 mg-b-0">User ID#00221</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
                <li class="list-group-item d-flex pd-x-20">
                <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Marianne Audrey</p>
                    <small class="tx-12 tx-color-03 mg-b-0">User ID#00220</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
                <li class="list-group-item d-flex pd-x-20">
                <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo op-5">o</span></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Owen Bongcaras</p>
                    <small class="tx-12 tx-color-03 mg-b-0">User ID#00219</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
                <li class="list-group-item d-flex pd-x-20">
                <div class="avatar"><span class="avatar-initial rounded-circle bg-primary op-5">k</span></div>
                <div class="pd-l-10">
                    <p class="tx-medium mg-b-0">Kirby Avendula</p>
                    <small class="tx-12 tx-color-03 mg-b-0">User ID#00218</small>
                </div>
                <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                    <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                    <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                    </nav>
                </div>
                </li>
            </ul>
            <div class="card-footer text-center tx-13">
                <a href="" class="link-03">View More Users <i class="icon ion-md-arrow-down mg-l-5"></i></a>
            </div><!-- card-footer -->
            </div><!-- card -->
        </div>
        </div><!-- row -->
    </div>
@endsection