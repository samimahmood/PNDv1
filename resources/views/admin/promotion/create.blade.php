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
                {!! Form::open(['method' =>'POST' , 'action' =>'AdminPromotionController@store' , 'files' => true]) !!}
                <div class="form-group">
                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title' , null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::text('description' , null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="alert alert-info alert-dismissible">

                        <h4> Category </h4>
                        {{$user->category->name}}

                    </div>

                    <div class="form-group">
                        {!! Form::label('subcategory_id', 'Subcategory:') !!}
                        {!! Form::select('subcategory_id' ,[''=>'Choose Option']+$subcategories, null, ['class' => 'form-control']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('image_id', 'Image:') !!}
                        {!! Form::file('image_id' , null, ['class' => 'form-control']) !!}
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
                        {!! Form::submit('Create' , ['class' =>'btn-btn primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
