<head>
    <meta charset="UTF-8">
    <title> PND - @yield('htmlheader_title', 'Promotions NextDoor') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ mix('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- bootstrap 3.0.2 -->
    <link href="/vendor/acacha/admin-lte-template-laravel/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="/vendor/acacha/admin-lte-template-laravel/public/fonts/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="/vendor/acacha/admin-lte-template-laravel/public/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="/vendor/acacha/admin-lte-template-laravel/public/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap time Picker -->
    <link href="/vendor/acacha/admin-lte-template-laravel/public/css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="/vendor/acacha/admin-lte-template-laravel/public/css/AdminLTE.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script>
        //See https://laracasts.com/discuss/channels/vue/use-trans-in-vuejs
        window.trans = @php
            // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
            $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
            $trans = [];
            foreach ($lang_files as $f) {
                $filename = pathinfo($f)['filename'];
                $trans[$filename] = trans($filename);
            }
            $trans['adminlte_lang_message'] = trans('adminlte_lang::message');
            echo json_encode($trans);
        @endphp
    </script>
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBysyURjTF7KVkElNF8e_ZVKW1oQ65Tq8&libraries=places"--}}
            {{--async defer></script>--}}
    {{--<script src="{{asset('js/script.js')}}"></script>--}}

</head>
