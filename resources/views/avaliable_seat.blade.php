@extends('layout/layout')

@section('style')
@endsection

@section('title')
Avaliable Seats
@endsection

@section('content')
    <div class="container my-5">
        <h3 class="py-4 text-center">Select Your seat</h3>
        <h6 class="text-danger text-center py-4">**You will need to login first before selecting your seat</h6>
        <div class="row">
            @foreach($seats as $seat)
            <div class="col-sm-2">
                @if($seat->status==='available')
                @if(Auth::check())
                <a href="{{url('/trips/seat/book',$seat->id)}}">
                    <button class="btn btn-primary">{{$seat->seat_code}}</button>
                </a>
                @endif
                @else
                <button class="btn btn-primary" disabled>{{$seat->seat_code}}</button>
                @endif
            </div>
            @endforeach
        </div>
    </div>

@endsection