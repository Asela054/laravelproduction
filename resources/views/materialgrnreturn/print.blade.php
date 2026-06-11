<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material GRN Return {{ $return->return_number }}</title>
    <style>
        body  { font-family: Arial, sans-serif; margin: 16px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px 8px; font-size: 12px; }
        th    { background: #f5f5f5; text-align: left; }
        .tbl-none th, .tbl-none td { border: 0; }
        .tr   { text-align: right; }
        .tc   { text-align: center; }
        .sm   { font-size: 12px; }
        .badge-confirmed { color: #155724; }
        .badge-pending   { color: #856404; }
    </style>
</head>
<body>

    {{-- ── Company header ── --}}
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
                        <td class="sm">Return No</td>
                        <td class="sm">: {{ $return->return_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Return Date</td>
                        <td class="sm">: {{ \Carbon\Carbon::parse($return->date)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="sm">GRN No</td>
                        <td class="sm">: {{ optional($return->materialGrn)->grn_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Batch No</td>
                        <td class="sm">: {{ $return->batchno ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Location</td>
                        <td class="sm">: {{ optional($return->location)->locationname ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Prepared By</td>
                        <td class="sm">: {{ optional($return->user)->name ?? '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <h4 style="text-align:center; margin:8px 0;">MATERIAL GRN RETURN NOTE</h4>

    {{-- ── Info strip ── --}}
    <table class="tbl-none" style="margin-bottom:8px;">
        <tr>
            <td class="sm">
                <strong>Status &nbsp;:</strong>
                @if((int) $return->confirm_status === 1)
                    <span class="badge-confirmed">Confirmed</span>
                @else
                    <span class="badge-pending">Pending</span>
                @endif
            </td>
            <td class="sm" style="padding-left:24px;">
                <strong>Reason for Return &nbsp;:</strong> {{ $return->reason ?? '-' }}
            </td>
        </tr>
    </table>

    {{-- ── Items ── --}}
    <table style="margin-top:8px;">
        <thead>
            <tr>
                <th class="sm tc" style="width:4%;">#</th>
                <th class="sm"    style="width:28%;">Material Name</th>
                <th class="sm"    style="width:13%;">Code</th>
                <th class="sm tr" style="width:12%;">Unit Price</th>
                <th class="sm tc" style="width:14%;">GRN Qty</th>
                <th class="sm tc" style="width:14%;">Return Qty</th>
                <th class="sm tr" style="width:15%;">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($details as $index => $detail)
            <tr>
                <td class="sm tc">{{ $index + 1 }}</td>
                <td class="sm">{{ $detail->material_name }}</td>
                <td class="sm">{{ $detail->material_code }}</td>
                <td class="sm tr">{{ number_format($detail->unitprice, 2) }}</td>
                <td class="sm tc">{{ number_format($detail->grn_qty, 2) }}</td>
                <td class="sm tc">{{ number_format($detail->return_qty, 2) }}</td>
                <td class="sm tr">{{ number_format($detail->total, 2) }}</td>
            </tr>
            @empty
            <tr><td colspan="7" class="sm tc">No items</td></tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" class="sm">Total</th>
                <th colspan="5" class="sm tr">{{ number_format($return->total, 2) }}</th>
            </tr>
            <tr>
                <th colspan="2" class="sm">Net Total</th>
                <th colspan="5" class="sm tr">{{ number_format($return->nettotal, 2) }}</th>
            </tr>
        </tfoot>
    </table>

    {{-- ── Signatures ── --}}
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
                Returned By
            </td>
            <td class="sm tc" style="width:20%; vertical-align:bottom;">
                <hr style="margin:0;">
                Confirmed By
            </td>
        </tr>
    </table>

</body>
</html>