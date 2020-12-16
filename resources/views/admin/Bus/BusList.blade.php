@extends('layout/layout')

@section('title')
Bus List
@endsection

@section('content')
<div class="container py-5 text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <h2 class="text-center mt-5">Busess</h2>
            <a href="{{url('/admin_dashboard/Buses/add')}}" class="btn btn-primary">Add new Bus</a>
            <div class="border mt-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Bus Code</th>
                            <!--<th scope="col">Route</th>-->
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Total no.seat</th>
                            <th scope="col">status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buses as $bus)
                        <tr>
                            <td scope="row">{{$bus->id}}</td>
                            <td>{{$bus->bus_code}}</td>
                            <!--<td></td>-->
                            <td>{{$bus->source}}</>
                            <td>{{$bus->dest}}</td>
                            <td>{{$bus->total_seats}}</td>
                            <td>{{$bus->status}}</td>
                            <td>
                                <a href="{{url('/admin_dashboard/Buses/edit',$bus->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('/admin_dashboard/Buses/delete',$bus->id)}}" class="btn btn-danger">Delete</a>
                                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection