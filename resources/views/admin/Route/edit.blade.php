@extends('layout/layout')

@section('title')
Edit {{$Route->route_name}} Route
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
    <form class="row g-3" action="{{url('/admin_dashboard/Routes/edit/update',$Route->id)}}" method="post">
        @csrf
        <div class="col-md-6">
            <label for="inputName" class="form-label">Route Name</label>
            <input type="text" value="{{$Route->route_name}}" name="route_name" class="form-control" id="inputName">
        </div>
        <div class="col-md-6">
            <label for="inputCode" class="form-label">Route Code</label>
            <input type="text" value="{{$Route->route_code}}" name="route_code" class="form-control" id="inputCode">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Edit Route</button>
        </div>
    </form>
</div>

@endsection