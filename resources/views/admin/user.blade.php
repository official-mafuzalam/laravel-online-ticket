@extends('layouts.app')

@section('content')
    <div class="container pb-2 d-grid d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add New Counter
        </button>
    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">S/L</th>
                    <th scope="col">Counter</th>
                    <th scope="col">Main R.</th>
                    <th scope="col">User Type</th>
                    <th scope="col">User</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
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
                            <td>{{ $counterMaster->coun_id }} <br>{{ $counterMaster->coun_name }} </td>
                            <td>{{ $counterMaster->main_route }}</td>
                            <td>{{ $counterMaster->user_type }}</td>
                            <td>{{ $counterMaster->user_id }} <br> {{ $counterMaster->user_name }} </td>
                            <td>{{ $counterMaster->user_mobile }}</td>
                            <td>{{ $counterMaster->email }}</td>
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
                            <label for="coun_name" class="col-sm-2 col-form-label">Counter</label>
                            <div class="col-sm-10">
                                <select name="coun_name" id="coun_name" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" required onchange="changeValue()">

                                    <option selected>Select counter</option>
                                    @foreach ($counter as $coun)
                                        <option data-value="{{ $coun->counter_id }}" value="{{ $coun->coun_name }}">
                                            {{ $coun->coun_name }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="coun_id" class="col-sm-2 col-form-label">Counter ID</label>
                            <div class="col-sm-10">
                                <input name="coun_id" type="number" class="form-control" id="coun_id"
                                    placeholder="ex: 105" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="type" class="col-sm-2 col-form-label">Account Type</label>
                            <div class="col-sm-10">
                                <select name="type" id="type" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" required>

                                    <option selected>Select account type</option>
                                    <option value="0">Agents</option>
                                    <option value="2">Manager</option>
                                    <option value="1">Admin</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="main_route" class="col-sm-2 col-form-label">Main Route</label>
                            <div class="col-sm-10">
                                <select name="main_route" id="main_route" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" required>

                                    <option selected>Select user main route</option>
                                    <option value="1">All Route</option>
                                    <option value="5">Gabtoli - All</option>
                                    <option value="10">Khulna - All</option>
                                    <option value="15">Pirojpur - All</option>

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
                            <label for="user_email" class="col-sm-2 col-form-label">User Email</label>
                            <div class="col-sm-10">
                                <input name="user_email" type="email" class="form-control" id="user_email"
                                    placeholder="ex: user@company.com" required>
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


    <script>
        // Auto Change Route by Coach No
        function changeValue() {
            var dropdown = document.getElementsByName("coun_name")[0];
            var inputBox = document.getElementById("coun_id");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-value");
        }
    </script>
@endsection
