@extends('layout/layout')
@section('title')
Login
@endsection
@section('content')
<div class="container my-5">
<h3 class="text-center my-3">login</h3>
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
<form class="row" action="{{url('users/handleLogin')}}" method="post">
    @csrf
        <div class="col-md-12 mb-3">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
    <div class="col-md-12 mb-3">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection

</div>
