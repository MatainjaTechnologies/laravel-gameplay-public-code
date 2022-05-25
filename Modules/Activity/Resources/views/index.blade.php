@extends('layouts.frontend_layout.frontend_design_how_to_play')

@section('content')
    <div class="loading align-items-center justify-content-center">
        <img src="images/loading.gif" alt="Loading">
    </div>
    <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="{{ url()->previous() }}" class="header-title-back">
                <img class="img-fluid" src="{{ asset('images/ico_prev_white.png')}}" alt="Prev">
            </a>
            History
        </div>
    </div>

    <div class="content-wrapper">
        <div class="history-box">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="media align-items-center">
                            <img class="mr-3 img-fluid" src="images/img_wallpaper_01.png" alt="Images">
                            <div class="media-body">
                                <h5 class="mt-0">Success Download</h5>
                                <p class="mb-0">Squire Wallpaper</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="position-relative">
                            <p class="text-white" style="margin-bottom: 3px;">12/11/2020</p>
                            <p class="mb-0 text-right">Wallpaper</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="history-box">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="media align-items-center">
                            <img class="mr-3 img-fluid" src="images/game_1.png" alt="Images">
                            <div class="media-body">
                                <h5 class="mt-0">Success Download</h5>
                                <p class="mb-0">Untitled Game</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="position-relative">
                            <p class="text-white" style="margin-bottom: 3px;">12/11/2020</p>
                            <p class="mb-0 text-right">Games</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="history-box">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="media align-items-center">
                            <img class="mr-3 img-fluid" src="images/game_2.png" alt="Images">
                            <div class="media-body">
                                <h5 class="mt-0">Success Download</h5>
                                <p class="mb-0">Another Game</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="position-relative">
                            <p class="text-white" style="margin-bottom: 3px;">12/11/2020</p>
                            <p class="mb-0 text-right">Games</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="history-box">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="media align-items-center">
                            <img class="mr-3 img-fluid" src="images/pic_messi.png" alt="Images">
                            <div class="media-body">
                                <h5 class="mt-0">Success Download</h5>
                                <p class="mb-0">Video Barcelona</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="position-relative">
                            <p class="text-white" style="margin-bottom: 3px;">12/11/2020</p>
                            <p class="mb-0 text-right">Video</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection