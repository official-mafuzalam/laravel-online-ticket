@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Update trip details</h3>
        <form action="{{ route('admin.main_trip.update', ['id' => $trip_data->id]) }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="coach" class="col-sm-2 col-form-label">Coach No</label>
                <div class="col-sm-10">
                    <input name="counter_id" type="number" class="form-control" id="coach" placeholder="ex: 101"
                        value="{{ $trip_data->coach_no }}" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="time" class="col-sm-2 col-form-label">Time</label>
                <div class="col-sm-10">
                    <input name="time" type="text" class="form-control" id="time" placeholder="ex: Gabtoli"
                        value="{{ $trip_data->time }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="route" class="col-sm-2 col-form-label">Route</label>
                <div class="col-sm-10">
                    <input name="route" type="text" class="form-control" id="route" placeholder="ex: 15"
                        value="{{ $trip_data->route }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stations" class="col-sm-2 col-form-label">Stations</label>
                <div class="col-sm-10">
                    <input name="stations" type="text" class="form-control" id="stations"
                        placeholder="ex: Gabtoli Terminal" value="{{ $trip_data->stations }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="route" class="col-sm-2 col-form-label">Counters</label>
                <div class="col-sm-10">
                    @foreach ($counters as $counter)
                        <div class="form-check form-check-inline">
                            <input name="counters[]" class="form-check-input" type="checkbox"
                                id="inlineCheckbox{{ $counter->id }}" value="{{ $counter->counter_id }}"
                                @if (in_array($counter->counter_id, explode(',', $trip_data->counters))) checked @endif>
                            <label class="form-check-label"
                                for="inlineCheckbox{{ $counter->id }}">{{ $counter->coun_name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
