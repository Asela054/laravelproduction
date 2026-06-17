<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Purchase Order</title>
    <style>
        body  { font-family: Arial, sans-serif; margin: 16px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px 8px; font-size: 12px; }
        th    { background: #f5f5f5; text-align: left; }
        .tbl-none th, .tbl-none td { border: 0; }
        .tr   { text-align: right; }
        .tc   { text-align: center; }
        .sm   { font-size: 12px; }
    </style>
</head>
<body>

    {{-- Company header --}}
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
                        <td class="sm">Order No</td>
                        <td class="sm">: {{ $order->order_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Order Date</td>
                        <td class="sm">: {{ $order->orderdate }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Supplier</td>
                        <td class="sm">: {{ optional($order->suppliers)->suppliername ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="sm">Prepared By</td>
                        <td class="sm">: {{ auth()->user()->name ?? '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <h4 style="text-align:center; margin:8px 0;">SUPPLIER PURCHASING ORDER</h4>

    {{-- Items --}}
    <table style="margin-top:8px;">
        <thead>
            <tr>
                <th class="sm tc" style="width:5%;">#</th>
                <th class="sm"    style="width:35%;">Material Name</th>
                <th class="sm"    style="width:15%;">Code</th>
                <th class="sm tr" style="width:15%;">Unit Price</th>
                <th class="sm tc" style="width:10%;">Qty</th>
                <th class="sm tr" style="width:20%;">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($details as $index => $detail)
            <tr>
                <td class="sm tc">{{ $index + 1 }}</td>
                <td class="sm">{{ $detail->material->materialname ?? '-' }}</td>
                <td class="sm">{{ $detail->material->materialinfocode ?? '-' }}</td>
                <td class="sm tr">{{ number_format($detail->unitprice, 2) }}</td>
                <td class="sm tc">{{ $detail->qty }}</td>
                <td class="sm tr">{{ number_format($detail->qty * $detail->unitprice, 2) }}</td>
            </tr>
            @empty
            <tr><td colspan="6" class="sm tc">No items</td></tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="sm">Net Total</th>
                <th class="sm tr">{{ number_format($order->nettotal, 2) }}</th>
            </tr>
        </tfoot>
    </table>

    {{-- Remark --}}
    @if(!empty(trim($order->remark ?? '')))
    <table style="margin-top:8px;">
        <tr>
            <td class="sm"><strong>Remark:</strong> {{ $order->remark }}</td>
        </tr>
    </table>
    @endif

    {{-- Signatures --}}
    <table class="tbl-none" style="width:100%; margin-top:20px;">
        <tr>
            <td class="sm" style="width:33%; vertical-align:top;">
                <strong class="sm">Cheque Information</strong><br>
                Cheque No: __________________<br>
                Cheque Date: _______________
            </td>
            <td style="width:34%;"></td>
            <td class="sm tc" style="width:16%; vertical-align:bottom;">
                <hr style="margin:0;">
                Confirmed By
            </td>
            <td class="sm tc" style="width:16%; vertical-align:bottom;">
                <hr style="margin:0;">
                Prepared By
            </td>
        </tr>
    </table>

</body>
</html>