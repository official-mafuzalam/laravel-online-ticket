@extends('layouts.app')

@section('content')
    <div class="container">
        <form role="search" action="{{ route('admin.sells_report') }}">
            <div class="container pb-2 d-grid d-md-flex justify-content-md-center">
                <div class="col-md-2 p-2 col-sm-6">
                    <input class="form-control form-control-sm" type="date" name="date1" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-2 p-2 col-sm-6">
                    <input class="form-control form-control-sm" type="date" name="date2" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-2 p-2 col-sm-6">
                    <button class="btn btn-info btn-sm" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Coach</th>
                    <th scope="col">Route</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Name</th>
                    <th scope="col">To</th>
                    <th scope="col">Fare</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($sells->isEmpty())
                    <tr>
                        <td class="text-center">No data found.</td>
                    </tr>
                @else
                    @foreach ($sells as $coun)
                        <tr>
                            <th>{{ $coun->coach_no }}</th>
                            <td>{{ $coun->route }}</td>
                            <td>{{ $coun->date }}</td>
                            <td>{{ $coun->time }}</td>
                            <td>{{ $coun->mobile }}</td>
                            <td>{{ $coun->name }}</td>
                            <td>{{ $coun->seat }}</td>
                            <td>{{ $coun->fare }}</td>
                            <td>{{ $coun->discount }}</td>
                            <td>{{ $coun->total_fare }}</td>
                            <td>
                                <a class="text-decoration-none" target="_blank"
                                    href="{{ route('admin.ticket_print', ['id' => $coun->ticket_id]) }}">Print</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection
