{{-- @php

    $game_menu = '';
    $game_add = '';
    $game_list = '';

    if(Request::is('/')){
        $home_active = 'active';
    }
@endphp --}}
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            
            <li class="nav-item start active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-soccer-ball-o"></i>
                    <span class="title">Game</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('game/admin/create') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Add New</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('game/admin/categories') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('game/admin/list') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Games</span>
                        </a>
                    </li>                                
                </ul>
            </li>
            {{-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-apple"></i>
                    <span class="title">App</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('content/admin/app') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Add New</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('app/admin/categories') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('content/admin/app-list') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Apps</span>
                        </a>
                    </li>                                
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-file-image-o"></i>
                    <span class="title">Wallpaper</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('content/admin/wallpaper') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Add New</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('wallpaper/admin/categories') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('content/admin/wallpaper-list') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Wallpapers</span>
                        </a>
                    </li>                                
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-file-video-o"></i>
                    <span class="title">Video</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('content/admin/video') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Add New</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('video/admin/categories') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('content/admin/video-list') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Videos</span>
                        </a>
                    </li>                                
                </ul>
            </li> --}}
            <li class="nav-item  ">
                <a href="{{ url('/admin/banners') }}" class="nav-link nav-toggle">
                    <i class="fa fa-desktop"></i>
                    <span class="title">Home Banner</span>
                </a>
            </li> 
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-desktop"></i>
                    <span class="title">Competition</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('admin/competition/addcompetition') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Add New</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('admin/competition/show') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Show</span>
                        </a>
                    </li>                             
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-desktop"></i>
                    <span class="title">Media</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('content/admin/media/add') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Add New</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('content/admin/media') }}" class="nav-link ">
                            <i class="fa fa-circle-thin"></i>
                            <span class="title">Show</span>
                        </a>
                    </li>                             
                </ul>
            </li>
            
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>

