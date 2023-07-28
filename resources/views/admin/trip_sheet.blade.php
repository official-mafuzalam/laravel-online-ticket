@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-danger" style="width: 100%;">
            <div class="d-flex justify-content-between text-white px-3 py-2">
                <p class="font-weight-bold" style="font-size: 20px;">Friends Travels Ltd</p>
                <p class="font-weight-bold" style="font-size: 20px;"></p>
                <div>
                    <p class="font-weight-bold" style="font-size: 14px;">
                        {{session('user.coun_add', 'default')}}
                    </p>
                    <p class="font-weight-bold" style="font-size: 14px; margin-top: 5px;">
                        <?php echo date('Y-m-d H:i:s'); ?>
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex border justify-content-between text-black px-3">
                <div>
                    <p>Trip ID:
                        <span class="fw-bold">
                            {{ $trip_details->first()->trip_id }}
                        </span>
                    </p>
                    <p>Route:
                        <span class="fw-bold">
                            {{ $trip_details->first()->main_route }}
                        </span>
                    </p>
                    <p>Date:
                        <span class="fw-bold">
                            {{ $trip_details->first()->date }}
                        </span>
                    </p>
                </div>
                <div>
                    <p>Supervisor:
                        <span class="fw-bold">MR. X
                        </span>
                    </p>
                    <p>Driver:
                        <span class="fw-bold">Mr. Y
                        </span>
                    </p>
                    <p>Reg.No:
                        <span class="fw-bold">

                        </span>
                    </p>
                </div>
                <div>
                    <p>Coach: <span class="fw-bold">
                        {{ $trip_details->first()->coach_no }}
                        </span>
                    </p>
                    <p>Challan Serial: <span class="fw-bold">

                        </span></p>
                    <p>Bus Type: <span class="fw-bold">NON_AC</span></p>
                </div>
            </div>

            <br>
            <table id="table" class="table table-striped-columns border text-center">
                <thead>
                    <tr>
                        <th scope="col">Seat</th>
                        <th scope="col">Counter</th>
                        <th scope="col">PNR</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Station</th>
                        <th scope="col">Fare</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Fare</th>
                    </tr>
                </thead>
                <tbody id="my-table-body">

                    @foreach ($sellTicketHisData as $seat => $collection)
                        @foreach ($collection as $ticket)
                            <tr>
                                <td>{{ $ticket->seat }}</td>
                                <td>{{ $ticket->seller_counter }}</td>
                                <td>{{ $ticket->ticket_id }}</td>
                                <td>{{ $ticket->name }}</td>
                                <td>{{ $ticket->mobile }}</td>
                                <td>{{ $ticket->gender }}</td>
                                <td>{{ $ticket->station }}</td>
                                <td>{{ $ticket->fare }}</td>
                                <td>{{ $ticket->discount }}</td>
                                <td>{{ $ticket->discount_fare_per_seat }}</td>
                                <!-- Add other columns you want to display -->
                            </tr>
                        @endforeach
                    @endforeach

                </tbody>

            </table>
            <br>
            <div class="d-flex border justify-content-between text-black px-3">
                <div>
                    <p>Total Sold Seat:
                        <span id="sold-seat" class="fw-bold"></span>
                    </p>
                </div>
                <div>
                    <p>Total Sell Amount:
                        <span id="value" class="fw-bold"></span>
                    </p>
                </div>
            </div>


            <br><br><br><br>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Counter Master)</p>
                    </div>
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Guide)</p>
                    </div>
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Checker 1)</p>
                    </div>
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Checker 2)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-danger">
            <div class="d-flex justify-content-between align-items-center text-white px-3">
                <a href="https://friendsit.xyz/" class="font-weight-bold text-white text-decoration-none" target="_blank">
                    www.friendsit.xyz
                </a>
            </div>
        </div>
    </div>


    <script>
        // Total Sold Seat Value
        var table = document.getElementById("table"),
            sumVal = 0;

        for (var i = 1; i < table.rows.length; i++) {
            sumVal = sumVal + parseInt(table.rows[i].cells[9].innerHTML);
        }
        document.getElementById("value").innerText = sumVal + ' TK';

        // Total Sold Seat Count

        const tableBody = document.getElementById('my-table-body');
        const rowCount = tableBody.rows.length;
        document.getElementById("sold-seat").innerText = rowCount;
    </script>

    {{-- <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Trip ID</th>
                <th>Name</th>
                <!-- Add other column headers you want to display -->
            </tr>
        </thead>
        <tbody>
            @foreach ($sellTicketHisData as $seat => $collection)
                @foreach ($collection as $ticket)
                    <tr>
                        <td>{{ $ticket->coach_no }}</td>
                        <td>{{ $ticket->trip_id }}</td>
                        <td>{{ $ticket->name }}</td>
                        <!-- Add other columns you want to display -->
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table> --}}
@endsection
