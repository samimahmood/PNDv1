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

                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Created</th>

                    </tr>
                    </thead>
                    <tbody>

                    @if($subcategories)
                        @foreach($subcategories as $subcategory)

                            <tr>
                                <th scope="row">{{$subcategory->id}}</th>
                                <td><a href="{{route('subcategory.edit' , $subcategory->id)}}">{{$subcategory->name}}</a></td>
                                <th scope="row">{{$subcategory->category->name}}</th>
                                <td>{{$subcategory->created_at}}</td>

                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>

	</div>
@endsection
