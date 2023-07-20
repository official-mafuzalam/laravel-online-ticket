@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Update main route details</h3>
        <form action="{{ route('admin.sample_trip.update', ['id' => $sample_trip->id]) }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="coach_no" class="col-sm-2 col-form-label">Coach No</label>
                <div class="col-sm-10">
                    <input name="coach_no" type="number" class="form-control" id="coach_no" placeholder="ex: 110"
                        value="{{ $sample_trip->coach_no }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="route" class="col-sm-2 col-form-label">Route Name</label>
                <div class="col-sm-10">
                    <input name="route" type="text" class="form-control" id="route"
                        placeholder="ex: Gabtoli - Gopalgonj - Khulna" value="{{ $sample_trip->route }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="time" class="col-sm-2 col-form-label">Starting Time</label>
                <div class="col-sm-10">
                    <input name="time" type="text" class="form-control" id="time" placeholder="ex: 07:00 AM"
                    value="{{$sample_trip->time}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stations" class="col-sm-2 col-form-label">Stations</label>
                <div class="col-sm-10">
                    <input name="stations" type="text" class="form-control" id="stations"
                        placeholder="ex: Muksudpur - 450, Gopalgonj - 500" value="{{$sample_trip->stations}}" required>
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
