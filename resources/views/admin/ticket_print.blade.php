<!doctype html>
<html lang="en">

<head>
    <title>Print Ticket</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style type="text/css">
        html,
        body,
        * {
            font-size: 9pt;
        }

        table {
            border: none !important;
            font-size: 5pt;
            font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
        }

        caption>p {
            margin: 5px 5px;
            padding: 0;
        }

        .large {
            font-size: 1.2em;
        }

        .mono {
            font-family: Consolas, "Andale Mono", "Lucida Console", Monaco, "Courier New", monospace;
        }

        @media screen {
            .printOnly {
                display: none;
            }
        }

        @media print {
            .noPrint {
                display: none !important;
            }
        }
    </style>
    <script language="javascript">
        // window.onload = function() {
        //     window.print();
        // }

        function printPage() {
            window.print();
        }
    </script>

</head>
@php
    $displayedTicketIds = []; // Initialize an array to keep track of displayed Ticket IDs
@endphp

@foreach ($tickets as $ticket)
    {{-- Check if the current Ticket ID has been displayed --}}
    @unless (in_array($ticket->ticket_id, $displayedTicketIds))

        <body>
            <table border="0" cellpadding="2" cellspacing="25">
                <tbody>
                    <tr class="noPrint text-center">
                        <th width="219" style="width: 58mm;">Office-copy</th>
                        <th width="400" style="width: 80mm;">Passenger-copy</th>
                        <th width="215" style="width: 58mm;">Guide-copy</th>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <table>
                                <!--<caption><p align="left">Chair Coach<br />Golden Line (Ferry)</p></caption>-->
                                <tr>
                                    <td nowrap>
                                        <strong>Date:
                                            {{ $ticket->date }}
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>
                                        <strong>Time:
                                            {{ $ticket->time }}
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Coach:
                                            {{ $ticket->coach_no }}
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>PNR:
                                        {{ $ticket->ticket_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Mobile:
                                        {{ $ticket->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Name:
                                        {{ $ticket->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>FROM:
                                        {{ $ticket->seller_counter }}
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>To:
                                        {{ $ticket->station }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Ticket Price:
                                        {{ $ticket->fare }} TK
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>Discount per seat:
                                        {{ $ticket->discount }} TK
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Total Fare:
                                        {{-- Calculate the total fare by multiplying count with discount_fare_per_seat --}}
                                        {{ count($tickets->where('ticket_id', $ticket->ticket_id)) * $ticket->discount_fare_per_seat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Seat:
                                        @foreach ($tickets->where('ticket_id', $ticket->ticket_id) as $ticketGroup)
                                            {{ $ticketGroup->seat }}
                                            @unless ($loop->last)
                                                ,
                                            @endunless
                                        @endforeach
                                        {{-- Add the displayed Ticket ID to the array --}}
                                        @php
                                            $displayedTicketIds[] = $ticket->ticket_id;
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        {{ $ticket->created_at }}
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td align="center" valign="top">
                            <table>
                                <!--<caption><p align="left">Chair Coach<br />Golden Line (Ferry)</p></caption>-->
                                <tr>
                                    <td nowrap>
                                        <strong>
                                            Date: {{ $ticket->date }}
                                        </strong>
                                    </td>
                                    <td class="large mono">

                                    </td>
                                    <td nowrap="nowrap">
                                        <strong>
                                            Time:{{ $ticket->time }}
                                        </strong>
                                    </td>
                                    <td class="large mono">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="65">
                                        <strong>
                                            Coach:{{ $ticket->coach_no }}
                                        </strong>
                                    </td>
                                    <td width="30" class="large mono">

                                    </td>
                                    <td width="88">
                                        <strong>
                                            PNR:{{ $ticket->ticket_id }}
                                        </strong>
                                    </td>
                                    <td width="132">
                                        1
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Name:
                                        {{ $ticket->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Mobile:
                                        {{ $ticket->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>FROM: {{ $ticket->seller_counter }}</td>
                                    <td>

                                    </td>
                                    <td>TO: {{ $ticket->station }}</td>
                                    <td style="font-weight:bold; font-size:12px">

                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>Issue Date Time:</td>
                                    <td nowrap>
                                        {{ $ticket->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Departure Place:
                                        {{ $ticket->seller_counter }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Seat No:
                                        @foreach ($tickets->where('ticket_id', $ticket->ticket_id) as $ticketGroup)
                                            {{ $ticketGroup->seat }}
                                            @unless ($loop->last)
                                                ,
                                            @endunless
                                        @endforeach

                                        {{-- Add the displayed Ticket ID to the array --}}
                                        @php
                                            $displayedTicketIds[] = $ticket->ticket_id;
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" nowrap>Ticket Price:
                                        {{ $ticket->fare }} TK
                                    </td>
                                    <td colspan="2" nowrap>Discount per seat:
                                        {{ $ticket->discount }} TK
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Total Fare:
                                        {{-- Calculate the total fare by multiplying count with discount_fare_per_seat --}}
                                        {{ count($tickets->where('ticket_id', $ticket->ticket_id)) * $ticket->discount_fare_per_seat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        For more info, visit:
                                        <strong>www.friendsit.xyz</strong>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td align="center" valign="top">
                            <table>
                                <!--<caption><p align="left">Chair Coach<br />Golden Line (Ferry)</p></caption>-->
                                <tr>
                                    <td nowrap>
                                        <strong>Date:
                                            {{ $ticket->date }}
                                        </strong>
                                    </td>
                                    <td colspan="3" nowrap>

                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>
                                        <strong>Time:
                                            {{ $ticket->time }}
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Coach:
                                            {{ $ticket->coach_no }}
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>PNR:
                                        {{ $ticket->ticket_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Mobile:
                                        {{ $ticket->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Name:
                                        {{ $ticket->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>FROM:
                                        {{ $ticket->seller_counter }}
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap>TO:
                                        {{ $ticket->station }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Ticket Price:
                                        {{ $ticket->fare }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Discount Price:
                                        {{ $ticket->discount }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Total Fare:
                                        {{-- Calculate the total fare by multiplying count with discount_fare_per_seat --}}
                                        {{ count($tickets->where('ticket_id', $ticket->ticket_id)) * $ticket->discount_fare_per_seat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Seat No:

                                        @foreach ($tickets->where('ticket_id', $ticket->ticket_id) as $ticketGroup)
                                            {{ $ticketGroup->seat }}
                                            @unless ($loop->last)
                                                ,
                                            @endunless
                                        @endforeach

                                        {{-- Add the displayed Ticket ID to the array --}}
                                        @php
                                            $displayedTicketIds[] = $ticket->ticket_id;
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        {{ $ticket->created_at }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div align="center"><br /></div>
        </body>

        <div class="container noPrint p-4">

            <button onclick="printPage()" class="btn btn-info">Print</button>


        </div>

        <div class="container noPrint">
            <form id="cancelForm" action="{{ route('cancel_ticket') }}" method="post">
                @csrf
                <input type="hidden" name="trip_id" value="{{ $ticket->trip_id }}">
                @foreach ($tickets->where('ticket_id', $ticket->ticket_id) as $ticketGroup)
                    <input name="seat[]" class="form-check-input" type="checkbox"
                        id="inlineCheckbox{{ $ticketGroup->seat }}" value="{{ $ticketGroup->seat }}">
                    <label class="form-check-label"
                        for="inlineCheckbox{{ $ticketGroup->seat }}">{{ $ticketGroup->seat }}</label>

                    @unless ($loop->last)
                        ,
                    @endunless
                @endforeach
                <button class="btn btn-danger" type="button" onclick="confirmCancel()">Cancel</button>
                <p id="errorText" style="color: red; display: none;">Please select at least one checkbox.</p>
            </form>
        </div>
    @endunless
@endforeach

<script>
    function confirmCancel() {
        var checkboxes = document.querySelectorAll('input[name="seat[]"]');
        var atLeastOneChecked = Array.prototype.slice.call(checkboxes).some(checkbox => checkbox.checked);

        if (atLeastOneChecked) {
            document.getElementById('errorText').style.display = 'none';
            var confirmation = confirm("Are you sure you want to cancel?");
            if (confirmation) {
                // User clicked "OK", submit the form
                document.getElementById('cancelForm').submit();
            } else {
                // User clicked "Cancel", do nothing
            }
        } else {
            document.getElementById('errorText').style.display = 'block';
        }
    }
</script>