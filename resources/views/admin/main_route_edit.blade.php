@extends('layouts.app')

@section('content')
        <div class="container">
        <h3 class="text-center">Update main route details</h3>
        <form action="{{ route('admin.main_route.update', ['id' => $main_route->id]) }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="route_no" class="col-sm-2 col-form-label">Route No</label>
                <div class="col-sm-10">
                    <input name="route_no" type="number" class="form-control" id="route_no" placeholder="ex: 5"
                        value="{{ $main_route->route_no }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="route_name" class="col-sm-2 col-form-label">Route Name</label>
                <div class="col-sm-10">
                    <input name="route_name" type="text" class="form-control" id="route_name"
                        placeholder="ex: Gabtoli - Khulna" value="{{ $main_route->route_name }}" required>
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
