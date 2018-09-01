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
                {!! Form::model($subcategory,['method' =>'PATCH' , 'action' => ['AdminSubcategoryController@update' , $subcategory->id ], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name' , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update' , ['class' =>'btn btn-block btn-primary']) !!}
                </div>
                {!! Form::close() !!}


                {!! Form::open(['method' =>'DELETE' , 'action' => ['AdminSubcategoryController@destroy' , $subcategory->id] ]) !!}


                <div class="form-group">
                    {!! Form::submit('Delete' , ['class' =>'btn btn-block btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
            </div>
@endsection
