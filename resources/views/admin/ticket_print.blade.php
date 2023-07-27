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
        // window.onload = function() {
        //     window.print();
        // }
    </script>

</head>

<body>
    <table border="0" cellpadding="2" cellspacing="25">
        <tbody>
            <tr class="noPrint">
                <th width="219" style="width: 58mm;">Office-copy</th>
                <th width="403" style="width: 99mm;">Passenger-copy</th>
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
                            <td width="75">
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
                            <td nowrap>Discount per Seat:
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
                                    {{ $ticket->seat }}
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
                            <td nowrap><strong>Date:</strong></td>
                            <td class="large mono" nowrap>&nbsp;

                            </td>
                            <td nowrap="nowrap"><strong>Time:</strong></td>
                            <td class="large mono">

                            </td>
                        </tr>
                        <tr>
                            <td width="65"><strong>Coach:</strong></td>
                            <td width="30" class="large mono">
                                </span>
                            </td>
                            <td width="88"><strong>PNR:</strong></td>
                            <td width="132">
                                1
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Name:
                                2
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Mobile:
                                3
                            </td>
                        </tr>
                        <tr>
                            <td>FROM:</td>
                            <td>Hemayetpur</td>
                            <td>TO:</td>
                            <td style="font-weight:bold; font-size:12px">
                                5
                            </td>
                        </tr>
                        <tr>
                            <td nowrap>Issue Date Time:</td>
                            <td nowrap>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Departure Place:
                                4
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Seat No:
                                9
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" nowrap>Ticket Price:
                                6
                            </td>
                            <td colspan="2" nowrap>Discount Price:
                                7
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" nowrap>Total Fare:
                                8
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan="2">
                                10
                            </td>
                        </tr>
                    </table>
                </td>

                <td align="center" valign="top">
                    <table>
                        <!--<caption><p align="left">Chair Coach<br />Golden Line (Ferry)</p></caption>-->
                        <tr>
                            <td><strong>Date:

                                </strong></td>
                            <td colspan="3" nowrap></td>
                        </tr>
                        <tr>
                            <td nowrap><strong>Time:

                                </strong></td>
                        </tr>
                        <tr>
                            <td width="75"><strong>Coach:

                                </strong></td>
                        </tr>
                        <tr>
                            <td nowrap>PNR:
                                1
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Name:
                                2
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Mobile:
                                3
                            </td>
                        </tr>
                        <tr>
                            <td nowrap>FROM:
                                4
                            </td>
                        </tr>
                        <tr>
                            <td nowrap>To:
                                5
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Ticket Price:
                                6
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Discount Price:
                                7
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Total Fare:
                                8
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Seat No:
                                9
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                10
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div align="center"><br /></div>
</body>
