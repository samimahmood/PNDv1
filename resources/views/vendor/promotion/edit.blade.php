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
                        <h3 class="box-title">Example box</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        Put your content here
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
        <div class="row">
            <div class="col-md-9 col-md-offset-1">

            {!! Form::model($promotion,['method' =>'PATCH' , 'action' => ['PromotionController@update' , $promotion->id ], 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title' , null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::text('description' , null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image' , null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('start_date', 'Start Date:') !!}
            {!! Form::date('start_date' , null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('end_date', 'End Date:') !!}
            {!! Form::date('end_date' , null, ['class' => 'form-control']) !!}
        </div>

                <div class="form-group">
                    {!! Form::label('start_time', 'Start Time:') !!}
                    {{ Form::time('start_time', Carbon\Carbon::now()->format('H:i:s'), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {!! Form::label('end_time', 'End Time:') !!}
                    {{ Form::time('end_time', Carbon\Carbon::now()->format('H:i:s'), ['class' => 'form-control']) }}
                </div>

        <div class="form-group">
            {!! Form::submit('Update' , ['class' =>'btn btn-block btn-primary']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method' =>'DELETE' , 'action' => ['PromotionController@destroy' , $promotion->id] ]) !!}


        <div class="form-group">
            {!! Form::submit('Delete' , ['class' =>'btn btn-block btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    </div>
        @include('validation_errors')

    </div>
@endsection
