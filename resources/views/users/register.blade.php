@extends('layout/layout')

@section('style')
@endsection

@section('title')
Register
@endsection
@section('content')

<div class="container my-5">
<h1 class="text-center my-3">Register</h1>
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
<form class="row" action="{{url('users/save')}}" method="post">
    @csrf
    <div class="col-md-6 mb-3">
        <label >First Name</label>
        <input type="text" name="firstName" value="{{old('firstName')}}" class="form-control"  aria-describedby="emailHelp">
    </div>
    <div class="col-md-6 mb-3">
        <label >Last Name</label>
        <input type="text" name="lastName" value="{{old('lastName')}}"class="form-control"  aria-describedby="emailHelp">
    </div>
    <div class="col-md-12 mb-3">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" value="{{old('email')}} "class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="col-md-12 mb-3">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="col-md-12 mb-3">
        <label >Choose Gender</label>
        <select class="form-control" name="gender">
            <option disabled="disabled" selected="selected">Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="col-md-12 mb-3">
        <label >Phone Number</label>
        <input type="text" name="phone" value="{{old('phone')}}" class="form-control"  aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>

@endsection
