@extends('adminlte::page')

@section('htmlheader_title')

    Change Title here!
@endsection


@section('main-content')



	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Locations</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        Add Locations here
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-md-12 ">

            <div class="form-group">
                <label for="">Map</label>
                <input type="text" id="searchmap">
            </div>


                <div id="map">

                </div>


            {!! Form::open(['method' =>'POST' , 'action' => 'LocationController@store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name' , null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                <label for="">Lat</label>
                <input type="text" class="form-control" name="lat" id="lat">
            </div>

            <div class="form-group">
                <label for="">Lng</label>
                <input type="text" class="form-control" name="lng" id="lng">
            </div>



            {{--<button type="button" class="btn btn-block btn-primary">Primary</button>--}}


            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">

                {!! Form::submit('Create' , ['class' =>'btn btn-block btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}



        </div>
    </div>

    <script crossorigin="anonymous" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" src="https://code.jquery.com/jquery-3.1.0.min.js">
    </script>
    {{-- Google map api  --}}

    {{--<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7a-pVRxc_cx00QNTiPWQZW50qxiqZGO0&libraries=places">--}}
    {{--</script>--}}

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBysyURjTF7KVkElNF8e_ZVKW1oQ65Tq8&libraries=places"
            async defer></script>


    <script src="{{asset('js/script.js')}}"></script>
    {{--<script src="{{asset('js/ajaxsearch.js')}}"></script>--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


@endsection
