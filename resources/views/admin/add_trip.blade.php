@extends('layouts.app')

@section('content')

    <div class="container pb-2 d-grid d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tripAddModal">
            New Trip
        </button>
    </div>

    <div class="container">
        <table class="table table-hover text-center">
            <thead class="table-info">
                <tr>
                    <th scope="col">Coach</th>
                    <th scope="col">Time</th>
                    <th scope="col">Route</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
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
                            <td class="text-success fw-bold">{{ $trip->status }}</td>
                            <td class="text-success fw-bold">
                                @if ($trip->status == 1)
                                    <a type="button" class="btn btn-danger btn-sm"
                                        href="{{ route('admin.main_trip.status', ['trip_id' => $trip->id, 'id' => 0]) }}">
                                        Omit
                                    </a>
                                @else
                                    <a type="button" class="btn btn-success btn-sm"
                                        href="{{ route('admin.main_trip.status', ['trip_id' => $trip->id, 'id' => 1]) }}">
                                        Active
                                    </a>
                                @endif

                            </td>
                            <td class="text-success fw-bold">
                                <a type="button" class="btn btn-primary btn-sm"
                                    href="{{ route('admin.main_trip.edit', ['id' => $trip->id]) }}">
                                    Update trip
                                </a>
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

    <div class="modal fade" id="tripAddModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Trip Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_trip_data') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <select class="form-select mr-4" name="coach_no"
                                onchange="changeValue(), changeTime(), changeStation(), changeCounters()">
                                <option selected>Select coach no</option>

                                @foreach ($sam_trip as $trip)
                                    <option value="{{ $trip->coach_no }}" data-value="{{ $trip->route }}"
                                        data-time="{{ $trip->time }}" data-station="{{ $trip->stations }}"
                                        data-counters="{{ $trip->counters }}">
                                        {{ $trip->coach_no }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="route" id="route" value="" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="time" id="time" value="" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="station" id="station" value="" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <input name="date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>"
                                required />
                        </div>
                        <div class="mb-3">
                            <input name="counters" id="counters" type="text" value="" class="form-control"
                                required />
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto Change Route by Coach No
        function changeValue() {
            var dropdown = document.getElementsByName("coach_no")[0];
            var inputBox = document.getElementById("route");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-value");
        }

        // Auto Change Time by Coach No
        function changeTime() {
            var dropdown = document.getElementsByName("coach_no")[0];
            var inputBox = document.getElementById("time");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-time");
        }
        // Auto Change Station by Coach No
        function changeStation() {
            var dropdown = document.getElementsByName("coach_no")[0];
            var inputBox = document.getElementById("station");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-station");
        }
        // Auto Change Counters by Coach No
        function changeCounters() {
            var dropdown = document.getElementsByName("coach_no")[0];
            var inputBox = document.getElementById("counters");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-counters");
        }
    </script>
@endsection
