@extends('layout/layout')

@section('title')
Add new Seat
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
    <form class="row g-3" action="{{url('/admin_dashboard/Seats/save')}}" method="post">
        @csrf
        <div class="col-md-12">
            <label for="inputName" class="form-label">Seat code</label>
            <input type="text" value="{{old('seat_code')}}" name="seat_code" class="form-control" id="inputName">
        </div>
        <div class="col-md-6">
            <label>Choose the Bus</label>
            <select class="form-control" name="bus_id">
                <option disabled="disabled" selected="selected">Bus</option>
                    @foreach($buses as $bus)
                    <option value="{{$bus->id}}">{{$bus->bus_code}}</option>
                    @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>Choose Seat Status</label>
            <select class="form-control" name="status">
                <option disabled="disabled" selected="selected">Status</option>
                <option value="available">available</option>
                <option value="not_available">not_available</option>
            </select>
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Add Seat</button>
        </div>
    </form>
</div>

@endsection
