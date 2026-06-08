@extends('base.master')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container d-flex justify-content-between align-items-center">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Production Order
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Production</li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-dark">Order</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <!-- Production Order Table -->
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span><span class="path2"></span>
                            </i>
                            <input id="searchProductionOrder" type="text"
                                class="form-control form-control-solid w-250px ps-13"
                                placeholder="Search production order" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        @if($addcheck)
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#productionorderModal">
                                <i class="fas fa-plus me-1"></i> Create Production Order
                            </button>
                        @endif
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="productionOrderTable" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Date</th>
                                    <th>Order No</th>
                                    <th>Product Code</th>
                                    <th>Quantity</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Create Production Order Modal -->
            <div class="modal fade" id="productionorderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Production Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="productionOrderForm">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Sales Order <span class="text-danger">*</span></label>
                                        <select id="salesOrderSelect" class="form-select" required>
                                            <option value="">Select sales order</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Product <span class="text-danger">*</span></label>
                                        <select id="salesOrderProductSelect" class="form-select" required>
                                            <option value="">Select product</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Order Qty</label>
                                        <input id="orderqty" type="number" min="0" step="0.01" class="form-control" readonly/>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Production Qty <span class="text-danger">*</span></label>
                                        <input id="proqty" type="number" min="0" step="0.01" class="form-control" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Balance Qty</label>
                                        <input id="balanceqty" type="text" class="form-control" readonly/>
                                    </div>
                                    <div class="col-md-6 d-none">
                                        <label class="form-label fw-bold">Unit Price</label>
                                        <input id="uprice" type="number" min="0" step="0.01" class="form-control" readonly />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Production Start Date</label>
                                        <input id="startdate" type="date" class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Production End Date</label>
                                        <input id="enddate" type="date" class="form-control" />
                                    </div>
                                </div>
                                <div class="text-end mt-5">
                                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="btnCreateOrder">
                                        <span class="btn-label">Create Production Order</span>

                                        <span class="btn-spinner d-none">
                                            <span class="spinner-border spinner-border-sm align-middle me-2"></span>
                                            Creating Production Order...
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Material Issue Modal -->
            <div class="modal fade" id="materialissuemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="materialissuemodalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                    <form id="formissuematerial">
                                        <div class="mb-2">
                                            <label class="form-label fw-bold small">Order Finish Good <span class="text-danger">*</span></label>
                                            <select class="form-select form-select-sm" name="orderfinishgood" id="orderfinishgood" required>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label fw-bold small">FG Production BOM</label>
                                            <select class="form-select form-select-sm" name="productbomlist" id="productbomlist" required>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label fw-bold small">Order Qty</label>
                                            <input type="text" name="orderqty" id="issue_orderqty" class="form-control form-control-sm" readonly>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label fw-bold small">Issue Qty</label>
                                            <input type="text" name="issueqty" id="issue_issueqty" class="form-control form-control-sm" readonly>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label fw-bold small">Balance Qty</label>
                                            <input type="text" name="balanceqty" id="issue_balanceqty" class="form-control form-control-sm">
                                        </div>
                                        <div class="text-end mt-3">
                                            <button type="button" class="btn btn-primary btn-sm" id="btnissuematerial">Check Production</button>
                                            <input type="submit" id="hideisuematerialsubmit" class="d-none">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                    <table class="table table-striped table-bordered table-sm small" id="tablebomqtyinfo">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="d-none">MaterialID</th>
                                                <th>Material</th>
                                                <th>Qty</th>
                                                <th>Batch No</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablebody"></tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-primary btn-sm" id="btnstartproduction">
                                                <i class="far fa-play-circle me-2"></i>Issue Materials
                                            </button>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <div id="alertdiv"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="hideprodcutionorder" id="hideprodcutionorder">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Batch No Modal -->
            <div class="modal fade" id="modalbatchno" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Material Issue Batch No</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formbatchno">
                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Stock Batch No</label>
                                    <select class="form-select form-select-sm" name="batchnolist[]" id="batchnolist" multiple required></select>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary btn-sm" id="btnsubmitbatch"
                                        {{ $addcheck ? '' : 'disabled' }}>Done</button>
                                    <input type="submit" id="hidesubmitbatch" class="d-none">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<input type="hidden" id="companyID" value="{{ $companyID }}" />
<input type="hidden" id="productionOrderDetailId" value="" />
@endsection

@section('scripts')
<script>
    const companyID               = $('#companyID').val();
    const productionOrderDataUrl  = '{{ route('production.order.data') }}';
    const productionOrderStoreUrl = '{{ route('production.order.store') }}';
    const salesOrdersUrl          = '{{ route('production.order.sales-orders') }}';
    const salesOrderProductsUrl   = '{{ route('production.order.sales-order-products') }}';
    const productionInfoUrl       = '{{ route('production.order.production-info') }}';
    const batchListUrl            = '{{ route('production.order.batch-list') }}';
    const productionStatusBase    = '{{ url('production/order') }}';
    const canDelete               = {{ $deletecheck }};

    let rowID = 0;

    $(document).ready(function () {

        // ── Select2 ──────────────────────────────────────────────
        $('#batchnolist').select2({ dropdownParent: $('#modalbatchno') });
        $('#batchnolist').on('select2:select', function (evt) {
            const el = evt.params.data.element;
            $(el).detach();
            $(this).append(el);
            $(this).trigger('change');
        });

        // ── DataTable ────────────────────────────────────────────
        $('#productionOrderTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: { url: productionOrderDataUrl, type: 'GET' },
            columns: [
                { data: 'prodate' },
                {
                    data: null,
                    render: function (data, type, row) {
                        return 'MFP/POD-' + row.procode;
                    }
                },
                {
                    data: null,
                    render: function (data, type, row) {
                        return row.product_name + ' - ' + row.product_code;
                    }
                },
                { data: 'qty' },
                { data: 'prostartdate' },
                { data: 'proenddate' },
                {
                    data: 'idtbl_production_orderdetail',
                    orderable: false,
                    searchable: false,
                    className: 'text-end',
                    render: function (data, type, row) {

                        let actions = `
                            <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                            </button>

                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600
                                        menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                data-kt-menu="true">
                        `;

                        actions += `
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3 btnIssueMaterial" data-id="${data}">
                                    <i class="fas fa-share-square me-2"></i>
                                    <span>Issue Materials</span>
                                </a>
                            </div>
                        `;

                        actions += `
                            <div class="menu-item px-3">
                                <a href="/production/order/${row.idtbl_production_order}/print"
                                target="_blank"
                                class="menu-link px-3">
                                    <span class="menu-icon"><i class="fas fa-print"></i></span>
                                    <span class="menu-title">Print</span>
                                </a>
                            </div>
                        `;

                        if (canDelete) {
                            actions += `
                                <div class="menu-item px-3">
                                    <a href="#"
                                    class="menu-link px-3 btntableaction"
                                    data-url="${productionStatusBase}/${data}/3/status">
                                        <span class="menu-icon"><i class="fas fa-trash-alt"></i></span>
                                        <span class="menu-title">Delete</span>
                                    </a>
                                </div>
                            `;
                        }

                        actions += `</div>`;

                        return actions;
                    }
                }
            ],
            drawCallback: function () {
                KTMenu.createInstances();
            },
            order: [[0, 'desc']]
        });

        $('#searchProductionOrder').on('keyup', function () {
            $('#productionOrderTable').DataTable().search(this.value).draw();
        });

        // ── Create Production Order Modal ─────────────────────────
        $('#productionorderModal').on('show.bs.modal', function () {
            resetCreateForm();
            loadSalesOrders();
        });

        $('#salesOrderSelect').on('change', function () {
            const orderId = $(this).val();
            resetProductFields();
            if (!orderId || orderId === 'undefined') return; // guard
            loadSalesOrderProducts(orderId);
        });

        $('#salesOrderProductSelect').on('change', function () {
            const selected    = $(this).find('option:selected');
            const orderQty    = selected.data('orderqty') || 0;
            const balanceQty  = selected.data('balanceqty') || 0;

            $('#orderqty').val(orderQty);
            $('#uprice').val(parseFloat(selected.data('price') || 0).toFixed(2));
            $('#proqty').val('');
            $('#balanceqty').val(balanceQty);
        });

        $('#productionOrderForm').on('submit', function (e) {
            e.preventDefault();
            submitCreateForm();
        });

        // ── Material Issue Modal ──────────────────────────────────
        $('#productionOrderTable tbody').on('click', '.btnIssueMaterial', function () {
            const id = $(this).data('id');
            $('#hideprodcutionorder').val(id);
            $('#materialissuemodalLabel').text('Material Issue — Order #' + id);
            loadFgList(id);
            $('#materialissuemodal').modal('show');
        });

        $('#orderfinishgood').on('change', function () {

            const productid = $(this).val();
            const productionid = $('#hideprodcutionorder').val();

            if (!productid) return;

            $.post('{{ route('production.order.qty-info') }}', {
                productid: productid,
                productionid: productionid,
                _token: '{{ csrf_token() }}'
            }, function (res) {

                if (res.detail) {
                    $('#issue_orderqty').val(res.detail.qty);
                    $('#issue_issueqty').val(res.detail.issueqty);
                    $('#issue_balanceqty').val(res.detail.balance);
                }
            });

            $.post('{{ route('production.order.bom-list') }}', {
                recordID: productid,
                productionID: productionid,
                _token: '{{ csrf_token() }}'
            }, function (res) {

                let html = '<option value="">Select</option>';

                $.each(res, function (i, item) {
                    html += `<option value="${item.idtbl_product_bom_info}">
                                ${item.title}
                            </option>`;
                });

                $('#productbomlist').empty().append(html);
            });
        });

        $('#btnissuematerial').on('click', function () {
            if (!$('#formissuematerial')[0].checkValidity()) {
                $('#hideisuematerialsubmit').trigger('click');
                return;
            }

            const orderfinishgood = $('#orderfinishgood').val();
            const productbomlist  = $('#productbomlist').val();
            const orderqty        = $('#issue_balanceqty').val();
            const productionid    = $('#hideprodcutionorder').val();

            $('#btnissuematerial').prop('disabled', true);

            $.post(productionInfoUrl, {
                productionid: productionid,
                orderfinishgood: orderfinishgood,
                productbomlist: productbomlist,
                orderqty: orderqty,
                _token: '{{ csrf_token() }}'
            }, function (res) {
                $('#tablebody').html(res.htmlview);
                if (res.stockstatus == 1) {
                    $('#btnstartproduction').prop('disabled', true);
                    $('#alertdiv').html('<div class="alert alert-danger">Some material quantity is not enough. Please check stock and try again.</div>');
                    $('#btnissuematerial').prop('disabled', false);
                } else {
                    $('#btnstartproduction').prop('disabled', false);
                    $('#btnissuematerial').prop('disabled', false);
                }
            });
        });

        $('#tablebomqtyinfo tbody').on('click', 'tr', function () {
            const row       = $(this);
            const materialID = row.find('td:eq(1)').text();
            rowID = row[0].rowIndex;

            $.post(batchListUrl, { materialID: materialID, _token: '{{ csrf_token() }}' }, function (res) {
                let html = '';
                $.each(res, function (i, item) {
                    html += `<option value="${item.batchno}">${item.batchno} - ${item.qty}${item.unitcode}</option>`;
                });
                $('#batchnolist').empty().append(html).trigger('change');
                $('#modalbatchno').modal('show');
            });
        });

        $('#btnsubmitbatch').on('click', function () {
            if (!$('#formbatchno')[0].checkValidity()) {
                $('#hidesubmitbatch').trigger('click');
                return;
            }
            $('#tablebomqtyinfo').find('tr').eq(rowID).find('td:eq(4)').text($('#batchnolist').val());
            $('#batchnolist').empty().trigger('change');
            $('#modalbatchno').modal('hide');
        });

        $('#btnstartproduction').on('click', function () {
            $('#btnstartproduction').prop('disabled', true);

            const productionorderid = $('#hideprodcutionorder').val();
            const orderfinishgood   = $('#orderfinishgood').val();
            const orderqty          = $('#issue_orderqty').val();
            const balanceqty        = $('#issue_balanceqty').val();

            let emptybatch = 0;
            let jsonObj    = [];

            $('#tablebomqtyinfo tbody tr').each(function () {
                let item = {};
                $(this).find('td').each(function (col_idx) {
                    if ($(this).text() == '') emptybatch = 1;
                    item['col_' + (col_idx + 1)] = $(this).text();
                });
                jsonObj.push(item);
            });

            if (emptybatch == 1) {
                $('#alertdiv').html('<div class="alert alert-danger">Please select material stock batch no for all items.</div>');
                $('#btnstartproduction').prop('disabled', false);
                return;
            }

            $.post('{{ route('production.order.issue-material') }}', {
                productionorderid: productionorderid,
                orderfinishgood: orderfinishgood,
                orderqty: orderqty,
                balanceqty: balanceqty,
                tableData: jsonObj,
                _token: '{{ csrf_token() }}'
            }, function (res) {
                if (res.status == 1) {
                    const action = JSON.parse(res.action);
                    Swal.fire({ icon: 'success', title: 'Success', text: action.message });
                    $('#materialissuemodal').modal('hide');
                    $('#productionOrderTable').DataTable().ajax.reload(null, false);
                } else {
                    const action = JSON.parse(res.action);
                    Swal.fire({ icon: 'error', title: 'Error', text: action.message });
                    $('#btnstartproduction').prop('disabled', false);
                }
            });
        });

        $('#materialissuemodal').on('hidden.bs.modal', function () {
            $('#tablebody').html('');
            $('#alertdiv').html('');
            $('#orderfinishgood').val('').trigger('change');
            $('#issue_orderqty, #issue_issueqty, #issue_balanceqty').val('');
        });

        $('#issue_balanceqty').on('keydown', function (e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                const qty        = parseFloat($('#issue_orderqty').val());
                const issueqty   = parseFloat($('#issue_issueqty').val());
                const balanceqty = parseFloat($(this).val());
                const maxbal     = qty - issueqty;

                if (balanceqty <= maxbal) {
                    $('#btnissuematerial').prop('disabled', false).trigger('click');
                } else {
                    Swal.fire({ text: "You can't issue this quantity because some quantity is already issued. Please check and try again." });
                }
            }
        });

        // ── Delete status action ──────────────────────────────────
        $(document).on('click', '.btntableaction', function () {
            const url = $(this).data('url');
            Swal.fire({
                title: 'Are you sure?',
                text: 'This record will be removed.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, remove it!'
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.post(url, { _token: '{{ csrf_token() }}' }, function (res) {
                        if (res.status == 1) {
                            $('#productionOrderTable').DataTable().ajax.reload(null, false);
                            Swal.fire({ icon: 'success', title: 'Removed', text: res.message });
                        } else {
                            Swal.fire({ icon: 'error', title: 'Error', text: res.message });
                        }
                    });
                }
            });
        });
    });

    // ── Helper Functions ──────────────────────────────────────────

    function resetCreateForm() {
        $('#salesOrderSelect').val('').trigger('change');
        $('#salesOrderProductSelect').html('<option value="">Select product</option>');
        $('#orderqty, #proqty, #balanceqty, #uprice, #startdate, #enddate').val('');
    }

    function resetProductFields() {
        $('#salesOrderProductSelect').html('<option value="">Select product</option>');
        $('#orderqty, #proqty, #balanceqty, #uprice').val('');
    }

    function loadSalesOrders() {
        $.ajax({
            url: salesOrdersUrl,
            method: 'GET',
            success: function (res) {
                const select = $('#salesOrderSelect');
                select.empty().append('<option value="">Select sales order</option>');
                if (res.data && res.data.length) {
                    $.each(res.data, function (i, order) {
                        select.append(`<option value="${order.idtbl_customer_order}">${order.cuspono}</option>`);
                    });
                } else {
                    select.append('<option value="" disabled>No sales orders found</option>');
                }
            },
            error: function (xhr) {
                console.error('Sales orders error:', xhr.responseText);
            }
        });
    }

    function loadSalesOrderProducts(orderId) {
        $.ajax({
            url: salesOrderProductsUrl,
            method: 'GET',
            data: { orderid: orderId },
            success: function (res) {
                const select = $('#salesOrderProductSelect');
                select.empty().append('<option value="">Select product</option>');

                if (res.data && res.data.length) {
                    $.each(res.data, function (i, item) {
                        const label = `${item.product_code || ''} — ${item.product_name || ''}`;
                        select.append(`<option value="${item.product_id}"
                            data-orderqty="${item.order_qty}"
                            data-producedqty="${item.produced_qty}"
                            data-balanceqty="${item.balance_qty}"
                            data-price="${parseFloat(item.unitprice) || 0}">${label}</option>`);
                    });
                    select.val(res.data[0].product_id).trigger('change');
                } else {
                    select.append('<option value="" disabled>No products found</option>');
                }
            },
            error: function (xhr) {
                console.error('Products error:', xhr.status, xhr.responseText);
            }
        });
    }

    function loadFgList(productionid) {
        $.post('{{ route('production.order.details') }}',
            { orderid: productionid, _token: '{{ csrf_token() }}' },
            function (res) {
                let html = '<option value="">Select</option>';
                if (res.data && res.data.length) {
                    $.each(res.data, function (i, item) {
                        html += `<option value="${item.tbl_product_idtbl_product}">${item.product_code} — ${item.product_name}</option>`;
                    });
                }
                $('#orderfinishgood').empty().append(html);
            }
        );
    }

    function submitCreateForm() {

        const orderId = $('#salesOrderSelect').val();
        const productId = $('#salesOrderProductSelect').val();
        const proqty = $('#proqty').val();
        const uprice = $('#uprice').val();
        const startdate = $('#startdate').val();
        const enddate = $('#enddate').val();

        if (!orderId || !productId || !proqty) {
            return Swal.fire({
                icon: 'warning',
                title: 'Missing Data',
                text: 'Please fill all required fields.'
            });
        }

        // ✅ SHOW SPINNER
        $('#btnCreateOrder').prop('disabled', true);
        $('#btnCreateOrder .btn-label').addClass('d-none');
        $('#btnCreateOrder .btn-spinner').removeClass('d-none');

        $.ajax({
            url: productionOrderStoreUrl,
            type: 'POST',
            data: {
                orderid: orderId,
                productlist: productId,
                proqty: proqty,
                uprice: uprice || 0,
                startdate: startdate,
                enddate: enddate,
                _token: '{{ csrf_token() }}'
            },

            success: function (res) {

                resetButton();

                if (res.status === 1) {

                    $('#productionorderModal').modal('hide');

                    $('#productionOrderTable')
                        .DataTable()
                        .ajax
                        .reload(null, false);

                    Swal.fire({
                        icon: 'success',
                        title: 'Created Successfully',
                        text: res.message
                    });

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: res.message
                    });
                }
            },

            error: function (xhr) {

                resetButton();

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: xhr.responseJSON?.message || 'Unable to create the production order.'
                });
            }
        });
    }

    function resetButton() {
        $('#btnCreateOrder').prop('disabled', false);
        $('#btnCreateOrder .btn-label').removeClass('d-none');
        $('#btnCreateOrder .btn-spinner').addClass('d-none');
    }

</script>
@endsection