@extends('layouts.body')

@section('main-contant')
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th scope="col">Coach</th>
                <th scope="col">Time</th>
                <th scope="col">Route</th>
                <th scope="col">Available</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trips as $trip)
                <tr>
                    <td class="text-success fw-bold">{{ $trip->coach_no }}</td>
                    <td class="text-success fw-bold">{{ $trip->time }} <br> {{ $trip->date }}</td>
                    <td class="text-success fw-bold">{{ $trip->route }}</td>
                    <td class="text-success fw-bold">36</td>
                    <td class="text-success fw-bold">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-id="{{ $trip->trip_id }}">
                            Book
                        </button>
                    </td>

                    <td class="text-success fw-bold">
                        <a class="text-decoration-none btn btn-success btn-sm" target="_blank" href="{{ route('seat_plan', ['trip_id'=>$trip->trip_id]) }}">Book</a>
                        {{-- <button type="button" class="btn btn-success btn-sm">Active</button> --}}
                    </td>
                    <td class="text-success fw-bold">
                        <button type="button" class="btn btn-warning btn-sm">Omit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal For Seat Plane -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" id="modal-content">



            </div>
        </div>
    </div> --}}


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trip Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalContent">
                        <!-- The fetched data will be inserted here -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>





        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#exampleModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var tripId = button.data('id');

                    // Make an AJAX request to fetch data based on tripId
                    $.ajax({
                        url: '/getTripData', // Replace with your server route to fetch trip data
                        method: 'GET',
                        data: {
                            tripId: tripId
                        },
                        success: function(response) {
                            $('#modalContent').html(response.html);
                        },

                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });
            });
        </script>

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
                    console.log = fareValue;
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
