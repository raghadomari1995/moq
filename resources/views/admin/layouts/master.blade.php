<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Moqaidah</title>
{{--    <title>{{setting('website_title','en')}}</title>--}}
    <link rel="apple-touch-icon" href="{{asset('img/logo.jpeg')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logo.jpeg')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
{{--    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">--}}
{{--    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">--}}

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/tour/tour.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/picedit.min.css')}}" />
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
{{--                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>--}}
{{--                    </li>--}}
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>


                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{\Auth::user()->name}}</span><span class="user-status">Available</span></div><span><img class="round" src="{{asset(\Auth::user()->image)}}" alt="{{\Auth::user()->name}}" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('admin.users.edit',\Auth::id())}}"><i class="feather icon-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="feather icon-power"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mx-auto"><a class="navbar-brand" href="{{route('dashboard')}}">
                    <div class="brand-logo">
                        <img src="{{asset('img/logo.png')}}" class="img-thumbnail">
                    </div>
{{--                    <h2 class="brand-text mb-0">Vuexy</h2>--}}
                </a></li>
        </ul>
    </div>
{{--    <div class="shadow-bottom"></div>--}}
    <div class="main-menu-content mt-3">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('dashboard'))?'active':''}}"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i><span class="menu-title">Home</span></a> </li>
{{--            <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('log'))?'active':''}}"><a href="{{route('log')}}"><i class="feather icon-activity"></i><span class="menu-title">Activity Timeline</span></a> </li>--}}
{{--            <li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title">Users</span></a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li><a href="{{route('admin.users.index',['type'=>'user'])}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">users</span> <span class="badge badge-success">{{0}}</span> </a></li>--}}
{{--                    <li><a href="{{route('admin.users.index',['type'=>'not_activated'])}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">not activated</span> <span class="badge badge-warning">{{0}}</span> </a></li>--}}
{{--                    <li><a href="{{route('admin.users.index',['type'=>'blocked'])}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">Blocked</span> <span class="badge badge-warning">{{0}}</span> </a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('admin.users.index'))?'active':''}}"><a href="{{route('admin.users.index')}}"><i class="feather icon-users"></i><span class="menu-title" >Users</span></a> </li>
            <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('admin.advertising.index'))?'active':''}}"><a href="{{route('admin.advertising.index')}}"><i class="feather icon-aperture"></i><span class="menu-title" >Advertising</span></a> </li>
            <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('admin.category.index'))?'active':''}}"><a href="{{route('admin.category.index')}}"><i class="feather icon-aperture"></i><span class="menu-title" >Category</span></a> </li>

            @if(auth()->user()->hasRole('super_admin'))
                <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('about'))?'active':''}}"><a href="{{route('about')}}"><i class="feather icon-globe"></i><span class="menu-title" >About</span></a> </li>
                <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('privcy'))?'active':''}}"><a href="{{route('privcy')}}"><i class="feather icon-globe"></i><span class="menu-title" >Privcy</span></a> </li>
                <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('admin.countries.index'))?'active':''}}"><a href="{{route('admin.countries.index')}}"><i class="feather icon-globe"></i><span class="menu-title" >Countries</span></a> </li>
                <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('admin.cities.index'))?'active':''}}"><a href="{{route('admin.cities.index')}}"><i class="feather icon-globe"></i><span class="menu-title" >City</span></a> </li>
                <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('admin.settings.index'))?'active':''}}"><a href="{{route('admin.settings.index')}}"><i class="feather icon-settings"></i><span class="menu-title" >Settings</span></a> </li>
            @endif
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->

             
                    @yield('content')
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{date('Y')}}
{{--            <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>--}}
            All rights Reserved</span>
        <span class="float-md-right d-none d-md-block"></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('app-assets/js/core/app.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/datatables/datatable.js')}}"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/picedit.min.js')}}"></script>

<script>
    @if(\Illuminate\Support\Facades\Session::has('message'))
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{\Illuminate\Support\Facades\Session::get('message')}}',
        showConfirmButton: false,
        timer: 1500
    });
    @endif

    @if(\Illuminate\Support\Facades\Session::has('error'))
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: '{{\Illuminate\Support\Facades\Session::get('error')}}',
        showConfirmButton: false,
        timer: 1500
    });
    @endif
    function fireDeleteEvent(id){
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
                $('#form-'+id).submit();
            }
        })
    }//end fireDeleteEvent
</script>

<!-- END: Page JS-->

<script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-messaging.js"></script>


<script>
    // For Firebase JavaScript SDK v7.20.0 and later, `measurementId` is an optional field
    const firebaseConfig = {
        apiKey: "AIzaSyD1D-7yw8o6m3YZNYUTlDF_vrNK0S_tGPM",
        authDomain: "fresh-delight-164317.firebaseapp.com",
        projectId: "fresh-delight-164317",
        storageBucket: "fresh-delight-164317.appspot.com",
        messagingSenderId: "1080870077265",
        appId: "1:1080870077265:web:301ff735db4733d4970970",
        measurementId: "G-TZ5K7K871L"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function IntitalizeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission");
                return messaging.getToken();
            })
            .then(function (token) {
                console.log("Token : "+token);
                document.getElementById("token").innerHTML=token;
            })
            .catch(function (reason) {
                console.log(reason);
            });
    }//end IntitalizeFireBaseMessaging

    messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
            })
    })
    IntitalizeFireBaseMessaging();
</script>
{{--<script type="text/javascript">--}}
{{--    $(function() {--}}
{{--        $('#image').picEdit({--}}
{{--            formSubmitted: function(response){--}}
{{--                if (response.status == 200){--}}
{{--                    window.location.replace(JSON.parse(response.response).message);--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
                CKEDITOR.replace( 'editor2' );
            </script>
@yield('script')

</body>
<!-- END: Body-->

</html>
