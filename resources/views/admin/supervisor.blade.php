@extends('layouts.app')

@section('content')

    <div class="container pb-2 d-grid d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            New Supervisor
        </button>
    </div>

    <div class="container">
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">S/L</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($sup_details->isEmpty())
                    <tr>
                        <td class="text-center">No trip found.</td>
                    </tr>
                @else
                    @foreach ($sup_details as $sup)
                        <tr>
                            <td>{{ $sup->id }}</td>
                            <td>{{ $sup->user_id }}</td>
                            <td>{{ $sup->user_name }}</td>
                            <td>{{ $sup->mobile }}</td>
                            <td>
                                <a class="text-decoration-none"
                                    href="{{ route('admin.supervisor.edit', ['id' => $sup->id]) }}">
                                    Edit
                                </a>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Supervisor Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.supervisor.add') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3 row">
                            <label for="user_id" class="col-sm-2 col-form-label">User Id</label>
                            <div class="col-sm-10">
                                <input name="user_id" type="number" class="form-control" id="user_id"
                                    placeholder="ex: 5000" value="{{$newUserId}}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="user_name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="user_name" type="text" class="form-control" id="user_name"
                                    placeholder="ex: Mr. Super..." required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input name="mobile" type="text" class="form-control" id="mobile"
                                    placeholder="ex: 017xxxxxx" required>
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
