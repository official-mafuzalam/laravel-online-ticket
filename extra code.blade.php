<button type="button" class="btn 
                                <?php
                                $numericValue = (int) explode(',', $trip_data->A1)[0]; // Extract the first part before the comma
                                $mobileValue = explode(',', $trip_data->A1)[2]; // Extract the second part after the comma
                                
                                if ($numericValue == 1) {
                                    echo 'btn-warning';
                                } elseif ($numericValue == 2) {
                                    echo 'btn-danger';
                                } else {
                                    echo 'btn-outline-primary'; // Default class if none of the conditions match.
                                }
                                ?>"
    onclick="<?php if ($numericValue == 1 || $numericValue == 2) {
        echo 'openModal(\'' . $mobileValue . '\')'; // Wrap mobileValue in single quotes for JavaScript
    } else {
        echo 'buttonClicked(this)';
    } ?>">A1</button>



<div class="modal fade" id="myModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Trip Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="trip_id_input" class="col-sm-2 col-form-label">Trip ID</label>
                    <div class="col-sm-10">
                        <input name="trip_id" type="text" class="form-control" id="trip_id_input"
                            placeholder="ex: 101" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" value="Save">
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    function openModal(a1Value) {
        $('#myModal').modal('show'); // Use Bootstrap modal method to show the modal
        $('#trip_id_input').val(a1Value);
    }

    function closeModal() {
        $('#myModal').modal('hide'); // Use Bootstrap modal method to hide the modal
    }
</script>
