@extends('layout/layout')

@section('title')
Route List
@endsection

@section('content')
<div class="container py-5 text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <h2 class="text-center mt-5">Routes</h2>
            <a href="{{url('/admin_dashboard/Routes/add')}}" class="btn btn-primary">Add new Route</a>
            <div class="border mt-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Route Name</th>
                            <th scope="col">Route Code</th>
                            <th scope="col">Stops</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($routes as $route)
                        <tr>
                            <th scope="row">{{$route->id}}</th>
                            <td>{{$route->route_name}}</td>
                            <td>{{$route->route_code}}</td>
                            
                            <td>
                            @foreach($route->stops as $stop)
                            <p>{{$stop->stop_name}}</p>
                            @endforeach
                            </td>
                            
                            <td>
                                <a href="{{url('/admin_dashboard/Routes/edit',$route->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('/admin_dashboard/Routes/delete',$route->id)}}" class="btn btn-danger">Delete</a>
                                            
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