<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Islam Paribahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
    <nav class="sticky-top navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Islam Paribahan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="container overflow-hidden">
                    <form class="row gx-2" action="" method="post">
                        <div class="col">
                            <div class="p-1">
                                <select class="form-select mr-4" aria-label="Default select example">
                                    <option selected>From</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Gopalganj">Gopalganj</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Narail">Narail</option>
                                    <option value="Pirojpur">Pirojpur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <select class="form-select mr-4" aria-label="Default select example">
                                    <option selected>To</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Gopalganj">Gopalganj</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Narail">Narail</option>
                                    <option value="Pirojpur">Pirojpur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <input name="date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>"
                                    required />
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <button type="submit" class="btn btn-outline-success">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex flex-row-reverse">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="triggerId"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{ route('add_trip') }}">
                                <i class="bi bi-ticket-detailed"></i>
                                Add Trip
                            </a>
                            <a class="dropdown-item" href="search_tickets.php">
                                <i class="bi bi-ticket-detailed"></i>
                                Search Ticket
                            </a>
                            <a class="dropdown-item" href="sells_report.php">
                                <i class="bi bi-card-list"></i>
                                User Sell Report
                            </a>
                            <a class="dropdown-item" href="admin_features.php">
                                <i class="bi bi-columns-gap"></i>
                                Admin Features
                            </a>
                            <a class="dropdown-item" href="../logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
