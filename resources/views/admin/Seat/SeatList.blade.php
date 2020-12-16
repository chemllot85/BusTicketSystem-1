@extends('layout/layout')

@section('title')
Bus List
@endsection

@section('content')
<div class="container py-5 text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <h2 class="text-center mt-5">Seats</h2>
            <a href="{{url('/admin_dashboard/Seats/add')}}" class="btn btn-primary">Add new Seat</a>
            <div class="border mt-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Seat Code</th>
                            <th scope="col">Bus Code</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seats as $seat)
                        <tr>
                            <td scope="row">{{$seat->id}}</td>
                            <td>{{$seat->seat_code}}</td>
                            <td>{{$seat->Bus->bus_code}}</td>
                            <td>{{$seat->status}}</td>
                            <td>
                                <a href="{{url('/admin_dashboard/Seats/edit',$seat->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('/admin_dashboard/Seats/delete',$seat->id)}}" class="btn btn-danger">Delete</a>
                                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection