@extends('layouts.body')

@section('main-contant')
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th scope="col">Coach</th>
                <th scope="col">Time</th>
                <th scope="col">Route</th>
                <th scope="col">Available</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trips as $trip)
                <tr>
                    <td class="text-success fw-bold">{{ $trip->coach_no }}</td>
                    <td class="text-success fw-bold">{{ $trip->time }} <br> {{ $trip->date }}</td>
                    <td class="text-success fw-bold">{{ $trip->route }}</td>
                    <td class="text-success fw-bold">36</td>
                    <td class="text-success fw-bold">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-id="{{ $trip->trip_id }}">
                            Book
                        </button>
                    </td>

                    <td class="text-success fw-bold">
                        <button type="button" class="btn btn-success btn-sm">Active</button>
                    </td>
                    <td class="text-success fw-bold">
                        <button type="button" class="btn btn-warning btn-sm">Omit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal For Seat Plane -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" id="modal-content">



            </div>
        </div>
    </div> --}}


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trip Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Trip ID: {{ $trip->trip_id }}</p>
                    <!-- Add other trip details here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
