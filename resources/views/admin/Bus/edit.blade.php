@extends('layout/layout')

@section('title')
Edit Bus {{$bus->bus_code}}
@endsection

@section('content')

<div class="container py-5">
    <div class="border-danger">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <form class="row g-3" action="{{url('/admin_dashboard/Buses/update',$bus->id)}}" method="post">
        @csrf
        <div class="col-md-12">
            <label for="inputName" class="form-label">Bus code</label>
            <input type="text" value="{{$bus->bus_code}}" name="bus_code" class="form-control" id="inputName">
        </div>
        <div class="col-md-12">
            <label>Choose the Route</label>
            <select class="form-control" name="route_id">
                <option disabled="disabled" selected="selected">{{$bus->routes->route_name}}</option>
                    <!--@foreach($routes as $route)
                    <option value="{{$route->id}}">{{$route->route_name}}</option>
                    @endforeach-->
            </select>
        </div>
        <div class="col-md-6">
            <label>Choose From</label>
            <select class="form-control" name="source">
                <option disabled="disabled" selected="selected">From</option>
                    @foreach($stops as $stop)
                    <option value="{{$stop->stop_name}}">{{$stop->stop_name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>From</label>
            <select class="form-control" name="dest">
                <option disabled="disabled" selected="selected">To</option>
                    @foreach($stops as $stop)
                    <option value="{{$stop->stop_name}}">{{$stop->stop_name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <label for="inputName" class="form-label">Number of seat</label>
            <input type="number" value="{{$bus->total_seats}}" name="total_seats" class="form-control" id="inputName">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Edit Bus</button>
        </div>
    </form>
</div>

@endsection
