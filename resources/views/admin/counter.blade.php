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
                    <th scope="col">Counter ID</th>
                    <th scope="col">Main R.</th>
                    <th scope="col">Counter Name</th>
                    <th scope="col">Counter Address</th>
                    <th scope="col">Time Deff</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($counter->isEmpty())
                    <tr>
                        <td class="text-center">No counter found.</td>
                    </tr>
                @else
                    @foreach ($counter as $coun)
                        <tr>
                            <th>{{ $coun->id }}</th>
                            <td>{{ $coun->counter_id }}</td>
                            <td>{{ $coun->main_route }}</td>
                            <td>{{ $coun->coun_name }}</td>
                            <td>{{ $coun->coun_add }}</td>
                            <td>{{ $coun->time_deff }}</td>
                            <td>
                                <a class="text-decoration-none" href="{{ route('admin.counter.edit', ['id'=>$coun->id]) }}">Edit</a>
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
                <form action="{{ route('admin.counter.add') }}" method="post">
                    @csrf
                    <div class="modal-body">


                        <div class="mb-3 row">
                            <label for="coun_id" class="col-sm-2 col-form-label">Coun. ID</label>
                            <div class="col-sm-10">
                                <input name="counter_id" type="number" class="form-control" id="coun_id"
                                    placeholder="ex: 101" required>
                            </div>
                        </div>

                        {{-- <div class="mb-3 row">
                            <label for="main_route" class="col-sm-2 col-form-label">Main Route</label>
                            <div class="col-sm-10">
                                <select name="main_route" id="main_route" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" required>
                                    <option selected>Select counter main route</option>

                                    @foreach ($main_route as $route)
                                        <option value="{{ $route->route_no }}">
                                            {{ $route->route_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div> --}}
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Coun. Name</label>
                            <div class="col-sm-10">
                                <input name="coun_name" type="text" class="form-control" id="name"
                                    placeholder="ex: Gabtoli" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="coun_add" class="col-sm-2 col-form-label">Coun. Address</label>
                            <div class="col-sm-10">
                                <input name="coun_add" type="text" class="form-control" id="coun_add"
                                    placeholder="ex: Gabtoli Terminal" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="time_deff" class="col-sm-2 col-form-label">Time Deff (min)</label>
                            <div class="col-sm-10">
                                <input name="time_deff" type="number" class="form-control" id="time_deff"
                                    placeholder="ex: 15" required>
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
