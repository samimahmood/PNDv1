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
                        Your Locations
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
                        <th scope="col">Vendor</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Created</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($locations)
                        @foreach($locations as $location)

                            <tr>
                                <th scope="row">{{$location->id}}</th>
                                <td><a href="{{route('location.show' , $location->id)}}">{{$location->name}}</a></td>
                                <td>{{$location->user->name}}</td>
                                <td>{{$location->lng}}</td>
                                <td>{{$location->lat}}</td>
                                <td>{{$location->created_at->diffForHumans()}}</td>
                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
