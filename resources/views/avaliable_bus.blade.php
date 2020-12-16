@extends('layout/layout')

@section('style')
@endsection

@section('title')
Avaliable Trips
@endsection

@section('content')
<div class="container py-5 text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <h2 class="text-center mt-5">All trips</h2>
            <div class="border mt-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Bus Code</th>
                            <!--<th scope="col">Route</th>-->
                            <th scope="col">From</th>
                            <th scope="col">To</th>

                            <th scope="col">Avaliable seats</th>
                            <th scope="col">Book a seat</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse($buses as $bus)
                            <tr>
                                <td scope="row">{{$bus->id}}</td>
                                <td>{{$bus->bus_code}}</td>
                                
                                <td>{{$bus->source}}</td>
                                <td>{{$bus->dest}}</td>
                                <td>{{$bus->total_seats}}</td>
                                <td>
                                    <a href="{{url('/trips/seats',$bus->id)}}" class="btn btn-primary">Book a seat</a>
                                </td>
                            </tr>
                            @empty
                            <tr>Sorry there's no avaliable trips right now</tr>
                            @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

