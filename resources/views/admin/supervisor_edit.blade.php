@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Update supervisor details</h3>
        <form action="{{ route('admin.supervisor.update', ['id' => $super->id]) }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="user_id" class="col-sm-2 col-form-label">Serial no</label>
                <div class="col-sm-10">
                    <input name="user_id" type="number" class="form-control" id="user_id" placeholder="ex: 110"
                        value="{{ $super->id }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="user_name" class="col-sm-2 col-form-label">Guide name</label>
                <div class="col-sm-10">
                    <input name="user_name" type="text" class="form-control" id="user_name" placeholder="ex: 110"
                        value="{{ $super->user_name }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="mobile" class="col-sm-2 col-form-label">Mobile no</label>
                <div class="col-sm-10">
                    <input name="mobile" type="text" class="form-control" id="mobile"
                        placeholder="ex: 017xxxxxxx" maxlength="11" value="{{ $super->mobile }}" required>
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
