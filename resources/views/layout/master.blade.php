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
    <link href="//fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        #header.header-inverse {
            display: inline-flex;
            min-width: 100%;
        }

        .headerbar {
            width: 100%;
        }

        #header.header-inverse {
            background: #bdbfc1;
            color: #2d6683;
            background: white;
        }

        #menubar.menubar-inverse:before {
            background: #2d6683;
        }

        .gui-controls>li>a {
            background: #083d58;
        }

        .menubar-inverse .gui-controls li .title {
            color: white !important;
            text-shadow: none;
        }

        .menubar-inverse .gui-icon {
            color: white;
        }

        .gui-icon {
            position: relative;
            left: none;
            top: none;
        }

        .gui-controls>li>a {
            display: inline-flex !important;
            position: relative;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
        }

        .gui-controls>li>a .title {
            margin-left: 16px;
        }

        #menubar .menubar-foot-panel {
            background: #083d58;
        }

        small.no-linebreak.hidden-folded {
            color: white;
            text-shadow: none;
        }

        .card-body {
            padding: 19px;
            text-align: center;
        }

        #content {
            position: relative;
            width: 100%;
            min-height: calc(100vh - 64px) !important;
            left: 0;
            margin-top: 64px;
            padding-top: 5px;
        }

        #base {
            background: #f7fafc;
        }

        .card {
            box-shadow: none;
            background: none;
            box-shadow: none;
        }

        #content section {
            padding: 0px;
            margin: 0px;
        }

        .home-card {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            background: #ffffff;
            padding-top: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
            box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0);
        }

        .card.home-card {
            margin: 0 5px;
            font-size: 18px;
        }

        .card.home-card:hover {
            box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.2);
        }


        @media (max-width: 768px) {
            .headerbar-right {
                position: relative;
                left: none;
                right: none;
                top: none;
                float: none !important;
                background: #ffffff;
            }

            .header-fixed #header:before {
                display: none;
            }

            .headerbar:before,
            .headerbar:after {
                display: none;
            }

            .headerbar {
                display: inline-flex;
                width: 100%;
                justify-content: space-between;
            }

            .headerbar-left {
                z-index: 1011;
                left: none;
                right: none;
            }

            .header-fixed .headerbar-left {
                position: relative;
            }

            .headerbar-right .header-nav-profile {
                position: relative;
                float: none;
            }

            .headerbar-right {
                position: relative;
                left: none;
                right: none;
                top: 0;
                box-shadow: none;
            }

            .header-inverse .headerbar-left,
            .header-inverse .headerbar-right {
                background: white;
            }

            #content section {
                height: calc(100vh - 64px);
            }

            .row {
                margin: 0px;
            }

            #content {
                position: relative;
                width: 100%;
                min-height: calc(100vh - 64px) !important;
                left: 0;
                margin-top: 0px;
            }

            #content {
                margin-top: 0px;
                padding-top: 0px;
            }


            .home-card {
                /*width: 25%;*/
                /*display: flex;*/
                text-align: center;
                justify-content: center;
                min-width: fit-content;

            }

            .home-card h4,
            .home-card .h4 {
                font-size: 19px;
                border-radius: 19px;
            }
        }

        @media screen and (max-width: 786px) and (min-width: 412px) {
            .card.home-card {
                min-width: fit-content;
            }

        }

        @media screen and (max-width: 1024px) and (min-width: 540) {
            .card.home-card {
                width: 25%;
            }
        }

        @media screen and (max-width: 412px) {
            .home-card {
                width: 50%;
            }

            .card {
                width: 100%;
            }

            .row {
                width: 100%;
            }

            .home-card {
                width: 50%;
            }

            .row.text-center {
                display: inline-flex;
                padding: 15px;
                justify-content: center;
            }

            .home-card {
                padding: 5px 5px;
                width: 100%;
            }
        }


        @media screen and (min-width: 1430px) {
            .card.home-card {
                width: 250px;

            }

        }

        @media screen and (max-width: 430px) {
            .card.home-card {
                width: 44%;

            }

            .home-card h4,
            .home-card .h4 {
                font-size: 17px;
            }
        }

        @media screen and (max-width: 280px) {
            .card.home-card {
                width: 100%;

            }

            .home-card h4,
            .home-card .h4 {
                font-size: 17px;

            }

            .row.text-center {
                display: flex;
                flex-direction: column;
                padding: 15px;
                justify-content: center;
            }

            .card.home-card {
                width: 100%;
                margin: 5px;
            }
        }
    </style>


    <!-- Page Level Styles -->
</head>


<body class="menubar-hoverable header-fixed menubar-pin">
    <!-- BEGIN HEADER -->
    <header id="header" class="header-inverse">
        <div class="headerbar">
            <div class="headerbar-left">
                <ul class="header-nav header-nav-options">
                    <li class="header-nav-brand">
                        <div class="brand-holder">
                            <a href="https://idm.rcal.me">
                                <img src="https://idm.rcal.me/images/logo.webp"><span class="text-lg text-bold text-secondary"></span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="headerbar-right">

                <ul class="header-nav header-nav-profile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            {{ !empty(auth()->user()->first_name) ? auth()->user()->first_name . ' ' . auth()->user()->last_name : auth()->user()->email }}
                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li>
                                <a href="https://idm.rcal.me/logout">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header> <!-- END HEADER -->
    <div id="base">
        <div id="content">
            <section>
                <!-- Container Fluid-->
                @yield('content')
                <!---Container Fluid-->
            </section>
        </div>
        <!-- BEGIN MENUBAR-->
        <div id="menubar" class="menubar-inverse animate">
            <div class="menubar-fixed-panel">
                <div>
                    <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="expanded">
                    <a href="https://idm.rcal.me">
                        <span class="text-lg text-bold text-primary text-uppercase">Identity Manager</span>
                    </a>
                </div>
            </div>
            <div class="menubar-scroll-panel">
                <!-- BEGIN MAIN MENU -->
                <ul id="main-menu" class="gui-controls">

                    <li class="menu ">
                        <a href="{{ url('users') }}">
                            <div class="gui-icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <span class=" title">Users</span>
                        </a>
                    </li>
                    <li class="menu ">
                        <a href="{{ url('applications') }}">
                            <div class="gui-icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <span class="title">Application Management</span>
                        </a>
                    </li>

                </ul>
                <!--end .main-menu -->
                <!-- END MAIN MENU -->
                <div class="menubar-foot-panel">
                    <small class="no-linebreak hidden-folded">
                        <span class="opacity-75">Copyright &#183; 2023 RCAL</span>
                        <br />
                        <strong>
                            <a href="https://idm.rcal.me"></a>
                        </strong>
                    </small>
                </div>
            </div>
            <!--end .menubar-scroll-panel-->
        </div>
        <!--end #menubar-->
        <!-- END MENUBAR -->
    </div>



    </div> --}}
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Powered By <a href="http://kodevglobal.com/"></a> Pvt Ltd {{ date('Y') }}
                </span>
            </div>
        </div>
    </footer>
    <!-- Footer -->
    </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Logout</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="{{ url('signout') }}" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://idm.rcal.me/backend/js/core/source/AppToast.min.js"></script>
<script src="https://idm.rcal.me/backend/js/core/source/AppBootBox.min.js"></script>
<script src="https://idm.rcal.me/backend/js/app.js"></script>




@yield('js')

</html>