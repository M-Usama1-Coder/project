<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="2DpURKG7ivu7T3tTAFyD2WUEcEZZzRuk6wEB8uzM">

    <!-- Meta Tags -->
    <meta name="description" content="">

    <!-- Title-->
    <title>My Apps</title>

    <!-- Styles -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://idm.rcal.me/backend/css/materialadmin-bootstrap.css">
    <link rel="stylesheet" href="https://idm.rcal.me/backend/css/materialadmin.css">
    <link rel="stylesheet" href="https://idm.rcal.me/backend/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://idm.rcal.me/backend/fonts/fontello/fontello.css">
    <link rel="stylesheet" href="https://idm.rcal.me/backend/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://idm.rcal.me/backend/css/libs/toastr/toastr.min.css">
    <link rel="stylesheet" href="https://idm.rcal.me/backend/css/app.css">
    <link rel="stylesheet" href="https://idm.rcal.me/backend/css/pagestyling.css">
    
<style>
    body {
    background: #f7fafc;
  }
    
#loginCard {
    background: white !important;
    max-width: fit-content !important;
    padding: 30px !important;
    margin: 0 auto !important;
    
    border-radius: 14px !important;
    box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.1) !important;
}
#loginCard .row {
    max-width: fit-content;
}
#loginCard > .row {
    max-width: fit-content !important;
}

#loginCard>input{
    padding: 5px;
    border-radius: 8px;
    border: none;
    outline: none;
}
#loginCard input[type=text], #loginCard input[type=email], #loginCard input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border-bottom: 2px solid #ddd;
    border-top: 0;
    border-left: 0;
    border-right: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    border-radius: 5px;
    font-size: 14px;
    color: #666;
    background-color: #f8f8f8;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

#loginCard input[type=text]:focus, #loginCard input[type=email]:focus, #loginCard input[type=password]:focus {
    border-radius: 5px;
    border-bottom: 2px solid #2D6683;
    outline: none !important;
    
}

#loginCard .btnsubmit {
    background-color: #2D6683;
    color: white;
    padding: 8px 15px;
    margin: 8px 0;
    cursor: pointer;
    width: fit-content;
    font-size: 14px;
    font-weight: 600;
    border-radius: 5px;
    border: 2px solid transparent;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
#loginCard .psw {
    font-size: 13px;
    color: #2D6683;
    font-weight: 500;
    text-decoration: none;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
/*.login-page, .login-page #content section,.login-page #content section .section-body, .login-page #content section .section-body .maindivcard{*/
/*    min-height: 100vh*/
    
/*}*/
.titlepageheading {
    font-size: 22px;
}

    
</style>
  
    <!-- Page Level Styles -->
    </head>
    <body class="menubar-hoverable header-fixed menubar-pin">
        <div class="login-page">
            <div id="content" class="text-center">
                <section>
                    <div class="section-body">
                        <div class="row maindivcard">
                            <div class="content" id="loginCard">
                                
                                <div class="title">
                                    <h1 class="titlepageheading">Login</h1>
                                </div>
                                <div class="login-form">
                                    @if (Session::has('message'))
                                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <form class="user" method="post" action="{{ url('auth') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                name="email" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script>
            var successMsg = "";
            var infoMsg = "";
            var warningMsg = "";
            var dangerMsg = "";
            var errorMsg;
            
            //Active links
            var requestUrl = "https://idm.rcal.me/myapps";
        </script>
        <!-- Scripts -->
        <script src="https://idm.rcal.me/backend/js/libs/jquery/jquery-1.11.2.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/libs/bootstrap/bootstrap.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/libs/spin.js/spin.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/libs/autosize/jquery.autosize.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/libs/bootbox/bootbox.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/libs/toastr/toastr.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/core/source/App.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/core/source/AppNavigation.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/core/source/AppCard.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/core/source/AppForm.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/core/source/AppVendor.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/core/source/AppToast.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/core/source/AppBootBox.min.js"></script>
        <script src="https://idm.rcal.me/backend/js/app.js"></script>
        <!-- Page Level Scripts -->
    </body>
{{-- <body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm" style="margin: 60px">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    @if (Session::has('message'))
                                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <form class="user" method="post" action="{{ url('auth') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                name="email" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- Login Content -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/ruang-admin.min.js') }}"></script>

</html> --}}
