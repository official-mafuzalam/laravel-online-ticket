<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .btn-outline-primary {
            width: 50px;
        }

        .seat {
            margin-bottom: 10px;
            padding-right: 10px;
        }

        .gap {
            margin-right: 50px;
        }

        input[type=checkbox]:checked:not([disabled])+label {
            background-color: red;
        }
    </style>
</head>

<body>


    <div class="container bg-success-subtle text-center">
        <div class="container text-center">
            <div class="row">
                <div class="col text-danger fs-5 fw-bold"> Coach No: {{ $trip_data->coach_no }}</div>
                <div class="col text-danger fs-5 fw-bold"> {{ $trip_data->route }}</div>
                <div class="col text-danger fs-5 fw-bold">
                    <?php
                    // Convert the trip time to a DateTime object for easier manipulation
                    $tripTime = new DateTime($trip_data->time);
                    
                    // Get the time difference from the session (assuming it's given in minutes)
                    $timeDifferenceInMinutes = session('user.time_deff');
                    
                    // Add the time difference to the trip time
                    $adjustedTime = $tripTime->modify('+' . $timeDifferenceInMinutes . ' minutes')->format('h:i A');
                    ?>
                    Time: {{ $adjustedTime }}
                    <br>
                    Date: {{ $trip_data->date }}
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="row bg-success-subtle p-2">
            <div class="col">
                <div class="form-check form-check-inline">
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->A1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->A1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->A1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">A1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->A2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->A2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->A2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">A2</button>

                        </div>
                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->A3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->A3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->A3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">A3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->A4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->A4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->A4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">A4</button>

                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->B1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->B1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->B1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">B1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->B2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->B2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->B2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">B2</button>

                        </div>
                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->B3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->B3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->B3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">B3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->B4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->B4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->B4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">B4</button>

                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->C1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->C1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->C1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">C1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->C2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->C2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->C2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">C2</button>

                        </div>
                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->C3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->C3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->C3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">C3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->C4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->C4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->C4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">C4</button>

                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->D1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->D1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->D1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">D1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->D2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->D2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->D2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">D2</button>

                        </div>
                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->D3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->D3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->D3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">D3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->D4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->D4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->D4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">D4</button>

                        </div>
                    </div>

                    <!-- Continue with the remaining rows and seats -->
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->E1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->E1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->E1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">E1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->E2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->E2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->E2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">E2</button>

                        </div>
                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->E3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->E3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->E3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">E3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->E4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->E4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->E4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">E4</button>

                        </div>
                    </div>

                    <!-- Seat F1 to J4 -->
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->F1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->F1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->F1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">F1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->F2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->F2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->F2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">F2</button>

                        </div>
                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->F3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->F3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->F3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">F3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->F4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->F4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->F4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">F4</button>

                        </div>
                    </div>

                    <!-- Seat G1 to J4 -->
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->G1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->G1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->G1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">G1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->G2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->G2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->G2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">G2</button>

                        </div>
                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->G3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->G3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->G3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">G3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->G4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->G4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->G4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">G4</button>

                        </div>
                    </div>

                    <!-- Seat H1 to J4 -->
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->H1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->H1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->H1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">H1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->H2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->H2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->H2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">H2</button>

                        </div>
                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->H3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->H3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->H3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">H3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->H4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->H4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->H4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">H4</button>

                        </div>
                    </div>

                    <!-- Seat I1 to J4 -->
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->I1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->I1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->I1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">I1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->I2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->I2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->I2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">I2</button>

                        </div>
                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->I3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->I3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->I3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">I3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->I4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->I4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->I4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">I4</button>

                        </div>
                    </div>

                    <!-- Seat J1 to J4 -->
                    <div class="row seat">
                        <div class="col gap">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->J1 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->J1 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->J1 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">J1</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->J2 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->J2 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->J2 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">J2</button>

                        </div>

                        <div class="col">

                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->J3 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->J3 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->J3 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">J3</button>
                            <button type="button" class="btn 
                            <?php
                            if ($trip_data->J4 === 1) {
                                echo 'btn-warning';
                            } elseif ($trip_data->J4 === 2) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-outline-primary'; // Default class if none of the conditions match.
                            }
                            ?>"
                                onclick="buttonClicked(this)" title="<?php echo $trip_data->J4 === 1 ? 'Name: ' . $trip_data->date . ' Date:' . $trip_data->date : 'Seat is unsold'; ?>">J4</button>

                        </div>
                    </div>


                </div>

            </div>
            <div class="col seat">

                <form action="{{ route('sell_ticket') }}" method="post" target="_blank"
                    onsubmit="reloadFormPage()">
                    @csrf
                    <div class="row g-2 seat">

                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="booking_type" id="btnradio1"
                                autocomplete="off" checked value="5">
                            <label class="btn btn-outline-primary" for="btnradio1">Sell</label>

                            <input type="radio" class="btn-check" name="booking_type" id="btnradio2"
                                autocomplete="off" value="6" disabled>
                            <label class="btn btn-outline-primary" for="btnradio2">Book</label>
                        </div>

                        <div class="col-md">



                            <select class="form-select" id="station-select" name="station" required
                                onchange="updateFare()">
                                <option value="0" selected="" disabled="">Droping Point</option>
                                <option data-fare="450" value="Vatiyapara">
                                    Vatiyapara - 450</option>
                                <option data-fare="500" value="Gopalganj">
                                    Gopalganj - 500</option>
                                <option data-fare="550" value="Fakirhat">
                                    Fakirhat - 550</option>
                                <option data-fare="600" value="Katakhali">
                                    Katakhali - 600</option>
                                <option data-fare="650" value="Khulna">
                                    Khulna - 650</option>
                            </select>


                            <input id="" hidden class="form-control" type="text" name="route"
                                value="{{ $trip_data->route }}" readonly>
                            <input id="" hidden class="form-control" type="text" name="date"
                                value="{{ $trip_data->date }}" readonly>
                            <input id="" hidden class="form-control" type="text" name="time"
                                value="{{ $adjustedTime }}" readonly>
                            <input id="" hidden class="form-control" type="text" name="coach_no"
                                value="{{ $trip_data->coach_no }}" readonly>
                            <input id="" hidden class="form-control" type="text" name="trip_id"
                                value="{{ $trip_data->trip_id }}" readonly>





                            {{-- <input id="fare-input" class="form-control" type="number" name="fare" readonly> --}}

                        </div>
                    </div>
                    <div class="row g-2 seat">
                        <input id="seat-no-input" class="form-control" type="text" name="seat" readonly>
                    </div>
                    <div class="row g-2 seat">
                        <div class="col-md">
                            <div class="form-floating">
                                <input id="fare-input" class="form-control" type="number" name="fare" readonly>
                                <label for="fare-input">Seat Fare</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input id="num-seat-input" class="form-control" type="number" name="num_seat"
                                    readonly>
                                <label for="mobile">Total Seat</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input id="discount-fare" class="form-control" type="number" value="0"
                                    name="discount_fare" onkeyup="discounFare(this.value)" maxlength="3">
                                <label for="mobile">Discount Per Seat</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 seat">
                        <div class="col-md p-2">

                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="gender" id="male"
                                    autocomplete="off" value="1" checked>
                                <label class="btn btn-outline-info" for="male">Male</label>

                                <input type="radio" class="btn-check" name="gender" id="female"
                                    autocomplete="off" value="2">
                                <label class="btn btn-outline-info" for="female">Female</label>
                            </div>

                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input id="total-fare" class="form-control" type="number" name="total_fare"
                                    readonly>
                                <label for="mobile">Total Fare</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 seat">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="mobile" name="mobile"
                                    placeholder="01751944774" maxlength="11" autocomplete="cc-number"
                                    onkeyup="getName(this.value)">
                                <label for="mobile">Mobile Number</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="MR. X" value="MR. " maxlength="20">
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



    <!-- Modal -->
    {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <!-- Modal content goes here -->
    </div>

    <script>
        function updateSelectedItems() {
            var checkbox = document.getElementById('a4');
            if (checkbox.checked) {
                $('#myModal').modal('show');
            }
        }
    </script> --}}


    <!-- Include the jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function buttonClicked(button) {
            // Check if the clicked button already has the class "btn-warning" or "btn-danger"
            if (!$(button).hasClass('btn-warning') && !$(button).hasClass('btn-danger')) {
                // Toggle the class of the clicked button between "btn-outline-primary" and "btn-success"
                $(button).toggleClass('btn-outline-primary btn-success');
            }

            // Create an empty array to store the clicked button texts
            var clickedButtons = [];

            // Loop through all the buttons and find the ones with the "btn-success" class
            $('.btn-success').each(function() {
                // Get the text of each clicked button and push it to the clickedButtons array
                clickedButtons.push($(this).text());
            });

            // Set the value of the number of selected buttons in a variable
            var numSelectedButtons = $('.btn-success').length - 1;

            // Update the value of the "seat-no-input" input field
            $('#seat-no-input').val(clickedButtons.join(''));

            // Update the value of the "num-seat-input" input field with the count of selected buttons
            $('#num-seat-input').val(numSelectedButtons);

            var fareInput = document.getElementById("fare-input").value;

            var discountInput = document.getElementById("discount-fare").value;

            var totalFare = numSelectedButtons * (fareInput - discountInput);

            var totalFareInput = document.getElementById("total-fare");
            totalFareInput.value = totalFare;

        }

        // When the page loads, remove the "Welcome" text if it exists
        $(document).ready(function() {
            // Check if the "Welcome" text exists and remove it
            if ($('#show').text().includes('Welcome')) {
                $('#show').text('Seats:');
            }
        });
    </script>

    <script>
        function updateFare() {

            var stationSelect = document.getElementById("station-select");
            // var fareInput = document.getElementById("fare-input");

            var selectedOption = stationSelect.options[stationSelect.selectedIndex];

            var fareValue = selectedOption.getAttribute("data-fare");

            var fareInput = document.getElementById("fare-input");

            var num_seat = document.getElementById("num-seat-input").value;

            fareInput.value = fareValue;

            var discountInput = document.getElementById("discount-fare").value;

            var totalFare = num_seat * (fareValue - discountInput);

            var totalFareInput = document.getElementById("total-fare");
            totalFareInput.value = totalFare;

            console.log(fareValue);
        }
    </script>

    <script>
        function discounFare(fare) {

            // set num seats input value
            var num_seat = document.getElementById("num-seat-input").value;

            var fareInput = document.getElementById("fare-input").value;

            var discountInput = document.getElementById("discount-fare").value;

            var totalFare = num_seat * (fareInput - discountInput);

            var totalFareInput = document.getElementById("total-fare");
            totalFareInput.value = totalFare;


            // console.log(totalFare);

        }
    </script>

    <script type="text/javascript">
        function reloadFormPage() {
            location.reload();
        }
    </script>

    {{-- <script>
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
    </script> --}}



</body>

</html>
