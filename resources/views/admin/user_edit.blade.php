@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Update main route details</h3>
        <form action="{{ route('admin.user.update', ['id' => $coun_master->id]) }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="user_id" class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                    <input name="user_id" type="number" class="form-control" id="user_id" placeholder="ex: 1001" readonly
                        value="{{ $coun_master->user_id }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="coun_name" class="col-sm-2 col-form-label">Counter</label>
                <div class="col-sm-10">

                    <input name="coun_name" type="text" class="form-control" id="coun_name" placeholder="ex: 1001"
                        readonly value="{{ $coun_master->coun_name }}">

                </div>
            </div>
            <div class="mb-3 row">
                <label for="coun_id" class="col-sm-2 col-form-label">Counter ID</label>
                <div class="col-sm-10">
                    <input name="coun_id" type="number" class="form-control" id="coun_id" placeholder="ex: 105"
                        value="{{ $coun_master->coun_id }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">Account Type</label>
                <div class="col-sm-10">
                    <select name="type" id="type" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" required>

                        <option value="0" {{ $coun_master->user_type == 0 ? 'selected' : '' }}>Agents</option>
                        <option value="2" {{ $coun_master->user_type == 2 ? 'selected' : '' }}>Manager</option>
                        <option value="1" {{ $coun_master->user_type == 1 ? 'selected' : '' }}>Admin</option>

                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="main_route" class="col-sm-2 col-form-label">Main Route</label>
                <div class="col-sm-10">
                    <input name="main_route" type="number" class="form-control" id="main_route" placeholder="ex: 105"
                        value="{{ $coun_master->main_route }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input name="user_name" type="text" class="form-control" id="user_name" placeholder="ex: Gabtoli"
                    value="{{ $coun_master->user_name }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="user_mobile" class="col-sm-2 col-form-label">User Mobile</label>
                <div class="col-sm-10">
                    <input name="user_mobile" type="text" class="form-control" id="user_mobile"
                        placeholder="ex: 01744445552" value="{{ $coun_master->user_mobile }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="user_email" class="col-sm-2 col-form-label">User Email</label>
                <div class="col-sm-10">
                    <input name="user_email" type="email" class="form-control" id="user_email"
                        placeholder="ex: user@company.com" value="{{ $coun_master->email }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input name="password" type="text" class="form-control" id="password" placeholder="ex: xxxxx"
                    value="{{ $coun_master->password }}"  readonly>
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
