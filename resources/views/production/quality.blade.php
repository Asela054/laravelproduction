@extends('base.master')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    {{-- Toolbar --}}
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">
                    Production Packing Quality
                </h1>
                <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Production</li>
                    <li class="breadcrumb-item text-muted">Packing Quality</li>
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
     MODAL: View Production Details
══════════════════════════════════════ --}}
<div class="modal fade" id="modalViewProduction" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Production Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered fs-6">
                        <thead>
                            <tr class="fw-bold text-gray-600">
                                <th>Product Code</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="viewProductionBody"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════
     MODAL: Apply Quality
══════════════════════════════════════ --}}
<div class="modal fade" id="modalQuality" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Production Quality Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="qualityForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label required">Product</label>
                        <select name="materialinfo" id="materialinfo" class="form-select">
                            <option value="">Select</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Examined Qty</label>
                        <input type="text" name="exqty" id="exqty" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Net Weight</label>
                        <input type="text" name="netweight" id="netweight" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Gross Weight</label>
                        <input type="text" name="grossweight" id="grossweight" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Raw Material</label>
                        <div id="rawMaterialsContainer"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Packing Material</label>
                        <div id="packMaterialsContainer"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Labelling Material</label>
                        <div id="labelMaterialsContainer"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Moisture %</label>
                        <input type="text" name="moisture" id="moisture" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="text" name="color" id="color" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Taste</label>
                        <input type="text" name="taste" id="taste" class="form-control">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Seal</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="seal"
                                       id="seal1" value="1">
                                <label class="form-check-label" for="seal1">YES</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="seal"
                                       id="seal2" value="0" checked>
                                <label class="form-check-label" for="seal2">NO</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Water Leakages</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="leakages"
                                       id="leak1" value="1">
                                <label class="form-check-label" for="leak1">YES</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="leakages"
                                       id="leak2" value="0" checked>
                                <label class="form-check-label" for="leak2">NO</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pass / Fail</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="qualityform"
                                   id="pass1" value="1">
                            <label class="form-check-label" for="pass1">PASS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="qualityform"
                                   id="pass2" value="0" checked>
                            <label class="form-check-label" for="pass2">FAIL</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Comments</label>
                        <textarea name="comment" id="comment" class="form-control" rows="2"></textarea>
                    </div>

                    <input type="hidden" name="hideproductionmaterial" id="hideproductionmaterial">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnApplyQuality">
                    <span id="btnApplyQuality-text">
                        Apply Quality
                    </span>
                    <span id="btnApplyQuality-spinner" class="d-none">
                        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                        Applying...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════
     MODAL: View Quality Info
══════════════════════════════════════ --}}
<div class="modal fade" id="modalQualityView" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Quality Check Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="qualityViewBody"></div>
            <div class="modal-footer">
                @if(checkPrivilege(13,'edit'))
                <button type="button" class="btn btn-primary" id="btnEditInfo">
                    <i class="fa-solid fa-pen me-2"></i>Edit Info
                </button>
                @endif
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="hideproductionmaterial2">
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════
     MODAL: Edit Quality Info
══════════════════════════════════════ --}}
<div class="modal fade" id="modalQualityEdit" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Quality Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editQualityForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Examined Qty</label>
                        <input type="text" name="exqty" id="editExqty" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Net Weight</label>
                        <input type="text" name="netweight" id="editNetweight" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gross Weight</label>
                        <input type="text" name="grossweight" id="editGrossweight" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Moisture %</label>
                        <input type="text" name="moisture" id="editMoisture" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="text" name="color" id="editColor" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Taste</label>
                        <input type="text" name="taste" id="editTaste" class="form-control">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Seal</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="seal"
                                       id="editSeal1" value="1">
                                <label class="form-check-label" for="editSeal1">YES</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="seal"
                                       id="editSeal2" value="0">
                                <label class="form-check-label" for="editSeal2">NO</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Water Leakages</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="leakages"
                                       id="editLeak1" value="1">
                                <label class="form-check-label" for="editLeak1">YES</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="leakages"
                                       id="editLeak2" value="0">
                                <label class="form-check-label" for="editLeak2">NO</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pass / Fail</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="qualityform"
                                   id="editPass1" value="1">
                            <label class="form-check-label" for="editPass1">PASS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="qualityform"
                                   id="editPass2" value="0">
                            <label class="form-check-label" for="editPass2">FAIL</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Comments</label>
                        <textarea name="comment" id="editComment" class="form-control" rows="2"></textarea>
                    </div>

                    <input type="hidden" name="editedproductionid" id="editedproductionid">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnSaveQuality">
                    <span id="btnSaveQuality-text">
                        Save Quality
                    </span>
                    <span id="btnSaveQuality-spinner" class="d-none">
                        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                        Saving...
                    </span>
                </button>
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
            ajax: "{{ route('productionpackingquality.data') }}",

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
                { data: 'product_name',  name: 'product_name' },
                { data: 'qty',           name: 'qty' },
                { data: 'prostartdate',  name: 'prostartdate' },
                { data: 'proenddate',    name: 'proenddate' },
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
                                    <a href="#" class="menu-link px-3 btnCheck"
                                       data-id="${row.idtbl_production_order}">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-list-check"></i>
                                        </span>
                                        <span class="menu-title">Quality Check</span>
                                    </a>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 btnView"
                                       data-id="${row.idtbl_production_order}">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-eye"></i>
                                        </span>
                                        <span class="menu-title">View Details</span>
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

        /* ── View Production Details ── */
        $(document).on('click', '.btnView', function (e) {
            e.preventDefault();
            const id = $(this).data('id');

            $.post("{{ route('productionpackingquality.semidetails') }}", { recordID: id })
                .done(function (rows) {
                    let html = '';
                    rows.forEach(r => {
                        html += `
                            <tr>
                                <td>${r.product_name} - ${r.product_code}</td>
                                <td class="text-end">
                                    <a href="/productionpackingquality/report/${r.idtbl_production_order}"
                                       target="_blank" class="btn btn-sm btn-light-warning me-1">
                                        <i class="fa-solid fa-file"></i>
                                    </a>
                                    <button type="button"
                                            class="btn btn-sm btn-light-primary btnViewQualityInfo"
                                            data-id="${r.idtbl_production_order}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </td>
                            </tr>`;
                    });
                    $('#viewProductionBody').html(
                        html || '<tr><td colspan="2" class="text-center">No records</td></tr>'
                    );
                    $('#modalViewProduction').modal('show');
                });
        });

        /* ── Open Quality Check modal ── */
        $(document).on('click', '.btnCheck', function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            $('#hideproductionmaterial').val(id);

            $.post("{{ route('productionpackingquality.qualityform') }}", { recordID: id })
                .done(function (res) {
                    // Populate product dropdown
                    let opts = '<option value="">Select</option>';
                    res.products.forEach(p => {
                        opts += `<option value="${p.idtbl_product}">${p.product_name} - ${p.product_code}</option>`;
                    });
                    $('#materialinfo').html(opts);

                    // Populate material containers for first product
                    populateMaterials('#rawMaterialsContainer',   res.rawMaterials);
                    populateMaterials('#packMaterialsContainer',  res.packMaterials);
                    populateMaterials('#labelMaterialsContainer', res.labelMaterials);

                    // Reset other form fields but restore key values after reset
                    $('#qualityForm')[0].reset();
                    $('#materialinfo').html(opts);
                    $('#hideproductionmaterial').val(id);

                    // Re-populate materials after reset clears containers
                    populateMaterials('#rawMaterialsContainer',   res.rawMaterials);
                    populateMaterials('#packMaterialsContainer',  res.packMaterials);
                    populateMaterials('#labelMaterialsContainer', res.labelMaterials);

                    $('#modalQuality').modal('show');
                });
        });

        /* ── Reload BOM materials when product dropdown changes ── */
        $(document).on('change', '#materialinfo', function () {
            const productId = $(this).val();

            if (!productId) {
                $('#rawMaterialsContainer, #packMaterialsContainer, #labelMaterialsContainer').html('');
                return;
            }

            $.post("{{ route('productionpackingquality.bommaterials') }}", {
                productId: productId
            }).done(function (res) {
                populateMaterials('#rawMaterialsContainer',   res.rawMaterials);
                populateMaterials('#packMaterialsContainer',  res.packMaterials);
                populateMaterials('#labelMaterialsContainer', res.labelMaterials);
            });
        });

        function populateMaterials(container, materials) {
            let html = '';
            materials.forEach(m => {
                html += `<input type="text" class="form-control form-control-sm mb-1"
                                value="${m.materialinfocode} - ${m.materialname}" readonly>`;
            });
            $(container).html(html);
        }

        /* ── Apply Quality ── */
        $('#btnApplyQuality').on('click', function () {
            const formData = new FormData($('#qualityForm')[0]);

            // Show spinner
            $('#btnApplyQuality').prop('disabled', true);
            $('#btnApplyQuality-text').addClass('d-none');
            $('#btnApplyQuality-spinner').removeClass('d-none');

            $.ajax({
                url:         "{{ route('productionpackingquality.store') }}",
                type:        'POST',
                data:        formData,
                processData: false,
                contentType: false,
            })
            .done(function (res) {
                // Reset spinner
                $('#btnApplyQuality').prop('disabled', false);
                $('#btnApplyQuality-text').removeClass('d-none');
                $('#btnApplyQuality-spinner').addClass('d-none');

                if (res.status == 1) {
                    Swal.fire('Success!', res.message, 'success').then(() => {
                        $('#modalQuality').modal('hide');
                        table.ajax.reload(null, false);
                    });
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            })
            .fail(function () {
                // Reset spinner on failure
                $('#btnApplyQuality').prop('disabled', false);
                $('#btnApplyQuality-text').removeClass('d-none');
                $('#btnApplyQuality-spinner').addClass('d-none');

                Swal.fire('Error', 'Request failed', 'error');
            });
        });

        /* ── View Quality Info ── */
        $(document).on('click', '.btnViewQualityInfo', function () {
            const id = $(this).data('id');
            $('#hideproductionmaterial2').val(id);

            $.post("{{ route('productionpackingquality.viewdescription') }}", { recordID: id })
            .done(function (rows) {
                let html = '';
                rows.forEach((r, index) => {
                    const passBadge = r.descstatus === 'PASS'
                        ? '<span class="badge badge-light-success fs-7 fw-bold px-3 py-2"><i class="fa-solid fa-circle-check me-1"></i>PASS</span>'
                        : '<span class="badge badge-light-danger fs-7 fw-bold px-3 py-2"><i class="fa-solid fa-circle-xmark me-1"></i>FAIL</span>';

                    const sealBadge = r.descstatus1 === 'YES'
                        ? '<span class="badge badge-light-success fs-7">YES</span>'
                        : '<span class="badge badge-light-danger fs-7">NO</span>';

                    const leakBadge = r.descstatus2 === 'YES'
                        ? '<span class="badge badge-light-danger fs-7">YES</span>'
                        : '<span class="badge badge-light-success fs-7">NO</span>';

                    html += `
                        <div class="card border border-gray-200 mb-5">

                            {{-- Card Header --}}
                            <div class="card-header min-h-50px bg-light-primary border-bottom border-gray-200 d-flex align-items-center justify-content-between">
                                <span class="fw-bold text-primary fs-6">
                                    <i class="fa-solid fa-flask me-2"></i>Quality Record #${index + 1}
                                </span>
                                ${passBadge}
                            </div>

                            <div class="card-body py-4 px-5">

                                {{-- Weight & Qty Section --}}
                                <div class="mb-4">
                                    <div class="text-muted fw-semibold fs-8 text-uppercase letter-spacing-1 mb-3">
                                        <i class="fa-solid fa-scale-balanced me-1"></i> Weight & Quantity
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="bg-light rounded p-3 text-center">
                                                <div class="text-muted fs-8 mb-1">Examined Qty</div>
                                                <div class="fw-bold fs-6 text-gray-800">${r.examined_quantity ?? '-'}</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="bg-light rounded p-3 text-center">
                                                <div class="text-muted fs-8 mb-1">Net Weight</div>
                                                <div class="fw-bold fs-6 text-gray-800">${r.net_weight ?? '-'}</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="bg-light rounded p-3 text-center">
                                                <div class="text-muted fs-8 mb-1">Gross Weight</div>
                                                <div class="fw-bold fs-6 text-gray-800">${r.gross_weight ?? '-'}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Sensory Section --}}
                                <div class="mb-4">
                                    <div class="text-muted fw-semibold fs-8 text-uppercase letter-spacing-1 mb-3">
                                        <i class="fa-solid fa-eye me-1"></i> Sensory Attributes
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="bg-light rounded p-3 text-center">
                                                <div class="text-muted fs-8 mb-1">Moisture %</div>
                                                <div class="fw-bold fs-6 text-gray-800">${r.moisture ?? '-'}</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="bg-light rounded p-3 text-center">
                                                <div class="text-muted fs-8 mb-1">Color</div>
                                                <div class="fw-bold fs-6 text-gray-800">${r.color ?? '-'}</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="bg-light rounded p-3 text-center">
                                                <div class="text-muted fs-8 mb-1">Taste</div>
                                                <div class="fw-bold fs-6 text-gray-800">${r.taste ?? '-'}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Packaging Checks --}}
                                <div class="mb-4">
                                    <div class="text-muted fw-semibold fs-8 text-uppercase letter-spacing-1 mb-3">
                                        <i class="fa-solid fa-box me-1"></i> Packaging Checks
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center justify-content-between bg-light rounded px-4 py-3">
                                                <span class="text-gray-600 fw-semibold fs-7">Seal</span>
                                                ${sealBadge}
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex align-items-center justify-content-between bg-light rounded px-4 py-3">
                                                <span class="text-gray-600 fw-semibold fs-7">Water Leakages</span>
                                                ${leakBadge}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Comments --}}
                                ${r.comments ? `
                                <div class="bg-light-warning rounded p-3">
                                    <div class="text-muted fw-semibold fs-8 text-uppercase mb-1">
                                        <i class="fa-solid fa-comment me-1"></i> Comments
                                    </div>
                                    <div class="text-gray-700 fs-7">${r.comments}</div>
                                </div>` : ''}

                            </div>
                        </div>`;
                });

                $('#qualityViewBody').html(
                    html || `<div class="text-center py-10">
                                <i class="fa-solid fa-clipboard-list fs-2x text-muted mb-3"></i>
                                <p class="text-muted fs-6">No quality records found.</p>
                            </div>`
                );
                $('#modalViewProduction').modal('hide');
                $('#modalQualityView').modal('show');
            });
        });

        /* ── Edit Quality Info ── */
        $('#btnEditInfo').on('click', function () {
            const id = $('#hideproductionmaterial2').val();
            $('#editedproductionid').val(id);

            $.post("{{ route('productionpackingquality.editinfo') }}", { recordID: id })
                .done(function (row) {
                    $('#editExqty').val(row.examined_quantity);
                    $('#editNetweight').val(row.net_weight);
                    $('#editGrossweight').val(row.gross_weight);
                    $('#editMoisture').val(row.moisture);
                    $('#editColor').val(row.color);
                    $('#editTaste').val(row.taste);
                    $('#editComment').val(row.comments);

                    $(`input[name="seal"][value="${row.seal}"]`).prop('checked', true);
                    $(`input[name="leakages"][value="${row.water_leakages}"]`).prop('checked', true);
                    $(`input[name="qualityform"][value="${row.statuspassfail}"]`).prop('checked', true);

                    $('#modalQualityView').modal('hide');
                    $('#modalQualityEdit').modal('show');
                });
        });

        /* ── Save Updated Quality ── */
        $('#btnSaveQuality').on('click', function () {
            const formData = new FormData($('#editQualityForm')[0]);

            // Show spinner
            $('#btnSaveQuality').prop('disabled', true);
            $('#btnSaveQuality-text').addClass('d-none');
            $('#btnSaveQuality-spinner').removeClass('d-none');

            $.ajax({
                url:         "{{ route('productionpackingquality.update') }}",
                type:        'POST',
                data:        formData,
                processData: false,
                contentType: false,
            })
            .done(function (res) {
                // Reset spinner
                $('#btnSaveQuality').prop('disabled', false);
                $('#btnSaveQuality-text').removeClass('d-none');
                $('#btnSaveQuality-spinner').addClass('d-none');

                if (res.status == 1) {
                    Swal.fire('Updated!', res.message, 'success').then(() => {
                        $('#modalQualityEdit').modal('hide');
                        table.ajax.reload(null, false);
                    });
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            })
            .fail(function () {
                // Reset spinner on failure
                $('#btnSaveQuality').prop('disabled', false);
                $('#btnSaveQuality-text').removeClass('d-none');
                $('#btnSaveQuality-spinner').addClass('d-none');

                Swal.fire('Error', 'Request failed', 'error');
            });
        });

    });
</script>
@endsection