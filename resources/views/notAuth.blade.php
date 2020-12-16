@extends('layout/layout')

@section('style')
<style>
body{
    overflow-x: hidden;
}
#Auth{
    background-image: url(asset/img/access-denied.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 100vh;
}
</style>
@endsection

@section('title')
Not Authorized
@endsection

@section('content')
<section id="Auth">

</section>
@endsection