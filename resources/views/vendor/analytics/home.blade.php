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

                    <th scope="col">Vendor</th>
                    <th scope="col">Running Promotions</th>
                    <th scope="col">Total Promotion</th>
                    <th scope="col">Total Subscribers</th>
                    <th scope="col">Total Likes</th>
                    <th scope="col">Total Payment</th>



                </tr>
                </thead>
                <tbody>



                        <tr>
                            <td>{{$user_name}}</td>
                            <td>{{$RunningPromotionsCount}}</td>
                            <td>{{$TotalPromotionsCount}}</td>
                            <td>{{$TotalSubscriptionsCount}}</td>
                            <td>{{$TotalLikesCount}}.00</td>
                            <td>Rs: {{$TotalPayment}}.00</td>






                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
