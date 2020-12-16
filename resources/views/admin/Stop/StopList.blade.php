@extends('layout/layout')

@section('title')
Stop List
@endsection

@section('content')
<div class="container py-5 text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <h2 class="text-center mt-5">Stops</h2>
            <a href="{{url('/admin_dashboard/Stops/add')}}" class="btn btn-primary">Add new Stop</a>
            <div class="border mt-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Stop Name</th>
                            <th scope="col">Stop Code</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stops as $stop)
                        <tr>
                            <th scope="row">{{$stop->id}}</th>
                            <td>{{$stop->stop_name}}</td>
                            <td>{{$stop->stop_code}}</td>
                            <td>
                                <a href="{{url('/admin_dashboard/Stops/edit',$stop->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('/admin_dashboard/Stops/delete',$stop->id)}}" class="btn btn-danger">Delete</a>
                                            
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