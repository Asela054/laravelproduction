<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material GRN {{ $grn->grn_number }}</title>
    <style>
        body  { font-family: Arial, sans-serif; margin: 16px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px 8px; font-size: 12px; }
        th    { background: #f5f5f5; text-align: left; }
        .tbl-none th, .tbl-none td { border: 0; }
        .tr   { text-align: right; }
        .tc   { text-align: center; }
        .sm   { font-size: 12px; }
        .badge-exact { color: #155724; }
        .badge-short { color: #721c24; }
        .badge-over  { color: #856404; }
    </style>
</head>
<body>

    {{-- Company header--}}
    <table class="tbl-none" style="width:100%; margin-bottom:8px;">
        <tr>
            <td style="width:60%;">
                <h3 style="margin:0;">{{ config('company.company') ?? 'ERAV' }}</h3>
                <h4 style="margin:4px 0 0 0;">No.46, Garden City, Minuwangoda Road, Ja-ela.</h4>
                <h4 style="margin:4px 0 0 0;">Tel: 011 3468568</h4>
            </td>
            <td style="width:40%; vertical-align:top;">
                <table class="tbl-none" style="width:100%;">
                    <tr>
                        <td class="sm">GRN No</td>
                        <td class="sm">: {{ $grn->grn_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Batch No</td>
                        <td class="sm">: {{ $grn->batchno ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">GRN Date</td>
                        <td class="sm">: {{ \Carbon\Carbon::parse($grn->date)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="sm">SPO No</td>
                        <td class="sm">: {{ $grn->supplierPOrder?->order_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Supplier</td>
                        <td class="sm">: {{ optional($grn->supplierPOrder?->suppliers)->suppliername ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Prepared By</td>
                        <td class="sm">: {{ optional($grn->user)->name ?? '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <h4 style="text-align:center; margin:8px 0;">MATERIAL GOODS RECEIVED NOTE</h4>

    {{-- Info strip --}}
    <table class="tbl-none" style="margin-bottom:8px;">
        <tr>
            <td class="sm"><strong>Invoice No &nbsp;:</strong> {{ $grn->invoicenum }}</td>
            <td class="sm" style="padding-left:24px;"><strong>Delivery No &nbsp;:</strong> {{ $grn->dispatchnum }}</td>
            <td class="sm" style="padding-left:24px;"><strong>Location &nbsp;:</strong> {{ optional($grn->location)->locationname ?? '-' }}</td>
        </tr>
    </table>

    {{-- Items --}}
    <table style="margin-top:8px;">
        <thead>
            <tr>
                <th class="sm tc" style="width:4%;">#</th>
                <th class="sm"    style="width:28%;">Material Name</th>
                <th class="sm"    style="width:13%;">Code</th>
                <th class="sm tr" style="width:12%;">Unit Price</th>
                <th class="sm tc" style="width:10%;">Ordered Qty</th>
                <th class="sm tc" style="width:10%;">Received Qty</th>
                <th class="sm tc" style="width:11%;">Qty Status</th>
                <th class="sm tr" style="width:12%;">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($details as $index => $detail)
            @php
                $received = (float) $detail->received_qty;
                $ordered  = (float) $detail->ordered_qty;
                if ($ordered <= 0) {
                    $statusClass = '';
                    $statusLabel = '—';
                } elseif ($received < $ordered) {
                    $diff        = number_format($ordered - $received, 0);
                    $statusClass = 'badge-short';
                    $statusLabel = "Short ({$diff} less)";
                } elseif ($received > $ordered) {
                    $diff        = number_format($received - $ordered, 0);
                    $statusClass = 'badge-over';
                    $statusLabel = "Over ({$diff} more)";
                } else {
                    $statusClass = 'badge-exact';
                    $statusLabel = 'Exact';
                }
            @endphp
            <tr>
                <td class="sm tc">{{ $index + 1 }}</td>
                <td class="sm">{{ $detail->material_name }}</td>
                <td class="sm">{{ $detail->material_code }}</td>
                <td class="sm tr">{{ number_format($detail->unitprice, 2) }}</td>
                <td class="sm tc">{{ number_format($detail->ordered_qty, 2) }}</td>
                <td class="sm tc">{{ number_format($detail->received_qty, 2) }}</td>
                <td class="sm tc {{ $statusClass }}">{{ $statusLabel }}</td>
                <td class="sm tr">{{ number_format($detail->total, 2) }}</td>
            </tr>
            @empty
            <tr><td colspan="8" class="sm tc">No items</td></tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" class="sm">Sub Total</th>
                <th colspan="6" class="sm tr">{{ number_format($grn->total, 2) }}</th>
            </tr>
            <tr>
                <th colspan="2" class="sm">VAT Amount</th>
                <th colspan="6" class="sm tr">{{ number_format($grn->vatamount, 2) }}</th>
            </tr>
            <tr>
                <th colspan="2" class="sm">Net Total</th>
                <th colspan="6" class="sm tr">{{ number_format($grn->nettotal, 2) }}</th>
            </tr>
        </tfoot>
    </table>

    {{--Signatures --}}
    <table class="tbl-none" style="width:100%; margin-top:20px;">
        <tr>
            <td class="sm" style="width:40%; vertical-align:top;">
                <strong class="sm">Remark / Notes</strong><br>
                ____________________________________<br><br>
                ____________________________________
            </td>
            <td style="width:20%;"></td>
            <td class="sm tc" style="width:20%; vertical-align:bottom;">
                <hr style="margin:0;">
                Received By
            </td>
            <td class="sm tc" style="width:20%; vertical-align:bottom;">
                <hr style="margin:0;">
                Confirmed By
            </td>
        </tr>
    </table>

</body>
</html>