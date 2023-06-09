@extends('layouts.body')

@section('main-contant')
    <div class="container text-center">
        <div class="container text-center">
            <div class="row">
                <div class="col text-danger fw-bold"> Coach No: </div>
                <div class="col text-danger fw-bold"> Date: </div>
                <div class="col text-danger fw-bold"> Time: </div>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="row bg-success-subtle p-2">
            <div class="col">
                <div class="form-check form-check-inline">
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="a1"
                                autocomplete="on" {{ $trip_data->A1 == 1 ? 'checked disabled' : '' }}>
                            <label class="btn btn-outline-primary" for="a1">A1</label>

                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="a2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="a2">A2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="a3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="a3">A3</label>

                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="a4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="a4">A4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="b1"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="b1">B1</label>

                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="b2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="b2">B2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="b3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="b3">B3</label>

                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="b4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="b4">B4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="c1"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="c1">C1</label>

                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="c2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="c2">C2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="c3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="c3">C3</label>

                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="c4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="c4">C4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <!-- Seat D1 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="d1"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="d1">D1</label>
                            <!-- Seat D2 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="d2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="d2">D2</label>
                        </div>
                        <div class="col">
                            <!-- Seat D3 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="d3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="d3">D3</label>
                            <!-- Seat D4 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="d4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="d4">D4</label>
                        </div>
                    </div>

                    <!-- Continue with the remaining rows and seats -->
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="e1"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="e1">E1</label>
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="e2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="e2">E2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="e3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="e3">E3</label>
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="e4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="e4">E4</label>
                        </div>
                    </div>

                    <!-- Seat F1 to J4 -->
                    <div class="row seat">
                        <div class="col gap">
                            <!-- Seat F1 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="f1"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="f1">F1</label>
                            <!-- Seat F2 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="f2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="f2">F2</label>
                        </div>
                        <div class="col">
                            <!-- Seat F3 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="f3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="f3">F3</label>
                            <!-- Seat F4 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="f4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="f4">F4</label>
                        </div>
                    </div>

                    <!-- Seat G1 to J4 -->
                    <div class="row seat">
                        <div class="col gap">
                            <!-- Seat G1 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="g1"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="g1">G1</label>
                            <!-- Seat G2 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="g2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="g2">G2</label>
                        </div>
                        <div class="col">
                            <!-- Seat G3 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="g3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="g3">G3</label>
                            <!-- Seat G4 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="g4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="g4">G4</label>
                        </div>
                    </div>

                    <!-- Seat H1 to J4 -->
                    <div class="row seat">
                        <div class="col gap">
                            <!-- Seat H1 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="h1"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="h1">H1</label>
                            <!-- Seat H2 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="h2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="h2">H2</label>
                        </div>
                        <div class="col">
                            <!-- Seat H3 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="h3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="h3">H3</label>
                            <!-- Seat H4 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="h4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="h4">H4</label>
                        </div>
                    </div>

                    <!-- Seat I1 to J4 -->
                    <div class="row seat">
                        <div class="col gap">
                            <!-- Seat I1 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="i1"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="i1">I1</label>
                            <!-- Seat I2 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="i2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="i2">I2</label>
                        </div>
                        <div class="col">
                            <!-- Seat I3 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="i3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="i3">I3</label>
                            <!-- Seat I4 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="i4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="i4">I4</label>
                        </div>
                    </div>

                    <!-- Seat J1 to J4 -->
                    <div class="row seat">
                        <div class="col">
                            <!-- Seat J1 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="j1"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="j1">J1</label>
                            <!-- Seat J2 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="j2"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="j2">J2</label>
                        </div>

                        <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="j5"
                            autocomplete="on">
                        <label class="btn btn-outline-primary" for="j5">J5</label>

                        <div class="col">
                            <!-- Seat J3 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="j3"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="j3">J3</label>
                            <!-- Seat J4 -->
                            <input type="checkbox" onchange="updateSelectedItems()" class="btn-check" id="j4"
                                autocomplete="on">
                            <label class="btn btn-outline-primary" for="j4">J4</label>
                        </div>
                    </div>


                </div>

            </div>
            <div class="col seat">
                <form action="{{ route('sell_ticket') }}" method="post">
                    @csrf
                    <div class="row g-2 seat">
                        <div class="col-md">


                            <select class="form-select" id="station-select" name="station" required>
                                <option value="" selected disabled>Select Station</option>
                                <?php
                                
                                $stations = explode(',', $trip_data->stations);
                                
                                foreach ($stations as $station) {
                                    $station = trim($station);
                                    $parts = explode('-', $station);
                                    $name = trim($parts[0]);
                                    $fare = trim($parts[1]);
                                    echo '<option data-fare="' . $fare . '" value="' . $name . '">' . $name . ' - ' . $fare . '</option>';
                                }
                                ?>
                            </select>

                            <input id="" hidden class="form-control" type="text" name="route"
                                value="{{ $trip_data->route }}" readonly>
                            <input id="" hidden class="form-control" type="text" name="date"
                                value="{{ $trip_data->date }}" readonly>
                            <input id="" hidden class="form-control" type="text" name="time"
                                value="{{ $trip_data->time }}" readonly>
                            <input id="" hidden class="form-control" type="text" name="coach_no"
                                value="{{ $trip_data->coach_no }}" readonly>
                            <input id="" hidden class="form-control" type="text" name="trip_id"
                                value="{{ $trip_data->trip_id }}" readonly>






                            {{-- <input id="fare-input" class="form-control" type="number" name="fare" readonly> --}}

                        </div>
                    </div>
                    <div class="row g-2 p-2 seat">
                        <div id="selected-items"></div>
                        <input id="seat-no-input" class="form-control" type="text" name="seat_no" readonly>
                    </div>
                    <div class="row g-2 p-2 seat">
                        <div class="col-md">
                            <div class="form-floating">
                                <input id="fare-input" class="form-control" type="number" name="fare" readonly>
                                <label for="fare-input">Seat Fare</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input id="num-seat-input" class="form-control" type="number" name="num_seat" readonly>
                                <label for="mobile">Total Seat</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input id="discount-fare" class="form-control" type="number" value=""
                                    name="discount_fare" onkeyup="updateNumSeats(this.value)" maxlength="3">
                                <label for="mobile">Discount Per Seat</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 p-2 seat">
                        <div class="col-md">
                            <select class="form-select" id="gender" name="gender" required>
                                <option selected disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input id="total-fare" class="form-control" type="number" name="total_fare" readonly>
                                <label for="mobile">Total Fare</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 p-2 seat">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="mobile" name="mobile"
                                    placeholder="01751944774" maxlength="11" autocomplete="cc-number" required
                                    onkeyup="getName(this.value)">
                                <label for="mobile">Mobile Number</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="MR. X" value="MR. " maxlength="20" required>
                                <label for="name">Name</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="Book">
                </form>
            </div>
        </div>
    </div>


    <script>
        // function to update the selected items in the "selected-items" div
        function updateSelectedItems() {
            // get all the checkboxes with class "btn-check" that are checked
            var selectedCheckboxes = document.querySelectorAll('.btn-check:checked');
            // get the "selected-items" div
            var selectedItemsDiv = document.getElementById('selected-items');
            // get the seat-no input
            var seatNoInput = document.getElementById('seat-no-input');
            // remove all child elements from the "selected-items" div
            selectedItemsDiv.innerHTML = '';
            // iterate over the selected checkboxes
            for (var i = 0; i < selectedCheckboxes.length; i++) {
                // skip over disabled checkboxes
                if (selectedCheckboxes[i].disabled) {
                    continue;
                }
                // create a span element for each selected checkbox
                var selectedCheckboxSpan = document.createElement('span');
                selectedCheckboxSpan.className = 'badge bg-primary me-2';
                selectedCheckboxSpan.innerHTML = selectedCheckboxes[i].nextElementSibling.innerHTML;
                // add the span element to the "selected-items" div
                selectedItemsDiv.appendChild(selectedCheckboxSpan);
            }
            // set the value of the seat-no input to the selected items
            seatNoInput.value = selectedItemsDiv.innerText;
        }


        // listen for changes in the state of any checkbox with class "btn-check"
        // document.querySelectorAll('.btn-check').forEach(function(checkbox) {
        //     checkbox.addEventListener('change', function() {
        //         updateSelectedItems();
        //     });
        // });


        // JS For Find Name by Mobile Number
        function getName(mobile) {
            // Send an AJAX request to the server
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Update the name input field with the retrieved name
                    document.getElementById("name").value = this.responseText;
                }
            };
            xhttp.open("GET", "get_name.php?mobile=" + mobile, true);
            xhttp.send();
        }

        function discounFare(fare) {

            // get all checkboxes with class "btn-check"
            var checkboxes = document.querySelectorAll('.btn-check:not(:disabled)');
            var numChecked = 0;
            // loop through checkboxes to count number of checked checkboxes
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    numChecked++;
                }
            }
            // set num seats input value
            var numSeatInput = document.getElementById("num-seat-input");
            numSeatInput.value = numChecked;

            var fareInput = document.getElementById("fare-input").value;

            var discountInput = document.getElementById("discount-fare").value;

            var totalFare = numChecked * (fareInput - fare);

            var totalFareInput = document.getElementById("total-fare");
            totalFareInput.value = totalFare;

        }
    </script>

    <!-- JS For Automatic Fare by Station -->
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // add event listener to station select element
            var stationSelect = document.getElementById("station-select");
            stationSelect.addEventListener("change", function() {
                // get selected option
                var selectedOption = this.options[this.selectedIndex];
                // get fare value from selected option
                var fareValue = selectedOption.getAttribute("data-fare");
                // set fare input value to fare value
                var fareInput = document.getElementById("fare-input");
                fareInput.value = fareValue;
            });
        });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // add event listener to station select element
            var stationSelect = document.getElementById("station-select");
            var fareInput = document.getElementById("fare-input");

            stationSelect.addEventListener("change", function() {
                // get selected option
                var selectedOption = this.options[this.selectedIndex];
                // get fare value from selected option
                var fareValue = selectedOption.getAttribute("data-fare");
                // set fare input value to fare value
                fareInput.value = fareValue;
                // console.log(fareValue);
            });
        });
    </script>



    <!-- JS For Selected Seat Number -->
    <script>
        function updateNumSeats() {
            // get all checkboxes with class "btn-check"
            var checkboxes = document.querySelectorAll('.btn-check:not(:disabled)');
            var numChecked = 0;
            // loop through checkboxes to count number of checked checkboxes
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    numChecked++;
                }
            }
            // set num seats input value
            var numSeatInput = document.getElementById("num-seat-input");
            numSeatInput.value = numChecked;

            var fareInput = document.getElementById("fare-input").value;

            var discountInput = document.getElementById("discount-fare").value;

            var totalFare = numChecked * (fareInput - discountInput);

            var totalFareInput = document.getElementById("total-fare");
            totalFareInput.value = totalFare;


        }

        // add event listeners to checkboxes
        var checkboxes = document.querySelectorAll('.btn-check:not(:disabled)');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener('change', updateNumSeats);
        }
    </script>
@endsection
