@extends('layout/layout')

@section('title')
Add new Route
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
    <form class="row g-3" action="{{url('/admin_dashboard/Routes/add/save')}}" method="post">
        @csrf
        <div class="col-md-6">
            <label for="inputName" class="form-label">Route Name</label>
            <input type="text" value="{{old('name')}}" name="route_name" class="form-control" id="inputName">
        </div>
        <div class="col-md-6">
            <label for="inputCode" class="form-label">Route Code</label>
            <input type="text" value="{{old('code')}}" name="route_code" class="form-control" id="inputCode">
        </div>
        <div class="form-group">
            @foreach($stops as $stop)
                <input type="checkbox" name="stops[]" value="{{$stop->id}}">{{$stop->stop_name}}
            @endforeach
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Add Route</button>
        </div>
    </form>
</div>

@endsection