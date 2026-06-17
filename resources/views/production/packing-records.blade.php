@extends('base.master')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    {{-- Toolbar --}}
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">Production Packing</h1>
                <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Production</li>
                    <li class="breadcrumb-item text-muted">Production Packing</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <input type="text"
                               data-kt-table-filter="search"
                               class="form-control form-control-solid w-250px"
                               placeholder="Search">
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                               id="productionorderTable">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Packing Order No.</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- ══════════════════════════════════════
     MODAL: Daily Complete Entry
══════════════════════════════════════ --}}
<div class="modal fade" id="dailycompletemodal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-bold">Daily Complete Information</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="alertmsg"></div>

                <form id="formdailycomplete" method="POST"
                      action="{{ route('productionpacking.complete') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label required">Date</label>
                        <input type="date" class="form-control" name="comdate" id="comdate" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Manufacture Date</label>
                        <input type="date" class="form-control" name="commfdate" id="commfdate" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Expire Date</label>
                        <input type="date" class="form-control" name="comexpdate" id="comexpdate" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Complete Qty</label>
                        <input type="text" class="form-control" name="comqty" id="comqty" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Damage Qty</label>
                        <input type="text" class="form-control" name="damageqty" id="damageqty">
                    </div>

                    <input type="hidden" name="hideproorderdetailid" id="hideproorderdetailid">

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-light me-2"
                                data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btncomsubmit">
                            <span id="btncomsubmit-text">
                                Complete Qty
                            </span>
                            <span id="btncomsubmit-spinner" class="d-none">
                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                Processing...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════
     MODAL: Daily Complete Approve List
══════════════════════════════════════ --}}
<div class="modal fade" id="dailycompleteviewmodal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-bold">Daily Complete Approve</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle fs-6" id="tabledailyapprove">
                        <thead>
                            <tr class="fw-bold text-gray-600">
                                <th>#</th>
                                <th>Batch No</th>
                                <th>Date</th>
                                <th>MF Date</th>
                                <th>EXP Date</th>
                                <th>Qty</th>
                                <th>Damage Qty</th>
                                <th>Status</th>
                                <th>Person</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="dailyapproveBody"></tbody>
                    </table>
                </div>
                <input type="hidden" id="hideviewproorderdetailid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

    @if(session('success'))
    Swal.fire({ icon: 'success', title: 'Success', text: '{{ session('success') }}' });
    @endif

    @if(session('error'))
    Swal.fire({ icon: 'error', title: 'Error', text: '{{ session('error') }}' });
    @endif

    $(document).ready(function () {

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        /* ── DataTable ── */
        let table = $('#productionorderTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('productionpacking.data') }}",

            dom:
                "<'row mb-3'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row mt-3'<'col-sm-5'i><'col-sm-7'p>>",

            buttons: [
                {
                    extend: 'print',
                    text: `<span class="d-inline-flex align-items-center">
                               <i class="ki-duotone ki-exit-up fs-2 me-2">
                                   <span class="path1"></span><span class="path2"></span>
                               </i>Print</span>`,
                    className: 'btn btn-light-primary me-3'
                },
                {
                    extend: 'csv',
                    text: `<span class="d-inline-flex align-items-center">
                               <i class="ki-duotone ki-exit-up fs-2 me-2">
                                   <span class="path1"></span><span class="path2"></span>
                               </i>CSV</span>`,
                    className: 'btn btn-light-primary me-3'
                }
            ],

            columns: [
                { data: 'DT_RowIndex',  name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'prodate',      name: 'prodate' },
                {
                    data: 'procode',
                    render: function (data) {
                        return 'MFP/PKO-' + data;
                    }
                },
                { data: 'product_name', name: 'product_name' },
                { data: 'qty',          name: 'qty' },
                { data: 'prostartdate', name: 'prostartdate' },
                { data: 'proenddate',   name: 'proenddate' },
                {
                    data: null,
                    className: 'text-end',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        return `
                            <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                    data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                        menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7
                                        w-175px py-4"
                                 data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 btndailycomplete"
                                       data-id="${row.idtbl_production_orderdetail}">
                                        <span class="menu-icon">
                                            <i class="fa-regular fa-calendar-check"></i>
                                        </span>
                                        <span class="menu-title">Daily Complete</span>
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 btndailycompleteview"
                                       data-id="${row.idtbl_production_orderdetail}">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
                                        <span class="menu-title">View & Approve</span>
                                    </a>
                                </div>
                            </div>`;
                    }
                }
            ],

            drawCallback: () => KTMenu.createInstances()
        });

        $("input[data-kt-table-filter='search']").on('keyup', function () {
            table.search(this.value).draw();
        });

        /* ── Open Daily Complete modal ── */
        $(document).on('click', '.btndailycomplete', function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            $('#hideproorderdetailid').val(id);
            $('#alertmsg').html('');
            $('#formdailycomplete')[0].reset();
            $('#dailycompletemodal').modal('show');
        });

        /* ── Submit Daily Complete (check qty first) ── */
        $('#btncomsubmit').on('click', function () {
            const id        = $('#hideproorderdetailid').val();
            const comqty    = $('#comqty').val();
            const damageqty = $('#damageqty').val();

            // Show spinner
            $('#btncomsubmit').prop('disabled', true);
            $('#btncomsubmit-text').addClass('d-none');
            $('#btncomsubmit-spinner').removeClass('d-none');

            $.post("{{ route('productionpacking.checkqty') }}", {
                recordID:  id,
                comqty:    comqty,
                damageqty: damageqty
            })
            .done(function (res) {
                if (res.valid) {
                    $('#formdailycomplete').submit();
                } else {
                    // Reset spinner on validation failure
                    $('#btncomsubmit').prop('disabled', false);
                    $('#btncomsubmit-text').removeClass('d-none');
                    $('#btncomsubmit-spinner').addClass('d-none');

                    $('#alertmsg').html(`
                        <div class="alert alert-danger">
                            You entered a total qty that exceeded the total production qty.
                            Please check and enter again.
                        </div>`);
                }
            })
            .fail(function () {
                // Reset spinner on request failure
                $('#btncomsubmit').prop('disabled', false);
                $('#btncomsubmit-text').removeClass('d-none');
                $('#btncomsubmit-spinner').addClass('d-none');

                $('#alertmsg').html('<div class="alert alert-danger">Request failed. Please try again.</div>');
            });
        });

        /* ── Reload after daily complete modal closes ── */
        $('#dailycompletemodal').on('hidden.bs.modal', function () {
            table.ajax.reload(null, false);
        });

        /* ── Open View & Approve modal ── */
        $(document).on('click', '.btndailycompleteview', function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            $('#hideviewproorderdetailid').val(id);
            loadDailyApproveList(id);
        });

        /* ── Approve a daily complete record ── */
        $(document).on('click', '.btndailycompleteapprove', function () {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Approve this record?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#50cd89',
                confirmButtonText: 'Yes, approve it'
            }).then(result => {
                if (!result.isConfirmed) return;

                $.post("{{ route('productionpacking.approve') }}", { recordID: id })
                    .done(function (res) {
                        if (res.status == 1) {
                            Swal.fire('Approved!', res.message, 'success');
                            loadDailyApproveList($('#hideviewproorderdetailid').val());
                        } else {
                            Swal.fire('Error', res.message, 'error');
                        }
                    })
                    .fail(function () {
                        Swal.fire('Error', 'Request failed', 'error');
                    });
            });
        });

        /* ── Reject a daily complete record ── */
        $(document).on('click', '.btndailycompletereject', function () {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Reject this record?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f1416c',
                confirmButtonText: 'Yes, reject it'
            }).then(result => {
                if (!result.isConfirmed) return;

                $.post("{{ route('productionpacking.reject') }}", { recordID: id })
                    .done(function (res) {
                        if (res.status == 1) {
                            Swal.fire('Rejected!', res.message, 'success');
                            loadDailyApproveList($('#hideviewproorderdetailid').val());
                        } else {
                            Swal.fire('Error', res.message, 'error');
                        }
                    })
                    .fail(function () {
                        Swal.fire('Error', 'Request failed', 'error');
                    });
            });
        });

    });

    /* ── Load daily approve list into modal ── */
    function loadDailyApproveList(id) {
        $('#dailyapproveBody').html(
            '<tr><td colspan="10" class="text-center py-5"><span class="spinner-border spinner-border-sm me-2"></span>Loading...</td></tr>'
        );
        $('#dailycompleteviewmodal').modal('show');

        $.post("{{ route('productionpacking.dailycomplete') }}", { recordID: id })
            .done(function (rows) {
                if (!rows.length) {
                    $('#dailyapproveBody').html(
                        '<tr><td colspan="10" class="text-center text-muted py-5">No records found</td></tr>'
                    );
                    return;
                }

                let html = '';
                rows.forEach((r, i) => {

                    // ── Row highlight ──
                    let rowClass = '';
                    if (r.checkstatus == 1) rowClass = 'table-success';
                    if (r.checkstatus == 3) rowClass = 'table-danger';

                    // ── Status badge ──
                    let statusBadge = '';
                    if (r.checkstatus == 1) {
                        statusBadge = '<span class="badge badge-light-success"><i class="fa-solid fa-circle-check me-1"></i>Approved</span>';
                    } else if (r.checkstatus == 3) {
                        statusBadge = '<span class="badge badge-light-danger"><i class="fa-solid fa-circle-xmark me-1"></i>Rejected</span>';
                    } else {
                        statusBadge = '<span class="badge badge-light-warning"><i class="fa-solid fa-clock me-1"></i>Pending</span>';
                    }

                    // ── Action buttons ──
                    let actionBtns = '';
                    if (r.checkstatus == 0) {
                        actionBtns = `
                            <button class="btn btn-sm btn-light-success btndailycompleteapprove me-1"
                                    data-id="${r.idtbl_production_daily_complete}" title="Approve">
                                <i class="fa-solid fa-check"></i>
                            </button>
                            <button class="btn btn-sm btn-light-danger btndailycompletereject"
                                    data-id="${r.idtbl_production_daily_complete}" title="Reject">
                                <i class="fa-solid fa-xmark"></i>
                            </button>`;
                    } else if (r.checkstatus == 1) {
                        actionBtns = `
                            <span class="badge badge-light-success me-1" title="Approved">
                                <i class="fa-solid fa-check-double"></i>
                            </span>
                            <a href="/productionpacking/label/${r.idtbl_production_daily_complete}"
                               target="_blank" class="btn btn-sm btn-light-warning" title="Print Label">
                                <i class="fa-solid fa-tag"></i>
                            </a>`;
                    } else if (r.checkstatus == 3) {
                        actionBtns = `
                            <span class="badge badge-light-danger">
                                <i class="fa-solid fa-ban me-1"></i>Rejected
                            </span>`;
                    }

                    html += `
                        <tr class="${rowClass}">
                            <td>${i + 1}</td>
                            <td>${r.batchno ?? '-'}</td>
                            <td>${r.comdate}</td>
                            <td>${r.mfdate}</td>
                            <td>${r.expdate}</td>
                            <td class="text-center">${r.qty}</td>
                            <td class="text-center">${r.damageqty ?? 0}</td>
                            <td>${statusBadge}</td>
                            <td>${r.name ?? '-'}</td>
                            <td class="text-end">${actionBtns}</td>
                        </tr>`;
                });

                $('#dailyapproveBody').html(html);
            })
            .fail(function () {
                $('#dailyapproveBody').html(
                    '<tr><td colspan="10" class="text-center text-danger py-5">Failed to load records</td></tr>'
                );
            });
    }

</script>
@endsection