@extends('layouts.app')

@section('content')

    <div class="container p-2 text-center bg-warning-subtle">

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <select class="form-select form-select-sm" name="station_from">
                    <option selected>Select from</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-4 col-sm-6">
                <select class="form-select form-select-sm" name="station_to">
                    <option selected>Select to</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-2 col-sm-6">
                <input class="form-control form-control-sm" type="date" aria-label="form-control-sm example">
            </div>
            <div class="col-md-2 col-sm-6">
                <button class="btn btn-success btn-sm" type="submit">Search</button>
            </div>
        </div>


    </div>

    <div class="container text-center">

    </div>

    <div class="container p-2 d-grid mb-2 gap-2 d-md-flex justify-content-md-center bg-warning-subtle">
        <button class="btn btn-info" type="button">
            <i class="bi bi-caret-left"></i>
            Pre. Day
        </button>
        <button class="btn btn-outline-success" type="button">Today <br> 17/07/2023</button>
        <button class="btn btn-info" type="button">
            Next Day
            <i class="bi bi-caret-right"></i>
        </button>
    </div>

    <div class="container">
        <table class="table table-hover text-center">
            <thead class="table-info">
                <tr>
                    <th scope="col">Coach</th>
                    <th scope="col">Time</th>
                    <th scope="col">Route</th>
                    <th scope="col">Available</th>
                    <th scope="col">Fare</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($trips->isEmpty())
                    <tr>
                        <td>No trip found.</td>
                    </tr>
                @else
                    @foreach ($trips as $trip)
                        <tr>
                            <td class="text-success fw-bold">
                                <span class="font-monospace">Coach:</span>
                                {{ $trip->coach_no }}
                            </td>
                            <td class="text-success fw-bold">{{ $trip->time }}</td>
                            <td class="text-success fw-bold">{{ $trip->route }}</td>
                            <td class="text-success fw-bold">36</td>
                            <td class="text-success fw-bold">
                                @php
                                    $stations = explode(',', $trip->stations);
                                    $lastOption = end($stations);
                                    $lastOptionValue = explode('-', $lastOption)[1];
                                @endphp

                                {{ $lastOptionValue }}
                            </td>
                            <td class="text-success fw-bold">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-id="{{ $trip->id }}">
                                    Book
                                </button>
                            </td>

                            {{-- <td class="text-success fw-bold">
                                <a class="text-decoration-none btn btn-success btn-sm" target="_blank"
                                    href="{{ route('seat_plan', ['trip_id' => $trip->trip_id]) }}">Book</a>
                            </td>
                            <td class="text-success fw-bold">
                                <button type="button" class="btn btn-warning btn-sm">Omit</button> --}}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


    <!-- Modal For Seat Plane -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" id="modal-content">



        </div>
    </div>
</div> --}}


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trip Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalContent">
                        <!-- The fetched data will be inserted here -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>





        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).on('show.bs.modal', '#exampleModal', function(event) {
                var button = $(event.relatedTarget);
                var tripId = button.data('id');
                var modal = $(this);

                $.ajax({
                    url: '/trip/' + tripId,
                    method: 'GET',
                    success: function(response) {
                        // Update the modal content with the fetched view page
                        modal.find('.modal-body').html(response.html);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        </script>

        
    @endsection
