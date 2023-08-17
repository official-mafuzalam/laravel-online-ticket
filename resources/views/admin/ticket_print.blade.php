<!doctype html>
<html lang="en">

<head>
    <title>Print Ticket</title>
    <style type="text/css">
        html,
        body,
        * {
            padding: 0 !important;
            margin: 0 !important;
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
        window.onload = function() {
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
                    <tr class="noPrint">
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
                                        {{ $ticket->total_fare }} TK
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Seat's:
                                        <strong>
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
                                        </strong>
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
                                    <td colspan="4" nowrap>Total Fare:
                                        {{ $ticket->total_fare }} TK
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
                                        {{ $ticket->total_fare }}
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
    @endunless
@endforeach
