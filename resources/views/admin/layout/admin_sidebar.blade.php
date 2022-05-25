
<<aside class="aside aside-fixed">
  <div class="aside-header">
    {{-- <a href="{{url('admin/dashboard')}}" class="aside-logo"><img src="{{asset('admin_theme/images/logo.png')}}" width="80" alt="Logo"></a> --}}
    <a href="{{url('admin/dashboard')}}" class="aside-logo"><img class="img-fluid" src="{{asset('frontend_theme/images/logo-gemezz-white.png')}}" width="100" alt="Gemezz"></a>
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>
  <div class="aside-body">

    <ul class="nav nav-aside">
      <li class="nav-label">Main Menu</li>
      <li class="nav-item {{'admin/dashboard' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/dashboard')}}" class="nav-link"><i data-feather="shopping-bag"></i> <span>Dashboard</span></a></li>

      <li class="nav-label mg-t-25">Domain</li>
      <li class="nav-item {{'admin/domain/add'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/domain/add')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add</span></a></li>
      <li class="nav-item {{'admin/domains'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/domains')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>List</span></a></li>

      <li class="nav-label mg-t-25">Game</li>
      <li class="nav-item {{'game/admin/create' == request()->path() ? 'active' : ''}}"><a href="{{url('game/admin/create')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add</span></a></li>
      <li class="nav-item {{'game/admin/list' == request()->path() ? 'active' : ''}}"><a href="{{url('game/admin/list')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>List</span></a></li>


      <li class="nav-label mg-t-25">Category</li>
      <li class="nav-item {{'admin/category/add' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/category/add')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add</span></a></li>
      <li class="nav-item {{'admin/category/all' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/category/all')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>List</span></a></li>

      
      <li class="nav-label mg-t-25">Competition</li>
      <li class="nav-item {{'admin/competition/addcompetition' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/competition/addcompetition')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add</span></a></li>
      <li class="nav-item {{'admin/competition/show' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/competition/show')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>List</span></a></li>
      
      <li class="nav-label mg-t-25"><a href="{{url('admin/winners')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Winners</span></a></li>
      
      <li class="nav-label mg-t-25"><a href="{{url('admin/leaderboard')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Leader Board</span></a></li>
      
      <li class="nav-label mg-t-25">Reward</li>
      <li class="nav-item {{'/admin/reward/add' == request()->path() ? 'active' : ''}}"><a href="{{url('/admin/reward/add')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add New</span></a></li>
      <li class="nav-item {{'/admin/reward/list' == request()->path() ? 'active' : ''}}"><a href="{{url('/admin/reward/list')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>List</span></a></li>

      <li class="nav-label mg-t-25">Language</li>
      <li class="nav-item {{'admin/language/add' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/language/add')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add</span></a></li>
      <li class="nav-item {{'admin/language/all' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/language/all')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>List</span></a></li>

      <li class="nav-label mg-t-25">User</li>
      {{-- <li class="nav-item"><a href="{{url('admin/domain/add')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add</span></a></li> --}}
      <li class="nav-item {{'admin/users' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/users')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>List</span></a></li>

      <li class="nav-label mg-t-25"><a href="{{url('admin/banners')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Home Banner</span></a></li>

      <li class="nav-label mg-t-25"><a href="{{url('admin/subscription/log')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Subscription Log</span></a></li>

    </ul>
  </div>
</aside>
