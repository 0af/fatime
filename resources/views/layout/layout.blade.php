<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'FaTime تقویم فارسی')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', 'تقویم فارسی، تبدیل تاریخ و اوقات شرعی')">
    <meta name="keywords" content="@yield('keywords', 'تقویم فارسی,تقویم جلالی, تقویم قمری, تبدیل تاریخ, تبدیل هجری به قمری, تبدیل میلادی به شمسی, مناسبت تقویم')">
    <meta name="copyright" content="Fatime">
    <meta name="theme-color" content="#44bbcc">
    <meta name="author" content="Fatime">
    <meta name="application-name" content="FT">
    <meta name="DC.title" content="@yield('title', 'FaTime تقویم فارسی')">
    <meta name="geo.region" content="IR">
    <meta name="geo.position" content="32.427908;53.688046">
    <meta name="ICBM" content="32.427908, 53.688046">
    <meta property="og:site_name" content="Fatime">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:image" content="/path/to/image.jpg" />
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fatime.com">
    <meta property="og:title" content="@yield('title', 'FaTime تقویم فارسی')">
    <meta property="og:description" content="@yield('description', 'تقویم فارسی، تبدیل تاریخ و اوقات شرعی')">
    {{-- TODO : Complete When Create Logo
    <link rel="shortcut icon" type="image/x-icon" href="https://parsclick.net/img/favicons/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="https://parsclick.net/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://parsclick.net/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://parsclick.net/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://parsclick.net/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://parsclick.net/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://parsclick.net/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://parsclick.net/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://parsclick.net/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://parsclick.net/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://parsclick.net/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://parsclick.net/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://parsclick.net/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://parsclick.net/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="https://parsclick.net/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#FF8000">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">--}}

    <script>
      let digih = '{{ $data["currentHours"] }}';
      let digim = '{{ $data['currentMinutes'] }}';
      let digis = '{{ $data['currentSecond'] }}';
      let currentGregorianDate = '{{ $data['currentGregorianDate'] }}';
      let timeZone = '{{ $data['timeZone'] }}';
      let currentDateForHours = '{{ $data['currentDateForHours'] }}';
    </script>
</head>
<body>
<div id="app" class="bg-cst-light" id="main-container">
    <div class="bg-default fixed-top">
        <nav class="container navbar navbar-expand-lg navbar-dark bg-default">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center">
                    <a class="nav-item nav-link ml-4 active outline-0" href=@if (Request::is('/')){{'#top-of-page'}}@else{{'/'}}@endif>خانه <span class="sr-only">(فعال)</span></a>
                    <a class="nav-item nav-link ml-4 outline-0" href=@if (Request::is('/')){{'#main-calendar-container'}}@else{{'/'}}@endif>تقویم</a>
                    <a class="nav-item nav-link ml-4 outline-0" href=@if (Request::is('/')){{"#religious-prayers"}}@else{{'/'}}@endif>تبدیل تاریخ</a>
                    {{--<a class="nav-item nav-link ml-4" href="#">ثبت نام / ورود</a>--}}
                    <a class="nav-item nav-link ml-4" href="#"></a>
                </div>
            </div>
            <div>
                <div class="text-light d-inline">
                    <span v-text="toPersianNum(pad(digih))"></span>:<span v-text="toPersianNum(pad(digim))"></span>:<span v-text="toPersianNum(pad(digis))"></span>
                </div>
                <div class="text-light d-inline">
                    <span>مورخ :</span>
                ‌</div>
                <div class="text-light d-inline">
                    <span id="navabr-date-y" v-text='toPersianNum("{{ $data['currentDate'] }}")'></span>
                </div>
            </div>
        </nav>
    </div>
    <div class="p-5" id="top-of-page"></div>
    @yield('content')
    @if ($errors->any())
            <div class="modal fade text-right" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">اخطار</h5>
                            <button type="button" class="close float-left ml-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span>این اخطار به دلایل زیر رخ داده است :</span>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="mt-3">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-2">
                            <label for="" class="small text-danger">این اخطار توسط روبات و نیروی انسانی بررسی می شوند و چنانچه محرز شود که درخواست نفوذی بوده، تبعاتی به دنبال خواهد داشت.</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
    @endif
    <div class="gradient-bar"></div>
    <footer class="container-fluid w-100 bg-dark text-white">
        <div class="container text-center pt-5 pb-2">
            <h2> <b class="text-default">F</b><b class="text-default">a</b><b class="text-success">T</b><b class="text-success">i</b><b class="text-success">m</b><b class="text-success">e</b><span class="fa fa-calendar-times-o"></span></h2>
            {{--<ul class="list-inline mb-5 mt-5">
                <li class="list-inline-item ml-5 cursor-pointer"><span class="fa fa-home"></span> صفحه اصلی </li>
                <li class="list-inline-item cursor-pointer"><span class="fa fa-send"></span> تماس با ما </li>
            </ul>--}}
            <span class="d-block mt-5">© طراحی و تولید شده توسط گروه تاریخ فارسی - ایران سال ۱۳۹۷</span>
        </div>
    </footer>
</div>
<script src="{{ mix('js/app.js') }}" ></script>
</body>
</html>