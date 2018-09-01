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
                        <h3 class="box-title">Notifications</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(session()->has('updated_profile'))

                            <p>Notification  {{session()->get('updated')}} </p>

                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>

            </div>

    <div class="row">
        <div class="col-md-12 ">
            <table class="table table-striped table-dark">
                <thead>
                <tr>

                    <th scope="col">Id</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Title</th>

                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Subcategory</th>
                    <th scope="col">Starts</th>
                    <th scope="col">Ends</th>
                    <th scope="col">Created</th>
                    <th scope="col">Promo Code</th>

                </tr>
                </thead>
                <tbody>

                @if($promotions)
                    @foreach($promotions as $promotion)

                        <tr>
                            <th scope="row">{{$promotion->id}}</th>
                            <td>{{$promotion->user->name}}</td>
                            <td><img height="50" src="/images/{{$promotion->image ? $promotion->image : 'no promotion photo'}}" alt=""></td>
                            <td><a href="{{route('promotion.edit' , $promotion->id)}}">{{$promotion->title}}</a></td>
                            <td>{{$promotion->description}}</td>
                            <td>{{$promotion->user->category->name}}</td>
                            <td>{{$promotion->subcategory->name}}</td>
                            <td>{{ Carbon\Carbon::createFromTimestamp(strtotime($promotion->start))->diffForHumans() }}</td>
                            <td>{{ Carbon\Carbon::createFromTimestamp(strtotime($promotion->end))->diffForHumans() }}</td>
                            <td>{{$promotion->created_at->diffForHumans()}}</td>
                            <td>{{ $promotion->promo_code }}</td>

                        </tr>

                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
