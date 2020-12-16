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
    <form class="row g-3" action="{{url('/admin_dashboard/Stops/add/save')}}" method="post">
        @csrf
        <div class="col-md-6">
            <label for="inputName" class="form-label">Stop Name</label>
            <input type="text" value="{{old('stop_name')}}" name="stop_name" class="form-control" id="inputName">
        </div>
        <div class="col-md-6">
            <label for="inputCode" class="form-label">stop Code</label>
            <input type="text" value="{{old('stop_code')}}" name="stop_code" class="form-control" id="inputCode">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Add Stop</button>
        </div>
    </form>
</div>

@endsection