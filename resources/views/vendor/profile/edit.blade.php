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
                        <h3 class="box-title">Your Profile</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        Manage Your Profile
                    </div>

                <!-- /.box-body -->
                </div>


            <div class="row">
                <div class="col-md-9 col-md-offset-1">


                    {!! Form::model($user,['method' =>'PATCH' , 'action' => ['VendorProfileController@update' , $user->id ], 'files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name' , null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email' , null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password:') !!}
                        <br>
                        {!! Form::password('password' , null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', 'Category:') !!}
                        {!! Form::select('category_id' , ['' => 'Choose Option']+ $categories ,null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('image', 'Image:') !!}
                        {!! Form::file('image' , null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('banner', 'Banner:') !!}
                        {!! Form::file('banner' , null, ['class' => 'form-control']) !!}
                    </div>
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('contact', 'Contact:') !!}--}}
                        {{--{!! Form::text('contact' , null, ['class' => 'form-control']) !!}--}}
                    {{--</div>--}}
                    <div class="form-group">
                        {!! Form::label('website', 'Website:') !!}
                        {!! Form::text('website' , null, ['class' => 'form-control']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::submit('Update' , ['class' =>'btn btn-block btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}


                </div>
            </div>

		</div>
	</div>
@endsection
