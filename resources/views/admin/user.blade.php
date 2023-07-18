@extends('layouts.app')

@section('content')
    <div class="container pb-2 d-grid d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add New Counter
        </button>
    </div>

    <div class="container">
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">S/L</th>
                    <th scope="col">Counter</th>
                    <th scope="col">User ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($master->isEmpty())
                    <tr>
                        <td class="text-center">No Counter Master found.</td>
                    </tr>
                @else
                    @foreach ($master as $counterMaster)
                        <tr>
                            <th>{{ $counterMaster->id }}</th>
                            <td>{{ $counterMaster->coun_name }}</td>
                            <td>{{ $counterMaster->user_id }}</td>
                            <td>{{ $counterMaster->user_name }}</td>
                            <td>{{ $counterMaster->user_mobile }}</td>
                            <td>{{ $counterMaster->password }}</td>
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
                <form action="{{ route('admin.user.add') }}" method="post">
                    @csrf
                    <div class="modal-body">


                        <div class="mb-3 row">
                            <label for="user_id" class="col-sm-2 col-form-label">User ID</label>
                            <div class="col-sm-10">
                                <input name="user_id" type="number" class="form-control" id="user_id"
                                    placeholder="ex: 1001" readonly value="{{ $newUserId }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="main_route" class="col-sm-2 col-form-label">Counter</label>
                            <div class="col-sm-10">
                                <select name="coun_name" id="main_route" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" required>

                                    <option selected>Select counter main route</option>
                                    @foreach ($counter as $coun)
                                        <option value="{{ $coun->coun_name }}">
                                            {{ $coun->coun_name }}
                                        </option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10">
                                <input name="user_name" type="text" class="form-control" id="user_name"
                                    placeholder="ex: Gabtoli" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="user_mobile" class="col-sm-2 col-form-label">User Mobile</label>
                            <div class="col-sm-10">
                                <input name="user_mobile" type="text" class="form-control" id="user_mobile"
                                    placeholder="ex: 01744445552" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input name="password" type="text" class="form-control" id="password"
                                    placeholder="ex: xxxxx" required>
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
