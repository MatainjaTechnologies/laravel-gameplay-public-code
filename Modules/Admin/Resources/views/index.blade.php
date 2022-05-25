<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png"> -->

    <title>Gammez | Login</title>
    
    <!-- vendor css -->
    <link href="{{asset('admin_theme/css/fontawsome_all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/css/ionicons.min.css')}}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('theme/images/logo.png')}}">
    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('admin_theme/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('admin_theme/css/dashforge.auth.css')}}">
    <link rel="icon" href="{{asset('frontend_theme/images/logo-gemezz-white.png')}}">
  </head>
  <body>

    <div class="content content-fixed content-auth" style="margin-top: 47px;">
        <div class="container">
          <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
            <div class="media-body align-items-center d-none d-lg-flex">
              <div class="mx-wd-600">
                <img src="https://via.placeholder.com/1260x950" class="img-fluid" alt="">
              </div>
            </div>
            <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
              <div class="wd-100p">
                <h3 class="tx-color-01 mg-b-40">Sign In</h3>
                @if(Session::has('flash_message_error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                    {{ Session::get('flash_message_error') }}
                </p>
                @endif
                <form action="{{ url('admin/submit') }}" class="login-form needs-validation" method="post" novalidate>
                    @csrf
                    <div class="form-group">
                        <label>Email address</label>
                        {{-- <input type="email" name="uname" class="form-control" value="{{Request::old('uname')}}" placeholder="yourname@yourmail.com" required> --}}
                        <input type="email" name="email" class="form-control" value="admin@gmail.com" placeholder="yourname@yourmail.com" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter email.
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                            <label class="mg-b-0-f">Password</label>
                            <a href="forgotpassword.html" class="tx-13">Forgot password?</a>
                        </div>
                        <input type="password" name="password" class="form-control" value="password" placeholder="Enter your password" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Password cannot be blank.
                        </div>
                    </div>
                    <button class="btn btn-brand-02 btn-block" id="signIn" type="submit">Sign In</button>
                    {{-- <div class="divider-text">or</div>
                    <button class="btn btn-outline-facebook btn-block">Sign In With Facebook</button>
                    <button class="btn btn-outline-twitter btn-block">Sign In With Twitter</button>
                    <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href=" {{url('/company/signup')}} ">Create an Account</a></div> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    <footer class="footer">
    <div>
        <span>&copy; Matainja Technologies. All rights reserved. </span>
    </div>
    </footer>

    <script src="{{asset('admin_theme/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/dashforge.js')}}"></script>
    <script src="{{asset('admin_theme/js/js.cookie.js')}}"></script>
    <script src="{{asset('admin_theme/js/dashforge.settings.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
      
      (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        $('#signIn').button('loading');
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form) {
          form.addEventListener('submit', function (event) {
            $('#signIn').html('<img src="{{asset('images/loader-img.gif')}}" width=20 />');
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
              // $('#signIn').ajaxStop();
              $('#signIn').html('Sign In');
            }

            form.classList.add('was-validated')
          }, false)
        });
      })();
        
      $(function(){
        'use script'

        window.darkMode = function(){
        $('.btn-white').addClass('btn-dark').removeClass('btn-white');
        }

        window.lightMode = function() {
        $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
        }

        var hasMode = Cookies.get('df-mode');
        if(hasMode === 'dark') {
          darkMode();
        } else {
          lightMode();
        }
      });
    </script>
  </body>
</html>