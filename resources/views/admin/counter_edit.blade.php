@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Update counter details</h3>
        <form action="{{ route('admin.counter.update', ['id' => $counter->id]) }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="coun_id" class="col-sm-2 col-form-label">Coun. ID</label>
                <div class="col-sm-10">
                    <input name="counter_id" type="number" class="form-control" id="coun_id" placeholder="ex: 101"
                        value="{{ $counter->counter_id }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Coun. Name</label>
                <div class="col-sm-10">
                    <input name="coun_name" type="text" class="form-control" id="name" placeholder="ex: Gabtoli"
                    value="{{ $counter->coun_name }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="coun_add" class="col-sm-2 col-form-label">Coun. Address</label>
                <div class="col-sm-10">
                    <input name="coun_add" type="text" class="form-control" id="coun_add"
                        placeholder="ex: Gabtoli Terminal" value="{{ $counter->coun_add }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="time_deff" class="col-sm-2 col-form-label">Time Deff (min)</label>
                <div class="col-sm-10">
                    <input name="time_deff" type="number" class="form-control" id="time_deff" placeholder="ex: 15"
                    value="{{ $counter->time_deff }}" required>
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
