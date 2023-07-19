@extends('layouts.app')

@section('content')
    <div class="container pb-2 d-grid d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            New Sample Trip
        </button>
    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">S/L</th>
                    <th scope="col">Coach No</th>
                    <th scope="col">Route</th>
                    <th scope="col">Station</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @if ($sam_trip->isEmpty())
                    <tr>
                        <td class="text-center">No trip found.</td>
                    </tr>
                @else
                    @foreach ($sam_trip as $trip)
                        <tr>
                            <th>{{ $trip->id }}</th>
                            <td>{{ $trip->coach_no }}</td>
                            <td>{{ $trip->route }}</td>
                            <td>{{ $trip->stations }}</td>
                            <td>{{ $trip->time }}</td>
                            <td>
                                <a class="text-decoration-none" href="">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.sample_trip.add') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3 row">
                            <label for="coach_no" class="col-sm-2 col-form-label">Coach No</label>
                            <div class="col-sm-10">
                                <input name="coach_no" type="number" class="form-control" id="coach_no"
                                    placeholder="ex: 110" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="route" class="col-sm-2 col-form-label">Route Name</label>
                            <div class="col-sm-10">
                                <input name="route" type="text" class="form-control" id="route"
                                    placeholder="ex: Gabtoli - Gopalgonj - Khulna" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="time" class="col-sm-2 col-form-label">Starting Time</label>
                            <div class="col-sm-10">
                                <input name="time" type="text" class="form-control" id="time"
                                    placeholder="ex: 07:00 AM" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="stations" class="col-sm-2 col-form-label">Stations</label>
                            <div class="col-sm-10">
                                <input name="stations" type="text" class="form-control" id="stations"
                                    placeholder="ex: Muksudpur - 450, Gopalgonj - 500" required>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value="Save">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
