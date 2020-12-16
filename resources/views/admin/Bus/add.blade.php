@extends('layout/layout')

@section('title')
Add new Bus
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
    <form class="row g-3" action="{{url('/admin_dashboard/Buses/save')}}" method="post">
        @csrf
        <div class="col-md-12">
            <label for="inputName" class="form-label">Bus code</label>
            <input type="text" value="{{old('bus_code')}}" name="bus_code" class="form-control" id="inputName">
        </div>
        <div class="col-md-12">
            <label>Choose the Route</label>
            <select class="form-control" name="route_id">
                <option disabled="disabled" selected="selected">Route</option>
                    @foreach($routes as $route)
                    <option value="{{$route->id}}">{{$route->route_name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>From</label>
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
            <input type="number" value="{{old('total_seats')}}" name="total_seats" class="form-control" id="inputName">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Add Bus</button>
        </div>
    </form>
</div>

@endsection
