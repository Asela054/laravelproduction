@extends('base.master')
@section('content')
<div class="d-flex flex-column flex-column-fluid">

    {{-- Toolbar --}}
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Material GRN
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Material GRN</li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">List</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            {{-- Main card / table --}}
            <div class="card">
                <div class="card-header border-0 pt-6 pb-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span><span class="path2"></span>
                            </i>
                            <input type="text" data-kt-mgrn-filter="search"
                                class="form-control form-control-solid w-250px ps-13"
                                placeholder="Search Material GRN" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#mgrn_modal_add">
                            Create Material GRN
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="mgrnTable">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Date</th>
                                    <th>GRN No</th>
                                    <th>SPO No</th>
                                    <th>Supplier</th>
                                    <th>Invoice No</th>
                                    <th>Dispatch No</th>
                                    <th>Batch No</th>
                                    <th class="text-end">Total</th>
                                    <th class="text-end">VAT</th>
                                    <th class="text-end">Net Total</th>
                                    <th>Location</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        {{-- Create GRN Modal --}}
       
        <div class="modal fade" id="mgrn_modal_add" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-1000px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-2 fw-bold">Create Material GRN</h2>
                        <button type="button" class="btn btn-lg btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <form id="mgrnForm" autocomplete="off">

                            {{-- Row 1: GRN No | Date | SPO --}}
                            <div class="row mb-6">
                                <div class="col-md-4">
                                    <label class="form-label required">GRN Number</label>
                                    <input type="text" id="mgrn_number"
                                        class="form-control form-control-solid" readonly
                                        placeholder="Auto-generated on save">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">GRN Date</label>
                                    <input type="date" id="mgrn_date"
                                        class="form-control form-control-solid"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">Supplier Purchase Order</label>
                                    <select id="mgrn_spo" class="form-select"
                                        data-control="select2"
                                        data-placeholder="Search SPO…" required>
                                        <option value="">Select SPO</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Row 2: Invoice | Dispatch | Location --}}
                            <div class="row mb-6">
                                <div class="col-md-4">
                                    <label class="form-label required">Invoice Number</label>
                                    <input type="text" id="mgrn_invoice"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">Delivery Number</label>
                                    <input type="text" id="mgrn_dispatch"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">Location</label>
                                    <select id="mgrn_location" class="form-select"
                                        data-control="select2"
                                        data-placeholder="Select Location…" required>
                                        <option value="">Select Location</option>
                                        @foreach ($locations as $loc)
                                            <option value="{{ $loc->idtbl_locations }}">{{ $loc->locationname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Supplier info strip --}}
                            <div id="mgrn_supplier_strip" class="alert alert-secondary py-2 px-4 mb-4 d-none">
                                <span class="fw-bold">Supplier:</span>
                                <span id="mgrn_supplier_name">—</span>
                                &nbsp;|&nbsp;
                                <span class="fw-bold">SPO:</span>
                                <span id="mgrn_spo_number">—</span>
                            </div>

                            {{-- Materials table --}}
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle table-row-dashed fs-7 gy-3"
                                    id="mgrn_table">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold text-uppercase gs-0">
                                            <th>Material</th>
                                            <th class="text-center" style="width:90pt">Unit Price</th>
                                            <th class="text-center" style="width:80pt">Ordered Qty</th>
                                            <th class="text-center" style="width:90pt">Received Qty</th>
                                            <th class="text-center" style="width:80pt">Qty Status</th>
                                            <th class="text-end"    style="width:110pt">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mgrn_tableBody">
                                        <tr id="mgrn_empty_row">
                                            <td colspan="6" class="text-center py-6 text-muted">
                                                Select a Supplier Purchase Order to load materials
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            {{-- Totals --}}
                            <div class="row mb-2 mt-3">
                                <div class="col-7 text-end"><span class="fw-bold fs-5">Total</span></div>
                                <div class="col-1 text-end"><span class="fw-bold fs-5">:</span></div>
                                <div class="col-4 text-end">
                                    <span class="fw-bold fs-5" id="mgrn_divtotal">Rs. 0.00</span>
                                    <input type="hidden" id="mgrn_hidetotal" value="0">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-7 text-end"><span class="fw-bold fs-5">VAT %</span></div>
                                <div class="col-1 text-end"><span class="fw-bold fs-5">:</span></div>
                                <div class="col-4 text-end">
                                    <input type="hidden" id="mgrn_hidevatper"    value="0">
                                    <input type="hidden" id="mgrn_hidevatamount" value="0">
                                    <span class="fw-bold fs-5" id="mgrn_divvat">Rs. 0.00</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-7 text-end"><span class="fw-bold fs-5">Net Total</span></div>
                                <div class="col-1 text-end"><span class="fw-bold fs-5">:</span></div>
                                <div class="col-4 text-end">
                                    <span class="fw-bold fs-5" id="mgrn_divnettotal">Rs. 0.00</span>
                                    <input type="hidden" id="mgrn_hidenettotal" value="0">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" id="mgrn_btnsubmit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Create GRN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- View Modal --}}
        <div class="modal fade" id="mgrn_modal_view" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-1000px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-2 fw-bold">Material GRN Details</h2>
                        <button type="button" class="btn btn-lg btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    </div>
                    <div class="modal-body py-6 px-lg-10">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">GRN Number</div>
                                <div class="fw-bold fs-6" id="view_grn_number">—</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">Date</div>
                                <div class="fw-bold fs-6" id="view_date">—</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">SPO Number</div>
                                <div class="fw-bold fs-6" id="view_spo_number">—</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">Supplier</div>
                                <div class="fw-bold fs-6" id="view_supplier">—</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">Invoice No</div>
                                <div class="fw-bold fs-6" id="view_invoice">—</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">Dispatch No</div>
                                <div class="fw-bold fs-6" id="view_dispatch">—</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">Batch No</div>
                                <div class="fw-bold fs-6" id="view_batchno">—</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">Location</div>
                                <div class="fw-bold fs-6" id="view_location">—</div>
                            </div>
                        </div>

                        <div class="table-responsive mb-4">
                            <table class="table table-bordered align-middle fs-7">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold text-uppercase gs-0">
                                        <th>Material</th>
                                        <th>Code</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Ordered Qty</th>
                                        <th class="text-center">Received Qty</th>
                                        <th class="text-center">Qty Status</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="view_lines">
                                    <tr><td colspan="7" class="text-center py-4">Loading…</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-4">
                                <table class="table table-sm fs-7">
                                    <tr>
                                        <td class="fw-bold">Total</td>
                                        <td class="text-end" id="view_total">—</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">VAT</td>
                                        <td class="text-end" id="view_vat">—</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Net Total</td>
                                        <td class="text-end fw-bolder" id="view_nettotal">—</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Print Modal --}}
        <div class="modal fade" id="mgrn_modal_print" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-3 fw-bold">Print Material GRN</h2>
                        <button type="button" class="btn btn-sm btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    </div>
                    <div class="modal-body p-0" style="height:80vh;">
                        <iframe id="mgrn_print_frame" src="about:blank"
                            style="border:0;width:100%;height:100%;"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="mgrn_btn_print" class="btn btn-primary">Print</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {

    /* Helpers */
    const parseNum = v => { const n = parseFloat(String(v ?? '').replace(/,/g,'')); return isNaN(n) ? 0 : n; };
    const fmtNum  = (v, d=2) => parseNum(v).toLocaleString('en-US',{minimumFractionDigits:d,maximumFractionDigits:d});
    const fmtCur  = v => `Rs. ${fmtNum(v)}`;

    const resetTotals = () => {
        $('#mgrn_hidetotal,#mgrn_hidevatamount,#mgrn_hidenettotal').val(0);
        $('#mgrn_divtotal,#mgrn_divvat,#mgrn_divnettotal').text(fmtCur(0));
    };

    /* Qty-status badge */
    const qtyBadge = (received, ordered) => {
        if (ordered <= 0) return '<span class="badge badge-light-secondary">—</span>';
        if (received < ordered)  return `<span class="badge badge-light-danger">Short (${fmtNum(ordered-received,0)} less)</span>`;
        if (received > ordered)  return `<span class="badge badge-light-warning">Over (${fmtNum(received-ordered,0)} more)</span>`;
        return '<span class="badge badge-light-success">Exact</span>';
    };

    /* Recalc row total*/
    const recalcRow = $row => {
        const price = parseNum($row.find('.mgrn-unitprice').val());
        const qty   = parseNum($row.find('.mgrn-recv-qty').val());
        const t     = (price * qty).toFixed(2);
        $row.find('.mgrn-total').val(t);
        $row.find('.mgrn-total-display').text(fmtCur(t));
    };

    /* Recalc totals */
    const recalcTotals = () => {
        let total = 0;
        $('#mgrn_tableBody tr[data-material-id]').each(function () {
            total += parseNum($(this).find('.mgrn-total').val());
        });
        const vatRate = parseNum($('#mgrn_hidevatper').val());
        const vatAmt  = total * (vatRate / 100);
        const net     = total + vatAmt;

        $('#mgrn_hidetotal').val(total.toFixed(2));
        $('#mgrn_hidevatamount').val(vatAmt.toFixed(2));
        $('#mgrn_hidenettotal').val(net.toFixed(2));
        $('#mgrn_divtotal').text(fmtCur(total));
        $('#mgrn_divvat').text(fmtCur(vatAmt));
        $('#mgrn_divnettotal').text(fmtCur(net));
    };

    /* Update qty-status badge live */
    const updateQtyBadge = $row => {
        const received = parseNum($row.find('.mgrn-recv-qty').val());
        const ordered  = parseNum($row.data('ordered-qty'));
        $row.find('.mgrn-qty-status').html(qtyBadge(received, ordered));
    };

    /* Build a single material row */
    const buildRow = detail => {
        const orderedQty = parseNum(detail.ordered_qty);
        const initRecv   = parseNum(detail.ordered_qty);  // default received = ordered
        const initTotal  = (parseNum(detail.unitprice) * initRecv).toFixed(2);

        return `
        <tr class="align-middle" data-material-id="${detail.material_id}"
            data-ordered-qty="${orderedQty}">
            <td class="ps-2">
                ${detail.material_name || 'N/A'}
                <small class="text-muted d-block">${detail.material_code || ''}</small>
                <input type="hidden" class="mgrn-total" value="${initTotal}">
            </td>
            <td class="text-center">
                <input type="text"
                    class="form-control form-control-solid form-control-sm text-end mgrn-unitprice"
                    value="${fmtNum(detail.unitprice)}" readonly>
            </td>
            <td class="text-center fw-bold">${fmtNum(orderedQty)}</td>
            <td class="text-center">
                <input type="number"
                    class="form-control form-control-solid form-control-sm text-end mgrn-recv-qty"
                    value="${initRecv}" min="0" step="any">
            </td>
            <td class="text-center mgrn-qty-status">
                ${qtyBadge(initRecv, orderedQty)}
            </td>
            <td class="text-end pe-3 mgrn-total-display">${fmtCur(initTotal)}</td>
        </tr>`;
    };

    /* Render SPO rows */
    const renderRows = details => {
        if (!details || !details.length) {
            $('#mgrn_tableBody').html(
                '<tr><td colspan="6" class="text-center py-6 text-muted">No materials found for this SPO</td></tr>'
            );
            resetTotals();
            return;
        }
        $('#mgrn_tableBody').html(details.map(buildRow).join(''));
        recalcTotals();
    };

    /* Row events  */
    $(document).on('input', '.mgrn-recv-qty', function () {
        const $row = $(this).closest('tr');
        recalcRow($row);
        updateQtyBadge($row);
        recalcTotals();
    });

    /* Load SPO list  */
    const loadSPOs = () => {
        const $sel = $('#mgrn_spo');
        $sel.prop('disabled', true).html('<option value="">Loading…</option>');

        $.ajax({
            url:  "{{ route('materialgrn.spo-list') }}",
            type: 'GET',
            success: orders => {
                const opts = ['<option value="">Select SPO</option>'];
                (orders || []).forEach(o => opts.push(`<option value="${o.id}">${o.label}</option>`));
                $sel.html(opts.join('')).prop('disabled', false);
                $sel.select2({ dropdownParent: $('#mgrn_modal_add'), placeholder: 'Search SPO…', allowClear: true });
            },
            error: () => {
                $sel.html('<option value="">Failed to load</option>').prop('disabled', false);
                Swal.fire('Error', 'Could not load Supplier Purchase Orders', 'error');
            },
        });
    };

    /* SPO */
    $('#mgrn_spo').on('change', function () {
        const id = $(this).val();
        if (!id) {
            $('#mgrn_supplier_strip').addClass('d-none');
            $('#mgrn_tableBody').html(
                '<tr id="mgrn_empty_row"><td colspan="6" class="text-center py-6 text-muted">Select a Supplier Purchase Order to load materials</td></tr>'
            );
            resetTotals();
            $('#mgrn_hidevatper').val(0);
            return;
        }

        $('#mgrn_tableBody').html('<tr><td colspan="6" class="text-center py-6">Loading materials…</td></tr>');

        $.ajax({
            url:  `{{ url('materialgrn/spo') }}/${id}`,
            type: 'GET',
            success: resp => {
                $('#mgrn_hidevatper').val(resp.order?.vat_rate ?? 0);
                $('#mgrn_supplier_name').text(resp.order?.supplier ?? '—');
                $('#mgrn_spo_number').text(resp.order?.number ?? '—');
                $('#mgrn_supplier_strip').removeClass('d-none');
                renderRows(resp.details || []);
            },
            error: () => {
                resetTotals();
                Swal.fire('Error', 'Failed to load SPO details', 'error');
            },
        });
    });

    /* Init Select2 for Location */
    $('#mgrn_location').select2({ dropdownParent: $('#mgrn_modal_add'), placeholder: 'Select Location…', allowClear: true });

    /* Load SPOs on ready */
    loadSPOs();

    /* Collect payload */
    const buildPayload = () => {
        const date     = $('#mgrn_date').val();
        const spoId    = $('#mgrn_spo').val();
        const invoice  = $('#mgrn_invoice').val().trim();
        const dispatch = $('#mgrn_dispatch').val().trim();
        const locId    = $('#mgrn_location').val();

        if (!date || !spoId || !invoice || !dispatch || !locId) {
            Swal.fire('Required', 'Please fill all required fields', 'warning');
            return null;
        }

        const details = [];
        $('#mgrn_tableBody tr[data-material-id]').each(function () {
            const $r     = $(this);
            const matId  = $r.data('material-id');
            const qty    = parseNum($r.find('.mgrn-recv-qty').val());
            const price  = parseNum($r.find('.mgrn-unitprice').val());
            const total  = parseNum($r.find('.mgrn-total').val());
            if (!matId) return;
            details.push({ material_id: matId, qty, unitprice: price, total });
        });

        if (!details.length) {
            Swal.fire('Required', 'No material rows found', 'warning');
            return null;
        }

        return {
            date,
            invoicenum:         invoice,
            dispatchnum:        dispatch,
            location_id:        locId,
            supplier_porder_id: spoId,
            total:              parseNum($('#mgrn_hidetotal').val()),
            vatamount:          parseNum($('#mgrn_hidevatamount').val()),
            nettotal:           parseNum($('#mgrn_hidenettotal').val()),
            details,
        };
    };

    /* Submit */
    $('#mgrn_btnsubmit').on('click', function () {
        const payload = buildPayload();
        if (!payload) return;

        const $btn = $(this);
        const orig = $btn.html();
        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Saving…');

        $.ajax({
            url:         "{{ route('materialgrn.store') }}",
            method:      'POST',
            contentType: 'application/json',
            headers:     { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data:        JSON.stringify(payload),
            success: resp => {
                Swal.fire('Success', resp.message || 'Material GRN created', 'success');
                $('#mgrn_modal_add').modal('hide');
                mgrnTable.ajax.reload(null, false);
            },
            error: xhr => {
                let msg = 'Save failed';
                if (xhr.responseJSON?.errors)  msg = Object.values(xhr.responseJSON.errors).flat().join('\n');
                else if (xhr.responseJSON?.message) msg = xhr.responseJSON.message;
                Swal.fire('Error', msg, 'error');
            },
            complete: () => $btn.prop('disabled', false).html(orig),
        });
    });

    // Load next GRN number when create modal opens
    $('#mgrn_modal_add').on('show.bs.modal', function () {
        $('#mgrn_number').val('Generating…');
        $.get("{{ route('materialgrn.next-grn-number') }}", function (resp) {
            $('#mgrn_number').val(resp.grn_number ?? '');
        });
    });

    /* Reset modal on close*/
    $('#mgrn_modal_add').on('hidden.bs.modal', function () {
        $('#mgrnForm')[0].reset();
        $('#mgrn_spo').val(null).trigger('change');
        $('#mgrn_location').val(null).trigger('change');
        $('#mgrn_tableBody').html('<tr id="mgrn_empty_row"><td colspan="6" class="text-center py-6 text-muted">Select a Supplier Purchase Order to load materials</td></tr>');
        $('#mgrn_supplier_strip').addClass('d-none');
        $('#mgrn_hidevatper').val(0);
        resetTotals();
    });

    /* View GRN */
    $(document).on('click', '.mgrn-btn-view', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $('#view_lines').html('<tr><td colspan="7" class="text-center py-4">Loading…</td></tr>');
        $('#mgrn_modal_view').modal('show');

        $.ajax({
            url:  `{{ url('materialgrn') }}/${id}`,
            type: 'GET',
            success: data => {
                $('#view_grn_number').text(data.grn_number ?? '—');
                $('#view_date').text(data.date ?? '—');
                $('#view_spo_number').text(data.spo_number ?? '—');
                $('#view_supplier').text(data.supplier ?? '—');
                $('#view_invoice').text(data.invoicenum ?? '—');
                $('#view_dispatch').text(data.dispatchnum ?? '—');
                $('#view_batchno').text(data.batchno ?? '—');
                $('#view_location').text(data.location ?? '—');
                $('#view_total').text(fmtCur(data.total ?? 0));
                $('#view_vat').text(fmtCur(data.vatamount ?? 0));
                $('#view_nettotal').text(fmtCur(data.nettotal ?? 0));

                const rows = (data.details ?? []).map(d => `
                    <tr>
                        <td>${d.material_name}</td>
                        <td><span class="badge badge-light-secondary">${d.material_code}</span></td>
                        <td class="text-center">${fmtNum(d.unitprice)}</td>
                        <td class="text-center">${fmtNum(d.ordered_qty)}</td>
                        <td class="text-center">${fmtNum(d.received_qty)}</td>
                        <td class="text-center">${viewQtyBadge(d.qty_status, d.ordered_qty, d.received_qty)}</td>
                        <td class="text-end">${fmtCur(d.total)}</td>
                    </tr>`).join('');

                $('#view_lines').html(rows || '<tr><td colspan="7" class="text-center">No items</td></tr>');
            },
            error: () => $('#view_lines').html('<tr><td colspan="7" class="text-center text-danger">Failed to load</td></tr>'),
        });
    });

    const viewQtyBadge = (status, ordered, received) => {
        const diff = Math.abs(parseNum(ordered) - parseNum(received));
        if (status === 'exact')   return '<span class="badge badge-light-success">Exact</span>';
        if (status === 'short')   return `<span class="badge badge-light-danger">Short (${fmtNum(diff,0)} less)</span>`;
        if (status === 'over')    return `<span class="badge badge-light-warning">Over (${fmtNum(diff,0)} more)</span>`;
        return '<span class="badge badge-light-secondary">—</span>';
    };

    /*Confirm GRN*/
    $(document).on('click', '.mgrn-btn-confirm', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Confirm Material GRN?',
            text:  'This will add all received materials to stock. This cannot be undone.',
            icon:  'warning',
            showCancelButton:  true,
            confirmButtonText: 'Yes, confirm',
        }).then(r => {
            if (!r.isConfirmed) return;
            $.ajax({
                url:  `{{ url('materialgrn') }}/${id}/confirm`,
                type: 'POST',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: resp => {
                    Swal.fire('Success', resp.message || 'Confirmed', 'success');
                    mgrnTable.ajax.reload(null, false);
                },
                error: xhr => Swal.fire('Error', xhr.responseJSON?.message || 'Failed', 'error'),
            });
        });
    });


    /*Delete GRN*/
    $(document).on('click', '.mgrn-btn-delete', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Delete this GRN?',
            text:  'This action cannot be undone.',
            icon:  'warning',
            showCancelButton:  true,
            confirmButtonText: 'Yes, delete',
            confirmButtonColor: '#d33',
        }).then(r => {
            if (!r.isConfirmed) return;
            $.ajax({
                url:  `{{ url('materialgrn') }}/${id}`,
                type: 'POST',
                data: { 
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'DELETE'
                },
                success: resp => {
                    Swal.fire('Deleted', resp.message || 'GRN deleted', 'success');
                    mgrnTable.ajax.reload(null, false);
                },
                error: xhr => Swal.fire('Error', xhr.responseJSON?.message || 'Delete failed', 'error'),
            });
        });
    });

    /* Print GRN */
    $(document).on('click', '.mgrn-btn-pdf, .mgrn-btn-print', function (e) {
        e.preventDefault();
        const src = "{{ route('materialgrn.pdf', ['id' => ':id']) }}".replace(':id', $(this).data('id'));
        $('#mgrn_print_frame').attr('src', src);
        $('#mgrn_modal_print').modal('show');
    });

    $('#mgrn_btn_print').on('click', function () {
        const f = document.getElementById('mgrn_print_frame');
        if (f?.contentWindow) { f.contentWindow.focus(); f.contentWindow.print(); }
    });

    $('#mgrn_modal_print').on('hidden.bs.modal', function () {
        $('#mgrn_print_frame').attr('src', 'about:blank');
    });

    /*DataTable */
    var mgrnTable = $('#mgrnTable').DataTable({
        processing: true,
        serverSide: true,
        order: [[0, 'desc']],
        ajax: "{{ route('materialgrn.data') }}",
        columns: [
            { data: 'date',         name: 'date' },
            {
                data: 'grn_number', name: 'grn_number',
                render: d => `<span class="badge badge-light-primary">${d}</span>`
            },
            {
                data: 'supplier_p_order.order_number',
                name: 'supplierPOrder.order_number',
                defaultContent: '<span class="text-muted">—</span>',
            },
            {
                data: 'supplier_p_order.suppliers.suppliername',
                name: 'supplierPOrder.suppliers.suppliername',
                defaultContent: '<span class="text-muted">—</span>',
            },
            { data: 'invoicenum',  name: 'invoicenum' },
            { data: 'dispatchnum', name: 'dispatchnum' },
            { data: 'batchno',     name: 'batchno', defaultContent: '—' },
            {
                data: 'total', name: 'total',
                className: 'text-end',
                render: $.fn.dataTable.render.number(',', '.', 2),
            },
            {
                data: 'vatamount', name: 'vatamount',
                className: 'text-end',
                render: $.fn.dataTable.render.number(',', '.', 2),
            },
            {
                data: 'nettotal', name: 'nettotal',
                className: 'text-end',
                render: $.fn.dataTable.render.number(',', '.', 2),
            },
            {
                data: 'location.locationname',
                name: 'location.locationname',
                defaultContent: '<span class="text-muted">—</span>',
                orderable: false, searchable: false,
            },
            {
                data: 'confirm_status', name: 'confirm_status',
                className: 'text-center',
                orderable: false, searchable: false,
                render: d => d == 1
                    ? '<span class="badge badge-light-success">Confirmed</span>'
                    : '<span class="badge badge-light-warning">Pending</span>',
            },
            {
                data: null, className: 'text-end',
                orderable: false, searchable: false,
                render: (data, type, row) => {
                    const id        = row.idtbl_material_grn;
                    const confirmed = row.confirm_status == 1;

                    if (confirmed) {
                        // Confirmed: View + PDF only
                        return `
                        <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                    menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                            data-kt-menu="true">
                            <div class="menu-item">
                                <a class="menu-link mgrn-btn-view" href="#" data-id="${id}">
                                    <span class="menu-icon"><i class="fa-solid fa-eye"></i></span>
                                    <span class="menu-title">View</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link mgrn-btn-pdf" href="#" data-id="${id}">
                                    <span class="menu-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                    <span class="menu-title">PDF</span>
                                </a>
                            </div>
                        </div>`;
                    } else {
                        // Pending: View + Delete only (no Confirm, no PDF)
                        return `
                        <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                    menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                            data-kt-menu="true">
                            <div class="menu-item">
                                <a class="menu-link mgrn-btn-view" href="#" data-id="${id}">
                                    <span class="menu-icon"><i class="fa-solid fa-eye"></i></span>
                                    <span class="menu-title">View</span>
                                </a>
                            </div>
                            ${!confirmed ? `
                            <div class="menu-item">
                                <a class="menu-link mgrn-btn-confirm" href="#" data-id="${id}">
                                    <span class="menu-icon"><i class="fa-solid fa-check"></i></span>
                                    <span class="menu-title">Confirm</span>
                                </a>
                            </div>` : ''}
                            <div class="menu-item">
                                <a class="menu-link mgrn-btn-delete text-danger" href="#" data-id="${id}">
                                    <span class="menu-icon"><i class="fa-solid fa-trash"></i></span>
                                    <span class="menu-title">Delete</span>
                                </a>
                            </div>
                        </div>`;
                    }
                },
            },
        ],
        drawCallback: () => KTMenu.createInstances(),
    });

    $("input[data-kt-mgrn-filter='search']").on('keyup change', function () {
        mgrnTable.search(this.value).draw();
    });

});
</script>
@endsection