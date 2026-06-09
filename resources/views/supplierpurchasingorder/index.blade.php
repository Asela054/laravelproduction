@extends('base.master')
@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Supplier Purchasing Order
                </h1>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container">

            {{-- ── Main Card ── --}}
            <div class="card">
                <div class="card-header border-0 pt-6 pb-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span><span class="path2"></span>
                            </i>
                            <input type="text" data-kt-customer-table-filter="search"
                                class="form-control form-control-solid w-250px ps-13"
                                placeholder="Search orders" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_spo_add">
                                Create Supplier PO
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="spoTable">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Date</th>
                                    <th>Request By</th>
                                    <th>Supplier</th>
                                    <th>Net Total</th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        {{-- ════════════════════════════════════════════════════════════════
             Create / Edit Modal
        ════════════════════════════════════════════════════════════════ --}}
        <div class="modal fade" id="kt_modal_spo_add" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-900px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-2 fw-bold" id="spo_modal_title">Create Supplier PO</h2>
                        {{-- FIX 1: Added path1/path2 spans so the ki-duotone icon renders correctly --}}
                        <button type="button" class="btn btn-lg btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span><span class="path2"></span>
                            </i>
                        </button>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <form id="spoForm" autocomplete="off">
                            <input type="hidden" id="spo_mode"    value="create">
                            <input type="hidden" id="spo_edit_id" value="">

                            <div class="row mb-6">
                                <div class="col-md-4">
                                    <label class="form-label required">Order Date</label>
                                    <input type="date" id="spo_orderdate" name="orderdate"
                                        class="form-control form-control-solid" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">Supplier</label>
                                    <select id="spo_supplier" class="form-select"
                                        data-control="select2" data-placeholder="Select Supplier…">
                                        <option value="">Select Supplier</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">Add Material</label>
                                    <select id="spo_material" class="form-select"
                                        data-control="select2" data-placeholder="Search material…">
                                        <option value="">Select Material</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Order lines table --}}
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle table-row-dashed fs-7 gy-3">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold text-uppercase gs-0">
                                            <th>Material</th>
                                            <th class="text-center" style="width:110pt">Unit Price</th>
                                            <th class="text-center" style="width:90pt">Qty</th>
                                            <th class="text-end"    style="width:110pt">Total</th>
                                            <th class="text-center" style="width:50pt">Del</th>
                                        </tr>
                                    </thead>
                                    <tbody id="spo_tableBody"></tbody>
                                </table>
                            </div>

                            {{-- Totals --}}
                            <div class="row mb-2 mt-3">
                                <div class="col-7 text-end"><span class="fw-bold fs-5">Total</span></div>
                                <div class="col-1 text-end"><span class="fw-bold fs-5">:</span></div>
                                <div class="col-4 text-end">
                                    <span class="fw-bold fs-5" id="spo_divtotal">Rs. 0.00</span>
                                    <input type="hidden" id="spo_hidetotal" value="0">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-7 text-end"><span class="fw-bold fs-5">VAT %</span></div>
                                <div class="col-1 text-end"><span class="fw-bold fs-5">:</span></div>
                                <div class="col-4 text-end">
                                    <input type="hidden" id="spo_hidevatper"    value="0">
                                    <input type="hidden" id="spo_hidevatamount" value="0">
                                    <span class="fw-bold fs-5" id="spo_divvat">Rs. 0.00</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-7 text-end"><span class="fw-bold fs-5">Net Total</span></div>
                                <div class="col-1 text-end"><span class="fw-bold fs-5">:</span></div>
                                <div class="col-4 text-end">
                                    <span class="fw-bold fs-5" id="spo_divnettotal">Rs. 0.00</span>
                                    <input type="hidden" id="spo_hidenettotal" value="0">
                                </div>
                            </div>
                            <hr>
                            <div class="mb-5">
                                <label class="form-label">Remark</label>
                                <textarea id="spo_remark" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" id="spo_btnsubmit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Create Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- ════════════════════════════════════════════════════════════════
             View Modal
        ════════════════════════════════════════════════════════════════ --}}
        <div class="modal fade" id="kt_modal_spo_view" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-3 fw-bold">Supplier PO Details</h2>
                        <button type="button" class="btn btn-sm btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body py-6 px-6">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="fw-bold">Order Date:</div>
                                <div id="spo_view_orderdate" class="text-gray-700">-</div>
                            </div>
                            <div class="col-md-6">
                                <div class="fw-bold">Supplier:</div>
                                <div id="spo_view_supplier" class="text-gray-700">-</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="fw-bold">Total:</div>
                                <div id="spo_view_total" class="text-gray-700">-</div>
                            </div>
                            <div class="col-md-6">
                                <div class="fw-bold">Net Total:</div>
                                <div id="spo_view_nettotal" class="text-gray-700">-</div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="fw-bold">Remark:</div>
                            <div id="spo_view_remark" class="text-gray-700">-</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle fs-7">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold text-uppercase gs-0">
                                        <th>Material</th>
                                        <th>Code</th>
                                        <th class="text-end">Unit Price</th>
                                        <th class="text-end">Qty</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="spo_view_lines">
                                    <tr><td colspan="5" class="text-center py-4">No items</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ════════════════════════════════════════════════════════════════
             Print Modal
        ════════════════════════════════════════════════════════════════ --}}
        <div class="modal fade" id="kt_modal_spo_print" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-3 fw-bold">Print Supplier PO</h2>
                        <button type="button" class="btn btn-sm btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body p-0" style="height:80vh;">
                        <iframe id="spo_print_frame" src="about:blank"
                            style="border:0;width:100%;height:100%;"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="spo_btn_print" class="btn btn-primary">Print</button>
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

    /* ────────────────────────────────────────────────────────────────────
       Helpers
    ──────────────────────────────────────────────────────────────────── */
    const parseNum = (v) => {
        const n = parseFloat(String(v ?? '').replace(/,/g, ''));
        return isNaN(n) ? 0 : n;
    };
    const fmtNum = (v, d = 2) =>
        parseNum(v).toLocaleString('en-US', { minimumFractionDigits: d, maximumFractionDigits: d });
    const fmtCur = (v) => `Rs. ${fmtNum(v)}`;

    const resetTotals = () => {
        $('#spo_hidetotal, #spo_hidevatamount, #spo_hidenettotal').val(0);
        $('#spo_divtotal, #spo_divvat, #spo_divnettotal').text(fmtCur(0));
    };

    const recalcRow = ($row) => {
        const price = parseNum($row.find('.spo-unitprice').val());
        const qty   = parseNum($row.find('.spo-qty').val());
        const t     = (price * qty).toFixed(2);
        $row.find('.spo-total').val(t);
    };

    const recalcTotals = () => {
        let total = 0;
        $('#spo_tableBody tr').each(function () {
            total += parseNum($(this).find('.spo-total').val());
        });
        const vatRate  = parseNum($('#spo_hidevatper').val());
        const vatAmt   = total * (vatRate / 100);
        const netTotal = total + vatAmt;

        $('#spo_hidetotal').val(total.toFixed(2));
        $('#spo_hidevatamount').val(vatAmt.toFixed(2));
        $('#spo_hidenettotal').val(netTotal.toFixed(2));
        $('#spo_divtotal').text(fmtCur(total));
        $('#spo_divvat').text(fmtCur(vatAmt));
        $('#spo_divnettotal').text(fmtCur(netTotal));
    };

    /* ────────────────────────────────────────────────────────────────────
       Materials map  { id => { id, materialname, materialcode, unitprice } }
    ──────────────────────────────────────────────────────────────────── */
    const materialsMap = {};

    /* ────────────────────────────────────────────────────────────────────
       Select2 initialisation
    ──────────────────────────────────────────────────────────────────── */
    const initSelect2 = () => {
        const $parent = $('#kt_modal_spo_add');
        $('#spo_supplier, #spo_material').each(function () {
            if (!$(this).hasClass('select2-hidden-accessible')) {
                $(this).select2({ dropdownParent: $parent, width: '100%', allowClear: true });
            }
        });
    };

    /* ────────────────────────────────────────────────────────────────────
       Load suppliers
    ──────────────────────────────────────────────────────────────────── */
    function loadSuppliers() {
        return $.ajax({
            url:  "{{ route('supplierpurchaseorders.getsuppliersdetails') }}",
            type: 'GET',
            success: function (data) {
                const opts = ['<option value="">Select Supplier</option>'];
                (data || []).forEach(s => {
                    if (s.idtbl_supplier) {
                        opts.push(`<option value="${s.idtbl_supplier}">${s.suppliername}</option>`);
                    }
                });
                $('#spo_supplier').html(opts.join(''));
            },
            error: function (xhr) {
                console.error('Supplier load failed', xhr.responseText);
            }
        });
    }

    /* ────────────────────────────────────────────────────────────────────
       Load materials  (unitperctn → used as unit price)
    ──────────────────────────────────────────────────────────────────── */
    function loadMaterials() {
        return $.ajax({
            url:  "{{ route('supplierpurchaseorders.getmaterialsdetails') }}",
            type: 'GET',
            success: function (data) {
                const opts = ['<option value="">Select Material</option>'];
                Object.keys(materialsMap).forEach(k => delete materialsMap[k]);
                (data || []).forEach(m => {
                    const mid = m.idtbl_material_info;
                    if (!mid) return;
                    materialsMap[mid] = {
                        id:           mid,
                        materialname: m.materialname,
                        materialcode: m.materialinfocode,
                        unitprice:    m.unitperctn ?? 0,
                    };
                    opts.push(`<option value="${mid}">${m.materialname} (${m.materialinfocode})</option>`);
                });
                $('#spo_material').html(opts.join(''));
            },
            error: function (xhr) {
                console.error('Material load failed', xhr.responseText);
            }
        });
    }

    /* ────────────────────────────────────────────────────────────────────
       Add material row to table
    ──────────────────────────────────────────────────────────────────── */
    function buildRow(mid, mname, mcode, unitprice, qty) {
        return `
        <tr class="align-middle" data-material-id="${mid}">
            <td class="ps-2">
                ${mname}
                <small class="text-muted d-block">${mcode}</small>
            </td>
            <td class="text-center">
                <input type="text"
                    class="form-control form-control-solid form-control-sm text-end spo-unitprice"
                    value="${fmtNum(unitprice)}">
            </td>
            <td class="text-center">
                <input type="number"
                    class="form-control form-control-solid form-control-sm text-end spo-qty"
                    value="${qty}" min="1" step="1">
            </td>
            <td class="text-end pe-3">
                <input type="number"
                    class="form-control form-control-solid form-control-sm spo-total"
                    value="0" readonly>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-icon btn-light-danger spo-del-row">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </td>
        </tr>`;
    }

    function addMaterialToTable(m) {
        if ($(`#spo_tableBody tr[data-material-id="${m.id}"]`).length > 0) {
            Swal.fire('Info', 'Material already in the list.', 'info');
            return;
        }
        $('#spo_tableBody').append(buildRow(m.id, m.materialname, m.materialcode, m.unitprice, 1));
        recalcRow($(`#spo_tableBody tr[data-material-id="${m.id}"]`));
        recalcTotals();
    }

    function addExistingRow(detail) {
        const mid   = detail.material_id ?? (detail.material?.idtbl_material_info);
        const mname = detail.material?.materialname ?? '-';
        const mcode = detail.material?.materialinfocode ?? '';
        const unit  = detail.unitprice ?? 0;
        const qty   = detail.qty ?? 1;
        if (!mid) return;
        $('#spo_tableBody').append(buildRow(mid, mname, mcode, unit, qty));
        recalcRow($(`#spo_tableBody tr[data-material-id="${mid}"]`));
    }

    /* ────────────────────────────────────────────────────────────────────
       Material select → add row
    ──────────────────────────────────────────────────────────────────── */
    $('#spo_material').on('change', function () {
        const mid = $(this).val();
        if (!mid) return;
        const m = materialsMap[mid];
        if (!m) { Swal.fire('Error', 'Material not found.', 'error'); return; }
        addMaterialToTable(m);
        $(this).val('').trigger('change');
    });

    /* ────────────────────────────────────────────────────────────────────
       Row events
    ──────────────────────────────────────────────────────────────────── */
    $(document).on('input', '.spo-unitprice, .spo-qty', function () {
        recalcRow($(this).closest('tr'));
        recalcTotals();
    });
    $(document).on('blur', '.spo-unitprice', function () {
        $(this).val(fmtNum($(this).val()));
    });
    $(document).on('click', '.spo-del-row', function () {
        $(this).closest('tr').remove();
        recalcTotals();
    });

    /* ────────────────────────────────────────────────────────────────────
       Modal mode helpers
    ──────────────────────────────────────────────────────────────────── */
    const setCreateMode = () => {
        $('#spo_mode').val('create');
        $('#spo_edit_id').val('');
        $('#spo_supplier').prop('disabled', false);
        $('#spo_modal_title').text('Create Supplier PO');
        $('#spo_btnsubmit').html('<i class="fas fa-save me-2"></i>Create Order');
    };
    const setEditMode = (id) => {
        $('#spo_mode').val('edit');
        $('#spo_edit_id').val(id);
        $('#spo_supplier').prop('disabled', true);
        $('#spo_modal_title').text('Edit Supplier PO');
        $('#spo_btnsubmit').html('<i class="fas fa-save me-2"></i>Update Order');
    };

    const populateForEdit = (data) => {
        $('#spo_orderdate').val(data.orderdate ?? '');
        $('#spo_remark').val(data.remark ?? '');
        $('#spo_hidetotal').val(parseNum(data.total ?? 0));
        $('#spo_hidevatamount').val(parseNum(data.vatamount ?? 0));
        $('#spo_hidenettotal').val(parseNum(data.nettotal ?? 0));
        $('#spo_hidevatper').val(parseNum(data.vatper ?? 0));
        $('#spo_divtotal').text(fmtCur(data.total ?? 0));
        $('#spo_divvat').text(fmtCur(data.vatamount ?? 0));
        $('#spo_divnettotal').text(fmtCur(data.nettotal ?? 0));
        $('#spo_tableBody').empty();
        (data.details ?? []).forEach(addExistingRow);
        recalcTotals();
        if (data.supplierId) $('#spo_supplier').val(data.supplierId).trigger('change');
    };

    /* ────────────────────────────────────────────────────────────────────
       FIX 2 & 3: Load suppliers & materials ONCE at page ready.
       Select2 is also initialised here so it is ready before any modal opens,
       avoiding the Bootstrap backdrop timing error.
    ──────────────────────────────────────────────────────────────────── */
    $.when(loadSuppliers(), loadMaterials()).done(function () {
        initSelect2();
    });

    /* ────────────────────────────────────────────────────────────────────
       Modal lifecycle
    ──────────────────────────────────────────────────────────────────── */
    $('[data-bs-target="#kt_modal_spo_add"]').on('click', setCreateMode);

    // FIX 2: Use 'show.bs.modal' (fires before animation) instead of
    // 'shown.bs.modal' to avoid the backdrop timing conflict.
    $('#kt_modal_spo_add').on('show.bs.modal', function () {
        // Set today's date only when opening in create mode and field is empty
        if ($('#spo_mode').val() === 'create' && !$('#spo_orderdate').val()) {
            $('#spo_orderdate').val(new Date().toISOString().split('T')[0]);
        }
    });

    $('#kt_modal_spo_add').on('hidden.bs.modal', function () {
        setCreateMode();
        $('#spoForm')[0].reset();
        $('#spo_tableBody').empty();
        resetTotals();
        $('#spo_supplier, #spo_material').val(null).trigger('change');
    });

    /* ────────────────────────────────────────────────────────────────────
       Collect order details from table rows
    ──────────────────────────────────────────────────────────────────── */
    const collectDetails = () => {
        const details = [];
        $('#spo_tableBody tr').each(function () {
            const $r  = $(this);
            const mid = $r.data('material-id');
            const qty = parseNum($r.find('.spo-qty').val());
            if (!mid || qty <= 0) return;
            details.push({
                materialId: mid,
                unitPrice:  parseNum($r.find('.spo-unitprice').val()),
                newQty:     qty,
            });
        });
        return details;
    };

    /* ────────────────────────────────────────────────────────────────────
       Submit (create / update)
    ──────────────────────────────────────────────────────────────────── */
    $('#spo_btnsubmit').on('click', function () {
        const isEdit       = $('#spo_mode').val() === 'edit';
        const editId       = $('#spo_edit_id').val();
        const orderDate    = $('#spo_orderdate').val();
        const supplierId   = $('#spo_supplier').val();
        const orderDetails = collectDetails();

        if (isEdit && !editId)         { Swal.fire('Error',    'Missing order id.',                            'error');   return; }
        if (!orderDate)                { Swal.fire('Required', 'Order date is required.',                       'warning'); return; }
        if (!supplierId && !isEdit)    { Swal.fire('Required', 'Please select a supplier.',                    'warning'); return; }
        if (orderDetails.length === 0) { Swal.fire('Required', 'Add at least one material before submitting.', 'warning'); return; }

        const payload = {
            _token:       $('meta[name="csrf-token"]').attr('content'),
            orderdate:    orderDate,
            remark:       $('#spo_remark').val(),
            total:        parseNum($('#spo_hidetotal').val()),
            nettotal:     parseNum($('#spo_hidenettotal').val()),
            vatper:       parseNum($('#spo_hidevatper').val()),
            vatamount:    parseNum($('#spo_hidevatamount').val()),
            supplierId:   supplierId,
            orderDetails: orderDetails,
        };
        if (isEdit) payload._method = 'PUT';

        const $btn = $(this);
        const orig = $btn.html();
        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Saving...');

        const url = isEdit
            ? "{{ route('supplierpurchaseorders.update', ['id' => ':id']) }}".replace(':id', editId)
            : "{{ route('supplierpurchaseorders.store') }}";

        $.ajax({
            url, method: 'POST', data: payload,
            success: function () {
                Swal.fire('Success', isEdit ? 'Order updated.' : 'Order created.', 'success');
                $('#kt_modal_spo_add').modal('hide');
                if (spoTable) spoTable.ajax.reload(null, false);
            },
            error: function (xhr) {
                let msg = isEdit ? 'Failed to update order.' : 'Failed to create order.';
                if (xhr.responseJSON?.message) msg = xhr.responseJSON.message;
                if (xhr.responseJSON?.errors)  msg += '<br>' + Object.values(xhr.responseJSON.errors).flat().join('<br>');
                Swal.fire({ title: 'Error', html: msg, icon: 'error' });
            },
            complete: () => $btn.prop('disabled', false).html(orig),
        });
    });

    /* ────────────────────────────────────────────────────────────────────
       View PO
    ──────────────────────────────────────────────────────────────────── */
    const renderView = (data) => {
        $('#spo_view_orderdate').text(data.orderdate ?? '-');
        $('#spo_view_supplier').text(data.supplier ?? '-');
        $('#spo_view_total').text(fmtCur(data.total ?? 0));
        $('#spo_view_nettotal').text(fmtCur(data.nettotal ?? 0));
        $('#spo_view_remark').text(data.remark ?? '-');

        const rows = (data.details ?? []).map(item => `
            <tr>
                <td>${item.material?.materialname ?? '-'}</td>
                <td>${item.material?.materialinfocode ?? '-'}</td>
                <td class="text-end">${fmtNum(item.unitprice ?? 0)}</td>
                <td class="text-end">${fmtNum(item.qty ?? 0)}</td>
                <td class="text-end">${fmtNum(item.total ?? 0)}</td>
            </tr>`).join('');

        $('#spo_view_lines').html(rows || '<tr><td colspan="5" class="text-center py-4">No items</td></tr>');
    };

    $(document).on('click', '.spo-btn-view', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $('#spo_view_lines').html('<tr><td colspan="5" class="text-center py-4">Loading…</td></tr>');
        $('#kt_modal_spo_view').modal('show');
        $.ajax({
            url:     "{{ route('supplierpurchaseorders.show', ['id' => ':id']) }}".replace(':id', id),
            type:    'GET',
            success: (resp) => renderView(resp ?? {}),
            error:   ()     => $('#spo_view_lines').html('<tr><td colspan="5" class="text-center text-danger py-4">Failed to load</td></tr>'),
        });
    });

    /* ────────────────────────────────────────────────────────────────────
       Edit PO
       FIX 4: Removed redundant loadSuppliers() + loadMaterials() calls here.
       Data is already loaded at page ready — only fetch the order record.
    ──────────────────────────────────────────────────────────────────── */
    $(document).on('click', '.spo-btn-edit', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        setEditMode(id);
        $('#spo_tableBody').empty();
        $('#kt_modal_spo_add').modal('show');

        $.ajax({
            url:     "{{ route('supplierpurchaseorders.show', ['id' => ':id']) }}".replace(':id', id),
            type:    'GET',
            success: (resp) => populateForEdit(resp ?? {}),
            error:   ()     => {
                Swal.fire('Error', 'Failed to load order.', 'error');
                $('#kt_modal_spo_add').modal('hide');
                setCreateMode();
            },
        });
    });

    /* ────────────────────────────────────────────────────────────────────
       Print PO
    ──────────────────────────────────────────────────────────────────── */
    $(document).on('click', '.spo-btn-print', function (e) {
        e.preventDefault();
        const src = "{{ route('supplierpurchaseorders.pdf', ['id' => ':id']) }}".replace(':id', $(this).data('id'));
        $('#spo_print_frame').attr('src', src);
        $('#kt_modal_spo_print').modal('show');
    });
    $('#spo_btn_print').on('click', function () {
        const f = document.getElementById('spo_print_frame');
        if (f?.contentWindow) { f.contentWindow.focus(); f.contentWindow.print(); }
    });

    /* ────────────────────────────────────────────────────────────────────
       Status update (confirm / delete)
    ──────────────────────────────────────────────────────────────────── */
    function updateStatus(id, status, text) {
        Swal.fire({ title: 'Are you sure?', text, icon: 'warning', showCancelButton: true, confirmButtonText: 'Yes' })
        .then(r => {
            if (!r.isConfirmed) return;
            $.ajax({
                url:  "{{ route('supplierpurchaseorders.status', ['id' => ':id']) }}".replace(':id', id),
                type: 'POST',
                data: { status, _token: $('meta[name="csrf-token"]').attr('content') },
                success: (resp) => { Swal.fire('Success', resp.message, 'success'); spoTable.ajax.reload(null, false); },
                error:   (xhr)  => { console.error(xhr.responseText); Swal.fire('Error', 'Action failed.', 'error'); },
            });
        });
    }

    $(document).on('click', '.spo-btn-confirm', (e) => { e.preventDefault(); updateStatus($(e.currentTarget).data('id'), 1, 'Confirm this supplier purchase order?'); });
    $(document).on('click', '.spo-btn-delete',  (e) => { e.preventDefault(); updateStatus($(e.currentTarget).data('id'), 3, 'Delete this supplier purchase order?'); });

    /* ────────────────────────────────────────────────────────────────────
       DataTable
    ──────────────────────────────────────────────────────────────────── */
    var spoTable = $('#spoTable').DataTable({
        processing: true,
        serverSide: true,
        order: [[0, 'desc']],
        ajax: "{{ route('supplierpurchaseorders.data') }}",
        columns: [
            { data: 'orderdate',              name: 'orderdate' },
            { data: 'users.name',             name: 'users.name' },
            { data: 'suppliers.suppliername', name: 'suppliers.suppliername' },
            { data: 'nettotal',               name: 'nettotal',
              render: $.fn.dataTable.render.number(',', '.', 2) },
            {
                data: 'confirmstatus', name: 'confirmstatus',
                orderable: false, searchable: false,
                render: (d) => d == 1
                    ? '<div class="badge badge-light-success">Confirmed</div>'
                    : '<div class="badge badge-light-danger">Pending</div>',
            },
            {
                data: null, className: 'text-end',
                orderable: false, searchable: false,
                render: (data, type, row) => {
                    const id        = row.idtbl_supplier_porder ?? row.id;
                    const confirmed = row.confirmstatus == 1;
                    return `
                    <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                        data-kt-menu="true">
                        <div class="menu-item">
                            <a class="menu-link spo-btn-view" href="#" data-id="${id}">
                                <span class="menu-icon"><i class="fa-solid fa-eye"></i></span>
                                <span class="menu-title">View</span>
                            </a>
                        </div>
                        ${confirmed ? `
                        <div class="menu-item">
                            <a class="menu-link spo-btn-print" href="#" data-id="${id}">
                                <span class="menu-icon"><i class="fa-solid fa-print"></i></span>
                                <span class="menu-title">Print</span>
                            </a>
                        </div>` : ''}
                        ${!confirmed ? `
                        <div class="menu-item">
                            <a class="menu-link spo-btn-edit" href="#" data-id="${id}">
                                <span class="menu-icon"><i class="fa-solid fa-pen"></i></span>
                                <span class="menu-title">Edit</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link spo-btn-confirm" href="#" data-id="${id}">
                                <span class="menu-icon"><i class="fa-solid fa-check"></i></span>
                                <span class="menu-title">Confirm</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link spo-btn-delete" href="#" data-id="${id}">
                                <span class="menu-icon"><i class="fa-solid fa-trash-can"></i></span>
                                <span class="menu-title">Delete</span>
                            </a>
                        </div>` : ''}
                    </div>`;
                },
            },
        ],
        drawCallback: () => KTMenu.createInstances(),
    });

    $("input[data-kt-customer-table-filter='search']").on('keyup change', function () {
        spoTable.search(this.value).draw();
    });

});
</script>
@endsection