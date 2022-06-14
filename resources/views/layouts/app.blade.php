<!doctype html>
<?php
if(app()->getLocale() == 'ar'){ 
  $dir= 'rtl';
  }else{ $dir = 'ltr'; }
?>
<html lang="app()->getLocale()" dir="{{$dir}}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css')}}"/>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
@else
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/main-ltr.css') }}" rel="stylesheet">
@endif
    <title></title>
  </head>
  <body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('img/logo.png')}}"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('index')}}">{{ __('Home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('categories')}}">{{ __('Categories') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('contact-us')}}">{{ __('Contact Us') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('about-us')}}">{{ __('About Us') }}</a>
        </li>
        @if( App::isLocale('ar') )
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('locale','en')}}">{{ __('English') }}</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('locale','ar')}}">{{ __('العربية') }}</a>
        </li>
        @endif
        </ul>

        <ul class="auth">
        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a  href="{{ route('my-account') }}" role="button" >
                                    {{ Auth::user()->name }}
                                </a>

                            </li>
                        @endguest
        </ul>
        <a class="add-ads" href="{{route('add')}}">{{ __('Add advertisement') }}</a>
        
    </div>
  </div>
</nav>





<main class="">
            @yield('content')
        </main>
</div>
<footer class="footer">
<div class="container">
  <div class="row">
    <div class="col-md-4"><h3 class="section-title">{{ __('Categories') }}</h3>
    <ul class="footer-list">
    @foreach ($all_cats as $cat )
        <li>
          <a href="{{route('category', $cat->id)}}">{{ $cat->translate(app()->getLocale())->name }}</a>
        </li>
    @endforeach
    
    </ul>
    </div>
    <div class="col-md-4"><h3 class="section-title">{{ __('Pages') }}</h3>
    <ul class="footer-list">
    <li>
          <a href="{{route('contact-us')}}">{{ __("Contact Us") }}</a></li>
        <li>  <a href="{{route('about-us')}}">{{ __("About Us") }}</a></li>
       <li>   <a href="{{route('privcyf')}}">{{ __("Privacy Policy") }}</a></li>
       <li>   <a href="{{route('login')}}">{{ __("Login") }}</a></li>
       <li>   <a href="{{route('register')}}">{{ __("Register") }}</a></li>
        
    
    </ul>
    </div>
    <div class="col-md-4">
      <div class="about-footer">
        <img class="img-fluid" src="{{asset('img/logo.png')}}"/>
        <p>
        @if(app()->getLocale() == 'ar')
        موقع مخصص للمقايضة 
        اعرض بيع قايض اي شي 
        يمكنك عرضه ومقايضتة
        او بيعه في موقعنا
        @else
        @endif
        </p>
      </div>
    </div>
  </div>
</div>
<div class="footer-bar">جميع الحقوق محفوضه - برمجه وتصميم <a target="_blank" href="https://wecan.jo">WeCan</a> </div>
</footer>

<aside class="mobile-footer">
<ul class="footer-mobile-menu">
  <li><a href="{{route('index')}}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
  <li><a href="{{route('categories')}}"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>
  <li class="center-icon"><a href="{{route('add')}}"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
  <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
  <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
</ul>
</aside>









    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('slick/slick.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    function getValue(id, type) {
            $.ajax({
                url: '{{route("getSelectValue")}}',
                type: 'GET',
                data: {
                    'id': $('#' + id + ' :selected').val(),
                    'type': type
                    
                },
                dataType: 'json',
                success: function (response) {
                    var data = response.data;
                    var target = $('#' + type + '_id');
                    switch (type) {
                        case 'city':
                            target.empty();
                            target.append('<option selected disabled>Select</option>');
                            break;
                        case 'group':
                            target.empty();
                            target.append('<option selected disabled>Select</option>');
                            break;
                        default:
                            target.empty();
                            break;
                    }
                    data.forEach(function (value) {
                        target.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function () {

                }

            });
        }//end getValue
		$('.home-ads-container').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  variableWidth: true,
  @if(app()->getLocale() == 'ar')
   rtl: true
   @endif
});

$(".wapp2").click(function(){
  $(".wapp2").addClass('show')
  return false;
});


	</script>
  </body>
</html>
  
