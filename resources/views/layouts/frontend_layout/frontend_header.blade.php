    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-7 header-left">
                    <ul class="logo">
                        <li>
                            <span class="logo-main">
                                <a href="{{ url('/') }}"><img class="img-fluid" src="{{ asset('images/slypee.png')}}" alt="Slypee"></a>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-5 header-right">
                    <ul class="bar">
                        <li>
                            <span class="bar-notif">
                                <a href="{{ url('/notification') }}"><img class="img-fluid" src="{{ asset('images/ico_notification.png')}}" alt="Notification"></a>
                            </span>
                        </li>
                        <li>
                            <span class="bar-profile">
                                <a href="{{ url('/user/profile') }}"><img class="img-fluid" src="{{ asset('images/ico_profile.png')}}" alt="Profile"></a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>