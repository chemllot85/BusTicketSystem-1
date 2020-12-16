@extends('layout/layout')


@section('style')
<style>
body{
    overflow-x: hidden;
}
#home{
    background-image: url(asset/img/home.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 100vh;
}
.home-right{
    background-color:#FC9900;
    height:100%;
}
.home-btn{
    background-color:#063D7D;
    color:#fff;
}
</style>
@endsection

@section('title')
Welcome
@endsection

@section('content')
<section id="home" class="pt-5">
    <div class="home-content">
        <div class="row">
            <div class="col-md-6">
                <div class="home-left">

                </div>
            </div>
            <div class="col-md-6">
                <div class="home-right p-5">
                    <form class="row" action="{{url('/trips')}}" method="post">
                    @csrf
                        <h3 class="py-3">Book Your Ticket</h3>

                        <div class="col-md-6">
                            <select class="form-control" name="route_from">
                                <option disabled="disabled" selected="selected">From</option>
                                    @foreach($stops as $stop)
                                    <option value="{{$stop->stop_name}}">{{$stop->stop_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="route_destination">
                                    <option disabled="disabled" selected="selected">To</option>
                                    @foreach($stops as $stop)
                                    <option value="{{$stop->stop_name}}">{{$stop->stop_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 my-3">
                            <button class="btn w-100 home-btn">See the avaliable trips</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection