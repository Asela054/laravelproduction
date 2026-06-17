@extends('base.master')
@section('content')
<div class="d-flex flex-column flex-column-fluid">

    {{-- Toolbar --}}
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Material GRN Return
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Material GRN Return</li>
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
                            <input type="text" data-kt-mgrnr-filter="search"
                                class="form-control form-control-solid w-250px ps-13"
                                placeholder="Search GRN Return" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#mgrnr_modal_add">
                            Create GRN Return
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="mgrnrTable">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Date</th>
                                    <th>Return No</th>
                                    <th>GRN No</th>
                                    <th>Batch No</th>
                                    <th>Location</th>
                                    <th>Reason</th>
                                    <th class="text-end">Total</th>
                                    <th class="text-end">Net Total</th>
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

        {{-- Create GRN Return Modal--}}
        <div class="modal fade" id="mgrnr_modal_add" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-1000px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-2 fw-bold">Create GRN Return</h2>
                        <button type="button" class="btn btn-lg btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <form id="mgrnrForm" autocomplete="off">

                            {{-- Row 1: Return No | Return Date | GRN --}}
                            <div class="row mb-6">
                                <div class="col-md-4">
                                    <label class="form-label required">Return Number</label>
                                    <input type="text" id="mgrnr_number"
                                        class="form-control form-control-solid" readonly
                                        placeholder="Auto-generated on save">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">Return Date</label>
                                    <input type="date" id="mgrnr_date"
                                        class="form-control form-control-solid"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">GRN</label>
                                    <select id="mgrnr_grn" class="form-select"
                                        data-control="select2"
                                        data-placeholder="Search GRN…" required>
                                        <option value="">Select GRN</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Row 2: Location (auto) | Batch No (auto) | Reason --}}
                            <div class="row mb-6">
                                <div class="col-md-4">
                                    <label class="form-label">Location</label>
                                    <input type="text" id="mgrnr_location"
                                        class="form-control form-control-solid" readonly
                                        placeholder="Auto-filled from GRN">
                                    <input type="hidden" id="mgrnr_location_id">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Batch Number</label>
                                    <input type="text" id="mgrnr_batchno"
                                        class="form-control form-control-solid" readonly
                                        placeholder="Auto-filled from GRN">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">Reason for Return</label>
                                    <input type="text" id="mgrnr_reason"
                                        class="form-control" required
                                        placeholder="Enter reason for return">
                                </div>
                            </div>

                            {{-- Materials table --}}
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle table-row-dashed fs-7 gy-3"
                                    id="mgrnr_table">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold text-uppercase gs-0">
                                            <th>Material</th>
                                            <th class="text-center" style="width:100pt">Unit Price</th>
                                            <th class="text-center" style="width:80pt">GRN Qty</th>
                                            <th class="text-center" style="width:90pt">Return Qty</th>
                                            <th class="text-end"    style="width:110pt">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mgrnr_tableBody">
                                        <tr id="mgrnr_empty_row">
                                            <td colspan="5" class="text-center py-6 text-muted">
                                                Select a GRN to load materials
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
                                    <span class="fw-bold fs-5" id="mgrnr_divtotal">Rs. 0.00</span>
                                    <input type="hidden" id="mgrnr_hidetotal" value="0">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-7 text-end"><span class="fw-bold fs-5">Net Total</span></div>
                                <div class="col-1 text-end"><span class="fw-bold fs-5">:</span></div>
                                <div class="col-4 text-end">
                                    <span class="fw-bold fs-5" id="mgrnr_divnettotal">Rs. 0.00</span>
                                    <input type="hidden" id="mgrnr_hidenettotal" value="0">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" id="mgrnr_btnsubmit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Create Return
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{--  View Modal --}}
        <div class="modal fade" id="mgrnr_modal_view" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-1000px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-2 fw-bold">GRN Return Details</h2>
                        <button type="button" class="btn btn-lg btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    </div>
                    <div class="modal-body py-6 px-lg-10">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">Return Number</div>
                                <div class="fw-bold fs-6" id="view_return_number">—</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">Date</div>
                                <div class="fw-bold fs-6" id="view_date">—</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">GRN Number</div>
                                <div class="fw-bold fs-6" id="view_grn_number">—</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-bold text-muted fs-7">Batch No</div>
                                <div class="fw-bold fs-6" id="view_batchno">—</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="fw-bold text-muted fs-7">Location</div>
                                <div class="fw-bold fs-6" id="view_location">—</div>
                            </div>
                            <div class="col-md-8">
                                <div class="fw-bold text-muted fs-7">Reason for Return</div>
                                <div class="fw-bold fs-6" id="view_reason">—</div>
                            </div>
                        </div>

                        <div class="table-responsive mb-4">
                            <table class="table table-bordered align-middle fs-7">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold text-uppercase gs-0">
                                        <th>Material</th>
                                        <th>Code</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">GRN Qty</th>
                                        <th class="text-center">Return Qty</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="view_lines">
                                    <tr><td colspan="6" class="text-center py-4">Loading…</td></tr>
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
        <div class="modal fade" id="mgrnr_modal_print" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-3 fw-bold">Print GRN Return</h2>
                        <button type="button" class="btn btn-sm btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    </div>
                    <div class="modal-body p-0" style="height:80vh;">
                        <iframe id="mgrnr_print_frame" src="about:blank"
                            style="border:0;width:100%;height:100%;"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="mgrnr_btn_print" class="btn btn-primary">Print</button>
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
        $('#mgrnr_hidetotal,#mgrnr_hidenettotal').val(0);
        $('#mgrnr_divtotal,#mgrnr_divnettotal').text(fmtCur(0));
    };

    /* Recalc row total  */
    const recalcRow = $row => {
        const price = parseNum($row.find('.mgrnr-unitprice').val());
        const qty   = parseNum($row.find('.mgrnr-ret-qty').val());
        const t     = (price * qty).toFixed(2);
        $row.find('.mgrnr-total').val(t);
        $row.find('.mgrnr-total-display').text(fmtCur(t));
    };

    /* Recalc totals */
    const recalcTotals = () => {
        let total = 0;
        $('#mgrnr_tableBody tr[data-material-id]').each(function () {
            total += parseNum($(this).find('.mgrnr-total').val());
        });
        $('#mgrnr_hidetotal').val(total.toFixed(2));
        $('#mgrnr_hidenettotal').val(total.toFixed(2));
        $('#mgrnr_divtotal').text(fmtCur(total));
        $('#mgrnr_divnettotal').text(fmtCur(total));
    };

    /* Build a single material row*/
    const buildRow = detail => {
        const grnQty       = parseNum(detail.grn_qty);
        const remainingQty = parseNum(detail.remaining_qty);
        const initTotal    = (0).toFixed(2);

        return `
        <tr class="align-middle" data-material-id="${detail.material_id}">
            <td class="ps-2">
                ${detail.material_name || 'N/A'}
                <small class="text-muted d-block">${detail.material_code || ''}</small>
                <input type="hidden" class="mgrnr-total" value="${initTotal}">
            </td>
            <td class="text-center">
                <input type="text"
                    class="form-control form-control-solid form-control-sm text-end mgrnr-unitprice"
                    value="${fmtNum(detail.unitprice)}" readonly>
            </td>
            <td class="text-center fw-bold">
                ${fmtNum(remainingQty)}
                <small class="text-muted d-block">of ${fmtNum(grnQty)}</small>
            </td>
            <td class="text-center">
                <input type="number"
                    class="form-control form-control-solid form-control-sm text-end mgrnr-ret-qty"
                    value="0" min="0" max="${remainingQty}" step="any" ${remainingQty <= 0 ? 'disabled' : ''}>
            </td>
            <td class="text-end pe-3 mgrnr-total-display">${fmtCur(initTotal)}</td>
        </tr>`;
    };

    /* Render GRN rows */
    const renderRows = details => {
        if (!details || !details.length) {
            $('#mgrnr_tableBody').html(
                '<tr><td colspan="5" class="text-center py-6 text-muted">No materials found for this GRN</td></tr>'
            );
            resetTotals();
            return;
        }
        $('#mgrnr_tableBody').html(details.map(buildRow).join(''));
        recalcTotals();
    };

    /* Row events */
    $(document).on('input', '.mgrnr-ret-qty', function () {
        const $row   = $(this).closest('tr');
        const max    = parseNum($(this).attr('max'));
        let   val    = parseNum($(this).val());
        if (val > max) { $(this).val(max); val = max; }
        recalcRow($row);
        recalcTotals();
    });

    /* Load GRN list */
    const loadGRNs = () => {
        const $sel = $('#mgrnr_grn');
        $sel.prop('disabled', true).html('<option value="">Loading…</option>');

        $.ajax({
            url:  "{{ route('materialgrnreturn.grn-list') }}",
            type: 'GET',
            success: grns => {
                const opts = ['<option value="">Select GRN</option>'];
                (grns || []).forEach(g => opts.push(
                    `<option value="${g.id}" data-batchno="${g.batchno}">${g.label}</option>`
                ));
                $sel.html(opts.join('')).prop('disabled', false);
                $sel.select2({
                    dropdownParent: $('#mgrnr_modal_add'),
                    placeholder: 'Search GRN…',
                    allowClear: true,
                });
            },
            error: () => {
                $sel.html('<option value="">Failed to load</option>').prop('disabled', false);
                Swal.fire('Error', 'Could not load GRN list', 'error');
            },
        });
    };

    /* GRN  */
    $('#mgrnr_grn').on('change', function () {
        const id = $(this).val();
        if (!id) {
            $('#mgrnr_location').val('');
            $('#mgrnr_location_id').val('');
            $('#mgrnr_batchno').val('');
            $('#mgrnr_tableBody').html(
                '<tr id="mgrnr_empty_row"><td colspan="5" class="text-center py-6 text-muted">Select a GRN to load materials</td></tr>'
            );
            resetTotals();
            return;
        }

        $('#mgrnr_tableBody').html('<tr><td colspan="5" class="text-center py-6">Loading materials…</td></tr>');

        $.ajax({
            url:  `{{ url('materialgrnreturn/grn') }}/${id}`,
            type: 'GET',
            success: resp => {
                $('#mgrnr_location').val(resp.grn?.location_name ?? '');
                $('#mgrnr_location_id').val(resp.grn?.location_id ?? '');
                $('#mgrnr_batchno').val(resp.grn?.batchno ?? '');
                renderRows(resp.details || []);
            },
            error: () => {
                resetTotals();
                Swal.fire('Error', 'Failed to load GRN details', 'error');
            },
        });
    });

    /* Load GRNs on ready */
    loadGRNs();

    /*Load next return number when modal opens*/
    $('#mgrnr_modal_add').on('show.bs.modal', function () {
        $('#mgrnr_number').val('Generating…');
        $.get("{{ route('materialgrnreturn.next-return-number') }}", function (resp) {
            $('#mgrnr_number').val(resp.return_number ?? '');
        });
    });

    const buildPayload = () => {
        const date   = $('#mgrnr_date').val();
        const grnId  = $('#mgrnr_grn').val();
        const reason = $('#mgrnr_reason').val().trim();

        if (!date || !grnId || !reason) {
            Swal.fire('Required', 'Please fill all required fields', 'warning');
            return null;
        }

        const details = [];
        $('#mgrnr_tableBody tr[data-material-id]').each(function () {
            const $r    = $(this);
            const matId = $r.data('material-id');
            const qty   = parseNum($r.find('.mgrnr-ret-qty').val());
            const price = parseNum($r.find('.mgrnr-unitprice').val());
            const total = parseNum($r.find('.mgrnr-total').val());
            if (!matId) return;
            details.push({ material_id: matId, qty, unitprice: price, total });
        });

        const hasQty = details.some(d => d.qty > 0);
        if (!hasQty) {
            Swal.fire('Required', 'Enter a return quantity for at least one material', 'warning');
            return null;
        }

        return {
            date,
            grn_id:   grnId,
            reason,
            total:    parseNum($('#mgrnr_hidetotal').val()),
            nettotal: parseNum($('#mgrnr_hidenettotal').val()),
            details,
        };
    };

    /* Submit */
    $('#mgrnr_btnsubmit').on('click', function () {
        const payload = buildPayload();
        if (!payload) return;

        const $btn = $(this);
        const orig = $btn.html();
        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Saving…');

        $.ajax({
            url:         "{{ route('materialgrnreturn.store') }}",
            method:      'POST',
            contentType: 'application/json',
            headers:     { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data:        JSON.stringify(payload),
            success: resp => {
                Swal.fire('Success', resp.message || 'GRN Return created', 'success');
                $('#mgrnr_modal_add').modal('hide');
                mgrnrTable.ajax.reload(null, false);
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

    /* Reset modal on close */
    $('#mgrnr_modal_add').on('hidden.bs.modal', function () {
        $('#mgrnrForm')[0].reset();
        $('#mgrnr_grn').val(null).trigger('change');
        $('#mgrnr_location').val('');
        $('#mgrnr_location_id').val('');
        $('#mgrnr_batchno').val('');
        $('#mgrnr_tableBody').html('<tr id="mgrnr_empty_row"><td colspan="5" class="text-center py-6 text-muted">Select a GRN to load materials</td></tr>');
        resetTotals();
    });

    /* View GRN Return */
    $(document).on('click', '.mgrnr-btn-view', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $('#view_lines').html('<tr><td colspan="6" class="text-center py-4">Loading…</td></tr>');
        $('#mgrnr_modal_view').modal('show');

        $.ajax({
            url:  `{{ url('materialgrnreturn') }}/${id}`,
            type: 'GET',
            success: data => {
                $('#view_return_number').text(data.return_number ?? '—');
                $('#view_date').text(data.date ?? '—');
                $('#view_grn_number').text(data.grn_number ?? '—');
                $('#view_batchno').text(data.batchno ?? '—');
                $('#view_location').text(data.location ?? '—');
                $('#view_reason').text(data.reason ?? '—');
                $('#view_total').text(fmtCur(data.total ?? 0));
                $('#view_nettotal').text(fmtCur(data.nettotal ?? 0));

                const rows = (data.details ?? []).map(d => `
                    <tr>
                        <td>${d.material_name}</td>
                        <td><span class="badge badge-light-secondary">${d.material_code}</span></td>
                        <td class="text-center">${fmtNum(d.unitprice)}</td>
                        <td class="text-center">${fmtNum(d.grn_qty)}</td>
                        <td class="text-center">${fmtNum(d.return_qty)}</td>
                        <td class="text-end">${fmtCur(d.total)}</td>
                    </tr>`).join('');

                $('#view_lines').html(rows || '<tr><td colspan="6" class="text-center">No items</td></tr>');
            },
            error: () => $('#view_lines').html('<tr><td colspan="6" class="text-center text-danger">Failed to load</td></tr>'),
        });
    });

    /* Confirm Return */
    $(document).on('click', '.mgrnr-btn-confirm', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Confirm GRN Return?',
            text:  'This will deduct all returned materials from stock. This cannot be undone.',
            icon:  'warning',
            showCancelButton:  true,
            confirmButtonText: 'Yes, confirm',
        }).then(r => {
            if (!r.isConfirmed) return;
            $.ajax({
                url:  `{{ url('materialgrnreturn') }}/${id}/confirm`,
                type: 'POST',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: resp => {
                    Swal.fire('Success', resp.message || 'Confirmed', 'success');
                    mgrnrTable.ajax.reload(null, false);
                },
                error: xhr => {
                    const errList = (xhr.responseJSON?.errors ?? []).join('\n');
                    Swal.fire('Error', xhr.responseJSON?.message + (errList ? '\n\n' + errList : '') || 'Failed', 'error');
                },
            });
        });
    });

    /* Delete Return  */
    $(document).on('click', '.mgrnr-btn-delete', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Delete this GRN Return?',
            text:  'This action cannot be undone.',
            icon:  'warning',
            showCancelButton:  true,
            confirmButtonText: 'Yes, delete',
            confirmButtonColor: '#d33',
        }).then(r => {
            if (!r.isConfirmed) return;
            $.ajax({
                url:  `{{ url('materialgrnreturn') }}/${id}`,
                type: 'POST',
                data: {
                    _token:  $('meta[name="csrf-token"]').attr('content'),
                    _method: 'DELETE',
                },
                success: resp => {
                    Swal.fire('Deleted', resp.message || 'Return deleted', 'success');
                    mgrnrTable.ajax.reload(null, false);
                },
                error: xhr => Swal.fire('Error', xhr.responseJSON?.message || 'Delete failed', 'error'),
            });
        });
    });

    /* Print / PDF */
    $(document).on('click', '.mgrnr-btn-pdf, .mgrnr-btn-print', function (e) {
        e.preventDefault();
        const src = "{{ route('materialgrnreturn.pdf', ['id' => ':id']) }}".replace(':id', $(this).data('id'));
        $('#mgrnr_print_frame').attr('src', src);
        $('#mgrnr_modal_print').modal('show');
    });

    $('#mgrnr_btn_print').on('click', function () {
        const f = document.getElementById('mgrnr_print_frame');
        if (f?.contentWindow) { f.contentWindow.focus(); f.contentWindow.print(); }
    });

    $('#mgrnr_modal_print').on('hidden.bs.modal', function () {
        $('#mgrnr_print_frame').attr('src', 'about:blank');
    });

    /* DataTable*/
    var mgrnrTable = $('#mgrnrTable').DataTable({
        processing: true,
        serverSide: true,
        order: [[0, 'desc']],
        ajax: "{{ route('materialgrnreturn.data') }}",
        columns: [
            { data: 'date', name: 'date' },
            {
                data: 'return_number', name: 'return_number',
                render: d => `<span class="badge badge-light-danger">${d}</span>`,
            },
            {
                data: 'material_grn.grn_number', name: 'materialGrn.grn_number',
                defaultContent: '<span class="text-muted">—</span>',
                render: d => d ? `<span class="badge badge-light-primary">${d}</span>` : '<span class="text-muted">—</span>',
            },
            {
                data: 'batchno', name: 'batchno',
                defaultContent: '—',
            },
            {
                data: 'location.locationname', name: 'location.locationname',
                defaultContent: '<span class="text-muted">—</span>',
                orderable: false, searchable: false,
            },
            {
                data: 'reason', name: 'reason',
                render: d => d
                    ? `<span title="${d}">${d.length > 40 ? d.substring(0,40)+'…' : d}</span>`
                    : '—',
            },
            {
                data: 'total', name: 'total',
                className: 'text-end',
                render: $.fn.dataTable.render.number(',', '.', 2),
            },
            {
                data: 'nettotal', name: 'nettotal',
                className: 'text-end',
                render: $.fn.dataTable.render.number(',', '.', 2),
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
                    const id        = row.idtbl_material_grn_return;
                    const confirmed = row.confirm_status == 1;

                    if (confirmed) {
                        return `
                        <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                    menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                            data-kt-menu="true">
                            <div class="menu-item">
                                <a class="menu-link mgrnr-btn-view" href="#" data-id="${id}">
                                    <span class="menu-icon"><i class="fa-solid fa-eye"></i></span>
                                    <span class="menu-title">View</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link mgrnr-btn-pdf" href="#" data-id="${id}">
                                    <span class="menu-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                    <span class="menu-title">PDF</span>
                                </a>
                            </div>
                        </div>`;
                    } else {
                        return `
                        <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                    menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                            data-kt-menu="true">
                            <div class="menu-item">
                                <a class="menu-link mgrnr-btn-view" href="#" data-id="${id}">
                                    <span class="menu-icon"><i class="fa-solid fa-eye"></i></span>
                                    <span class="menu-title">View</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link mgrnr-btn-confirm" href="#" data-id="${id}">
                                    <span class="menu-icon"><i class="fa-solid fa-check"></i></span>
                                    <span class="menu-title">Confirm</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link mgrnr-btn-delete text-danger" href="#" data-id="${id}">
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

    $("input[data-kt-mgrnr-filter='search']").on('keyup change', function () {
        mgrnrTable.search(this.value).draw();
    });

});
</script>
@endsection