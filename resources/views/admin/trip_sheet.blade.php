@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('user.type', 'default') == 'admin')
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-id="{{ $trip_details->first()->trip_id }}">
                Book
            </button>
        @endif

        <div class="bg-danger" style="width: 100%;">
            <div class="d-flex justify-content-between text-white px-3 py-2">
                <p class="font-weight-bold" style="font-size: 20px;">Friends Travels Ltd</p>
                <p class="font-weight-bold" style="font-size: 20px;"></p>
                <div>
                    <p class="font-weight-bold" style="font-size: 14px;">
                        {{ session('user.coun_add', 'default') }}
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



    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trip Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.counter.add') }}" method="post">
                    @csrf
                    <div class="modal-body">


                        <div class="mb-3 row">
                            <label for="trip_id_input" class="col-sm-2 col-form-label">Trip ID</label>
                            <div class="col-sm-10">
                                <input name="trip_id" type="number" class="form-control" id="trip_id_input"
                                    placeholder="ex: 101" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="main_route" class="col-sm-2 col-form-label">Main Route</label>
                            <div class="col-sm-10">
                                <select name="main_route" id="main_route" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" required>
                                    <option selected>Select counter main route</option>

                                </select>
                            </div>
                        </div>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Wait for the document to be ready
        $(document).ready(function() {
            // When the modal is shown, extract and display the data-id value in the input field
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var tripId = button.data('id'); // Extract trip_id from data-id attribute

                // Update the input field value with the data-id value
                $('#trip_id_input').val(tripId);
            });
        });
    </script>




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
