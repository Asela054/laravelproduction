@extends('base.master')
@section('content')
<div class="d-flex flex-column flex-column-fluid">

    {{-- Toolbar --}}
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Material Stock
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Inventory</li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Material Stock</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            {{-- Main card --}}
            <div class="card">
                <div class="card-header border-0 pt-6 pb-4">
                    <div class="card-title d-flex flex-wrap gap-3 align-items-center">

                        {{-- Search --}}
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span><span class="path2"></span>
                            </i>
                            <input type="text" id="mstock_search"
                                class="form-control form-control-solid w-250px ps-13"
                                placeholder="Search Stock" />
                        </div>

                        {{-- Location filter --}}
                        <select id="mstock_location_filter"
                            class="form-select form-select-solid w-200px"
                            data-control="select2"
                            data-placeholder="All Locations"
                            data-allow-clear="true">
                            <option value="">All Locations</option>
                            @foreach ($locations as $loc)
                                <option value="{{ $loc->idtbl_locations }}">{{ $loc->locationname }}</option>
                            @endforeach
                        </select>

                        <button type="button" id="mstock_btn_filter" class="btn btn-primary btn-sm">
                            <i class="ki-duotone ki-filter fs-4 me-1">
                                <span class="path1"></span><span class="path2"></span>
                            </i>Filter
                        </button>
                        <button type="button" id="mstock_btn_reset" class="btn btn-light btn-sm">
                            <i class="ki-duotone ki-arrows-circle fs-4 me-1">
                                <span class="path1"></span><span class="path2"></span>
                            </i>Reset
                        </button>

                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="mstockTable">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Material (Code)</th>
                                    <th>Location</th>
                                    <th class="text-center">Total Quantity</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        {{--  Stock Details (Batch-wise) Modal --}}
        <div class="modal fade" id="mstock_modal_detail" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header py-4">
                        <div class="d-flex align-items-center gap-3">
                            <h2 class="modal-title fs-3 fw-bold mb-0">Stock Details</h2>
                        </div>
                        <div class="d-flex align-items-center gap-2 ms-auto me-4">
                            <span class="badge badge-light-primary fs-7 py-2 px-4" id="detail_material_badge">—</span>
                            <span class="badge badge-light-info    fs-7 py-2 px-4" id="detail_location_badge">—</span>
                        </div>
                        <button type="button" class="btn btn-lg btn-icon btn-active-light-primary"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    </div>

                    <div class="modal-body py-6 px-lg-10">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle fs-7 gy-3" id="mstockDetailTable">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold text-uppercase gs-0">
                                        <th>#</th>
                                        <th>Material (Code)</th>
                                        <th>Location</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-end">Cost Price (Unit)</th>
                                        <th class="text-end">Total Cost Value</th>
                                        <th>Batch No</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer py-3">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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

    /* Helpers  */
    const fmtNum = (v, d = 2) => {
        const n = parseFloat(String(v ?? '').replace(/,/g, ''));
        return isNaN(n) ? '0.00' : n.toLocaleString('en-US', { minimumFractionDigits: d, maximumFractionDigits: d });
    };
    const fmtCur = v => `Rs. ${fmtNum(v)}`;

    /* Location Select2  */
    $('#mstock_location_filter').select2({
        placeholder: 'All Locations',
        allowClear: true,
    });

    /* Main DataTable */
    var mstockTable = $('#mstockTable').DataTable({
        processing: true,
        serverSide: true,
        searching:  false,
        order: [[1, 'asc']],
        ajax: {
            url:  "{{ route('materialstock.data') }}",
            type: 'GET',
            data: d => { d.location_id = $('#mstock_location_filter').val(); },
        },
        columns: [
            {
                data: 'DT_RowIndex', name: 'DT_RowIndex',
                orderable: false, searchable: false, width: '50px',
            },
            {
                data: 'materialname',
                name: 'materialname',
                orderable: false,
                render: (v, t, row) =>
                    `<div class="d-flex flex-column">
                        <span class="fw-bold text-gray-800">${v ?? '—'}</span>
                        <span class="badge badge-light-secondary mt-1" style="width:fit-content">
                            ${row.materialinfocode ?? ''}
                        </span>
                    </div>`,
            },
            {
                data: 'locationname', name: 'locationname',
                orderable: false,
                render: v => `<span>${v ?? '—'}</span>`,
            },
            {
                data: 'total_qty', name: 'total_qty',
                className: 'text-center',
                orderable: false,
                render: v => `<span class="fw-bold fs-6">${fmtNum(v, 0)}</span>`,
            },
            {
                data: null,
                className: 'text-end',
                orderable: false, searchable: false,
                render: (data) => {
                    const matId    = data.tbl_material_info_idtbl_material_info;
                    const locId    = data.tbl_location_idtbl_location;
                    const matLabel = `${data.materialname ?? ''} (${data.materialinfocode ?? ''})`.replace(/'/g, "\\'");
                    const locLabel = (data.locationname ?? '').replace(/'/g, "\\'");
                    return `
                    <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                menu-gray-600 menu-state-bg-light-primary fs-7 w-175px py-4"
                        data-kt-menu="true">
                        <div class="menu-item">
                            <a class="menu-link mstock-btn-detail" href="#"
                                data-material-id="${matId}"
                                data-location-id="${locId}"
                                data-material-label="${matLabel}"
                                data-location-label="${locLabel}">
                                <span class="menu-icon"><i class="fa-solid fa-layer-group"></i></span>
                                <span class="menu-title">View Batches</span>
                            </a>
                        </div>
                    </div>`;
                },
            },
        ],
        drawCallback: () => KTMenu.createInstances(),
    });

    /* Search*/
    $('#mstock_search').on('keyup change', function () {
        mstockTable.search(this.value).draw();
    });

    /* Filter*/
    $('#mstock_btn_filter').on('click', () => mstockTable.ajax.reload());

    /* Reset */
    $('#mstock_btn_reset').on('click', function () {
        $('#mstock_search').val('');
        $('#mstock_location_filter').val(null).trigger('change');
        mstockTable.search('').ajax.reload();
    });

    /* Detail DataTable (batch-wise) */
    var detailTable = null;

    $(document).on('click', '.mstock-btn-detail', function (e) {
        e.preventDefault();

        const matId    = $(this).data('material-id');
        const locId    = $(this).data('location-id');
        const matLabel = $(this).data('material-label');
        const locLabel = $(this).data('location-label');

        $('#detail_material_badge').text(matLabel);
        $('#detail_location_badge').text(locLabel);

        if (detailTable) {
            detailTable.destroy();
            detailTable = null;
            $('#mstockDetailTable tbody').empty();
        }

        detailTable = $('#mstockDetailTable').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'asc']],
            ajax: {
                url:  "{{ route('materialstock.batch-details') }}",
                type: 'GET',
                data: { material_id: matId, location_id: locId },
            },
            columns: [
                {
                    data: 'DT_RowIndex', name: 'DT_RowIndex',
                    orderable: false, searchable: false, width: '50px',
                },
                {
                    data: 'materialname', name: 'materialname',
                    orderable: false,
                    render: (v, t, row) =>
                        `<div class="d-flex flex-column">
                            <span class="fw-bold text-gray-800">${v ?? '—'}</span>
                            <span class="badge badge-light-secondary mt-1" style="width:fit-content">
                                ${row.materialinfocode ?? ''}
                            </span>
                        </div>`,
                },
                {
                    data: 'locationname', name: 'locationname',
                    orderable: false,
                    render: v => `<span>${v ?? '—'}</span>`,
                },
                {
                    data: 'qty', name: 'qty',
                    className: 'text-center',
                    render: v => `<span class="fw-bold">${fmtNum(v, 0)}</span>`,
                },
                {
                    data: 'unitprice', name: 'unitprice',
                    className: 'text-end',
                    render: v => fmtCur(v),
                },
                {
                    data: 'total_cost_value', name: 'total_cost_value',
                    className: 'text-end',
                    orderable: false,
                    render: v => `<span class="fw-bold text-primary">${fmtCur(v)}</span>`,
                },
                {
                    data: 'batchno', name: 'batchno',
                    render: v => v
                        ? `<span class="badge badge-light-info">${v}</span>`
                        : '<span class="text-muted">—</span>',
                },
                {
                    data: 'status', name: 'status',
                    className: 'text-center',
                    orderable: false,
                    render: v => v == 1
                        ? '<span class="badge badge-light-success">Active</span>'
                        : '<span class="badge badge-light-danger">Inactive</span>',
                },
                {
                    data: null,
                    className: 'text-center',
                    orderable: false, searchable: false,
                    render: (data) => {
                        const id       = data.idtbl_material_stock;
                        const isActive = data.status == 1;
                        return `
                        <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                    menu-gray-600 menu-state-bg-light-primary fs-7 w-175px py-4"
                            data-kt-menu="true">
                            <div class="menu-item">
                                <a class="menu-link mstock-btn-toggle" href="#"
                                    data-id="${id}"
                                    data-active="${isActive ? 1 : 0}">
                                    <span class="menu-icon">
                                        <i class="fa-solid ${isActive ? 'fa-ban text-danger' : 'fa-check-circle text-success'}"></i>
                                    </span>
                                    <span class="menu-title ${isActive ? 'text-danger' : 'text-success'}">
                                        ${isActive ? 'Deactivate' : 'Activate'}
                                    </span>
                                </a>
                            </div>
                        </div>`;
                    },
                },
            ],
            drawCallback: () => KTMenu.createInstances(),
        });

        $('#mstock_modal_detail').modal('show');
    });

    /* Toggle batch status */
    $(document).on('click', '.mstock-btn-toggle', function (e) {
        e.preventDefault();
        const id       = $(this).data('id');
        const isActive = parseInt($(this).data('active'));

        Swal.fire({
            title:  `${isActive ? 'Deactivate' : 'Activate'} this batch?`,
            text:   isActive
                        ? 'This batch will be marked as inactive.'
                        : 'This batch will be marked as active.',
            icon:   'warning',
            showCancelButton:   true,
            confirmButtonText:  isActive ? 'Yes, deactivate' : 'Yes, activate',
            confirmButtonColor: isActive ? '#d33' : '#50cd89',
        }).then(r => {
            if (!r.isConfirmed) return;
            $.ajax({
                url:  `{{ url('materialstock') }}/${id}/toggle-status`,
                type: 'POST',
                data: {
                    _token:  $('meta[name="csrf-token"]').attr('content'),
                    _method: 'PATCH',
                },
                success: resp => {
                    Swal.fire('Done', resp.message || 'Status updated', 'success');
                    if (detailTable) detailTable.ajax.reload(null, false);
                    mstockTable.ajax.reload(null, false);
                },
                error: xhr => Swal.fire('Error', xhr.responseJSON?.message || 'Failed', 'error'),
            });
        });
    });

    /* Clean up on modal close  */
    $('#mstock_modal_detail').on('hidden.bs.modal', function () {
        if (detailTable) {
            detailTable.destroy();
            detailTable = null;
            $('#mstockDetailTable tbody').empty();
        }
        $('#detail_material_badge').text('—');
        $('#detail_location_badge').text('—');
    });

});
</script>
@endsection