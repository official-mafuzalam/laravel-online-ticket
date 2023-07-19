@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#tripAddModal">
            New Trip Add
        </button>

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
                                    onchange="changeValue(), changeTime(), changeStation()">
                                    <option selected>Select coach no</option>

                                    @foreach ($sam_trip as $trip)
                                        <option value="{{ $trip->coach_no }}" data-value="{{ $trip->route }}"
                                            data-time="{{ $trip->time }}" data-station="{{ $trip->stations }}">
                                            {{ $trip->coach_no }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <input type="text" name="route" id="route" value="" class="form-control"
                                    readonly>
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
                                <select name="main_route" id="main_route" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" required>

                                    <option selected>Select user main route</option>
                                    @foreach ($main_route as $route)
                                        <option value="{{ $route->route_no }}">
                                            {{ $route->route_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="SAVE">
                            </div>




                        </form>
                    </div>
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
    </script>
@endsection
