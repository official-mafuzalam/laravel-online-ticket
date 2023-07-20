@extends('layouts.app')

@section('content')
    <div class="container pb-2 d-grid d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            New Main Route
        </button>
    </div>

    <div class="container">
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">S/L</th>
                    <th scope="col">Route No</th>
                    <th scope="col">Route Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($route->isEmpty())
                    <tr>
                        <td class="text-center">No trip found.</td>
                    </tr>
                @else
                    @foreach ($route as $route)
                        <tr>
                            <td>{{ $route->id }}</td>
                            <td>{{ $route->route_no }}</td>
                            <td>{{ $route->route_name }}</td>
                            <td>
                                <a class="text-decoration-none"
                                    href="{{ route('admin.main_route.edit', ['id' => $route->id]) }}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-danger"
                                    href="{{ route('admin.main_route.delete', ['id' => $route->id]) }}">
                                    Delete
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.main_route.add') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3 row">
                            <label for="route_no" class="col-sm-2 col-form-label">Route No</label>
                            <div class="col-sm-10">
                                <input name="route_no" type="number" class="form-control" id="route_no"
                                    placeholder="ex: 5" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="route_name" class="col-sm-2 col-form-label">Route Name</label>
                            <div class="col-sm-10">
                                <input name="route_name" type="text" class="form-control" id="route_name"
                                    placeholder="ex: Gabtoli - Khulna" required>
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
