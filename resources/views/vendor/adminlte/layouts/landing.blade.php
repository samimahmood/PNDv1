<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->


<html lang="en">
<head>

    <style>


        #home-bg-video {
            position: fixed;
            top: 50%;
            left: 50%;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            background-size: cover;
        }
        #home-overlay {
            background-color: rgba(0, 0, 0, 0.8);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }

        #home-content {
            width: 100%;
            height: 100%;
            display: table;
            padding-top: 20%;
        }

        #home-content-inner {
            display: table-cell;
            vertical-align: middle;
        }

        #home-heading h1 {
            color: #fff;
            font-size: 65px;
            font-weight: 100;
            text-transform: uppercase;
            margin: 0;
            display: inline-block;
        }

        #home-heading h1 span {
            color: #f4c613;
            font-weight: 500;
        }

        #home-text p {
            color: #fff;
            font-size: 17px;
            font-weight: 100;
            margin: 8px 0 30px 0;
        }

        .btn-general {
            font-family: 'Raleway', sans-serif;
            border-radius: 28px;
            font-size: 13px;
            text-transform: uppercase;
            margin: 0 6px;
            padding: 12px 46px 12px 46px;
            -webkit-transition: all .5s;
            transition: all .5s;
        }

        .btn-home {
            color: #fff;
            border: 1px solid #fff;
        }

        .btn-home:hover,
        .btn-home:focus {
            color: #fff;
            background-color: #f4c613;
            border: 1px solid #f4c613;
        }

    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>PND</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

{{--<div id="app" v-cloak>--}}
{{--<!-- Fixed navbar -->--}}
{{--<div id="navigation" class="navbar navbar-default navbar-fixed-top">--}}
{{--<div class="container">--}}
{{--<div class="navbar-header">--}}
{{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}
{{--<a class="navbar-brand" href="#"><b>Promotion NextDoor</b></a>--}}
{{--</div>--}}
{{--<div class="navbar-collapse collapse">--}}

{{--<ul class="nav navbar-nav navbar-right">--}}
{{--@if (Auth::guest())--}}
{{--<li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>--}}
{{--<li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>--}}
{{--@else--}}
{{--<li><a href="/home">{{ Auth::user()->name }}</a></li>--}}
{{--@endif--}}
{{--</ul>--}}
{{--</div><!--/.nav-collapse -->--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<!-- Home -->
<section id="home">

    <!-- Background Video -->
    <video id="home-bg-video" poster="video/solo.jpg" autoplay loop muted>
        <source src="images/PND-TVC.mp4" type="video/mp4">

        <!--
                    <source src="video/solo.mp4" type="video/mp4">
                    <source src="video/solo.ogv" type="video/ogg">
                    <source src="video/solo.webm" type="video/webm">
        -->
    </video>

    <!-- Overlay -->
    <div id="home-overlay"></div>

    <!-- Home Content -->
    <div id="home-content">

        <div id="home-content-inner" class="text-center">

            <div id="home-heading">
                <h1 id="home-heading-1">Promotions</h1><br>
                <h1 id="home-heading-2"> <span>NextDoor</span></h1>
            </div>

            <div id="home-text">
                <p>Best Discounts. Anywhere, Anytime.</p>
            </div>

            <div id="home-btn">
                <a class="btn btn-general btn-home smooth-scroll" href="/login" title="Start Now" role="button">Login</a>
                <a class="btn btn-general btn-home smooth-scroll" href="/register" title="Start Now" role="button">Register</a>
            </div>

        </div>

    </div>

    <!-- Arrow Down -->
    <a href="#about" id="arrow-down" class="smooth-scroll">
        <i class="fa fa-angle-down"></i>
    </a>

</section>
<!-- Home Ends -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>

{{--<script>--}}
{{--$(function() {--}}
{{--$( "#calendar1" ).datepicker();--}}
{{--$( "#calendar2" ).datepicker();--}}
{{--});--}}
{{--</script>--}}



<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>

</body>
</html>
