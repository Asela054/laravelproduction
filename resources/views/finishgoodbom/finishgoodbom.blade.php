@extends('base.master')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <!-- Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">Finish Good BOM</h1>
                <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Production</li>
                    <li class="breadcrumb-item text-muted">Finish Good BOM</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <!-- TABLE CARD -->
            <div class="card">
                <div class="card-header border-0 pt-6 mb-5">
                    <div class="card-title">
                        <input type="text"
                               data-kt-table-filter="search"
                               class="form-control form-control-solid w-250px"
                               placeholder="Search BOM">
                    </div>
                    <div class="card-toolbar gap-2">
                        <button type="button" class="btn btn-light-secondary btn-sm" id="btnViewAllBOM">
                            <i class="fa-solid fa-list me-2"></i>All BOM List
                        </button>
                        @if(hasAnyPrivilege(11, ['add']))
                        <button type="button" class="btn btn-primary btn-sm" id="btnCreateBOM">
                            <i class="fa-solid fa-plus me-2"></i>Create BOM
                        </button>
                        @endif
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="dataTable">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                                    <th>#</th>
                                    <th>BOM Title</th>
                                    <th>Finish Good</th>
                                    <th>Materials</th>
                                    <th>Status</th>
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

{{-- Modal: Create / Edit BOM --}}
<div class="modal fade" id="modalBOM" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBOMTitle">Create BOM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="bomForm" method="POST" action="{{ route('finishgoodbom.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label required">BOM Title</label>
                        <input type="text" name="bomtitle" id="bomtitle" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label required">Finish Good</label>
                        <select name="finishgood" id="finishgood" class="form-select" required style="width:100%">
                            <option value="">Select</option>
                        </select>
                    </div>

                    <div id="bomRowsContainer">
                        {{-- Row template (index 0) --}}
                        <div class="bom-row border rounded p-4 mb-3" id="bom-row-0">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label required">Material Category</label>
                                    <select class="form-select materialcate" name="materialcategory[]"
                                            id="materialcategory0" required>
                                        <option value="">Select</option>
                                        @foreach($materialCategories as $cat)
                                            <option value="{{ $cat->idtbl_material_category }}">
                                                {{ $cat->categoryname }} - {{ $cat->categorycode }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label required">Material</label>
                                    <select class="form-select materialinfo" name="materialinfo[]"
                                            id="materialinfo0" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label required">Quantity</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control qtyinput"
                                               name="qty[]" id="qty0" required>
                                        <input type="text" class="form-control unitdisplay"
                                               id="unit0" name="unit[]" readonly style="max-width:60px">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label required">Wastage %</label>
                                    <input type="text" class="form-control" name="wastage[]"
                                           id="wastage0" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mb-4">
                        <button type="button" class="btn btn-light-danger btn-sm" id="btnAddRow">
                            <i class="fa-solid fa-plus me-1"></i>Add Row
                        </button>
                        <button type="button" class="btn btn-light-dark btn-sm" id="btnRemoveRow">
                            <i class="fa-solid fa-minus me-1"></i>Remove Row
                        </button>
                    </div>

                    <input type="hidden" name="recordID" id="bomRecordID">

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="bomSubmitBtn" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk me-2"></i>Save All
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal: View BOM Details --}}
<div class="modal fade" id="modalBOMDetails" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">BOM Details — <span id="bomDetailTitle"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered fs-6" id="tblBOMDetails">
                    <thead>
                        <tr class="fw-bold text-gray-600">
                            <th>Material Category</th>
                            <th>Material Name</th>
                            <th>Quantity</th>
                            <th>Wastage</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="bomDetailsBody"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal: Edit Single BOM Row --}}
<div class="modal fade" id="modalBOMRowEdit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit BOM Row</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Material Category</label>
                    <input type="text" class="form-control" id="rowEditCategory" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Material</label>
                    <select class="form-select" id="rowEditMaterial" name="materialinfo">
                        <option value="">Select</option>
                        @foreach($materialNames as $mat)
                            <option value="{{ $mat->idtbl_material_info }}" data-unit="{{ optional($mat->unit)->unitcode }}">
                                {{ $mat->materialname }} - {{ $mat->materialinfocode }} / {{ optional($mat->unit)->unitcode }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Quantity</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="rowEditQty" name="quantity" required>
                        <input type="text" class="form-control" id="rowEditUnit" readonly style="max-width:60px">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Wastage %</label>
                    <input type="text" class="form-control" id="rowEditWastage" name="wastagepresentage" required>
                </div>
                <input type="hidden" id="rowEditID">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnSaveBOMRow">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Update
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Modal: View All BOM --}}
<div class="modal fade" id="modalViewAllBOM" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">All BOM List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered fs-7" id="tblViewAllBOM">
                        <thead>
                            <tr class="fw-bold text-gray-600">
                                <th>#</th>
                                <th>Finish Good Code</th>
                                <th>Finish Good Name</th>
                                <th>Material Code</th>
                                <th>Material Name</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Wastage %</th>
                            </tr>
                        </thead>
                        <tbody id="viewAllBOMBody"></tbody>
                    </table>
                </div>
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
// Pass categories to JavaScript as a JSON array
const materialCategories = @json($materialCategories);

$(document).ready(function () {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // Flash messages
    @if(session('success'))
        Swal.fire({ icon: 'success', title: 'Success', text: '{{ session('success') }}' });
    @endif
    @if(session('error'))
        Swal.fire({ icon: 'error', title: 'Error', text: '{{ session('error') }}' });
    @endif

    // DataTable
    let table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('finishgoodbom.data') }}",
        dom:
            "<'row mb-3'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'B>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mt-3'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend: 'print',
                text: `<span class="d-inline-flex align-items-center"><i class="ki-duotone ki-exit-up fs-2 me-2"><span class="path1"></span><span class="path2"></span></i>Print</span>`,
                className: 'btn btn-light-primary me-3'
            },
            {
                extend: 'csv',
                text: `<span class="d-inline-flex align-items-center"><i class="ki-duotone ki-exit-up fs-2 me-2"><span class="path1"></span><span class="path2"></span></i>CSV</span>`,
                className: 'btn btn-light-primary me-3'
            }
        ],
        columns: [
            { data: 'idtbl_product_bom_info', name: 'idtbl_product_bom_info' },
            { data: 'title',                  name: 'title' },
            { data: 'finish_good',            name: 'finish_good', orderable: false },
            { data: 'material_names',         name: 'material_names', orderable: false },
            {
                data: 'status',
                render: d => d == 1
                    ? '<span class="badge badge-light-success">Active</span>'
                    : '<span class="badge badge-light-warning">Inactive</span>'
            },
            {
                data: null,
                className: 'text-end',
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    let actions = `
                        <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            Actions <i class="ki-duotone ki-down fs-5 ms-1"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                    menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                             data-kt-menu="true">
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3 btnViewDetails"
                               data-id="${row.idtbl_product_bom_info}"
                               data-title="${row.title}">
                                <span class="menu-icon"><i class="fa-solid fa-eye"></i></span>
                                <span class="menu-title">View Details</span>
                            </a>
                        </div>`;

                    @if(checkPrivilege(11,'edit'))
                    actions += `
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3 btnEditBOM"
                               data-id="${row.idtbl_product_bom_info}">
                                <span class="menu-icon"><i class="fa-solid fa-pen"></i></span>
                                <span class="menu-title">Edit</span>
                            </a>
                        </div>`;
                    @endif

                    @if(checkPrivilege(11,'statuschange'))
                    if (row.status == 1) {
                        actions += `
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3 btnStatus"
                                   data-id="${row.idtbl_product_bom_info}" data-status="2">
                                    <span class="menu-icon"><i class="fa-solid fa-ban"></i></span>
                                    <span class="menu-title">Deactivate</span>
                                </a>
                            </div>`;
                    } else {
                        actions += `
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3 btnStatus"
                                   data-id="${row.idtbl_product_bom_info}" data-status="1">
                                    <span class="menu-icon"><i class="fa-solid fa-check"></i></span>
                                    <span class="menu-title">Activate</span>
                                </a>
                            </div>`;
                    }
                    @endif

                    @if(checkPrivilege(11,'remove'))
                    actions += `
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3 btnStatus"
                               data-id="${row.idtbl_product_bom_info}" data-status="3">
                                <span class="menu-icon"><i class="fa-solid fa-trash-can"></i></span>
                                <span class="menu-title">Delete</span>
                            </a>
                        </div>`;
                    @endif

                    actions += `</div>`;
                    return actions;
                }
            }
        ],
        drawCallback: () => KTMenu.createInstances()
    });

    $("input[data-kt-table-filter='search']").on('keyup', function () {
        table.search(this.value).draw();
    });

    // Select2: Finish Good (AJAX)
    function initFinishGoodSelect2() {
        $('#finishgood').select2({
            dropdownParent: $('#modalBOM'),
            ajax: {
                url: "{{ route('finishgoodbom.ajax.finishgoods') }}",
                dataType: 'json',
                delay: 250,
                data: params => ({ term: params.term }),
                processResults: response => ({ results: response }),
                cache: true
            }
        });
    }
    initFinishGoodSelect2();

    // Dynamic material category → material rows
    let rowCount = 0;

    function bindCategoryChange(rowIndex) {
        $(`#materialcategory${rowIndex}`).on('change', function () {
            const categoryId = $(this).val();
            if (!categoryId) return;

            $.get("{{ route('finishgoodbom.ajax.materials') }}", { category_id: categoryId })
                .done(function (data) {
                    let opts = '<option value="">Select</option>';
                    data.forEach(m => {
                        opts += `<option value="${m.idtbl_material_info}"
                                          data-unit="${m.unitcode}">
                                     ${m.materialname} - ${m.materialinfocode} / ${m.unitcode}
                                 </option>`;
                    });
                    $(`#materialinfo${rowIndex}`).html(opts);
                });
        });

        $(`#materialinfo${rowIndex}`).on('change', function () {
            const unit = $(this).find('option:selected').data('unit') || '';
            $(`#unit${rowIndex}`).val(unit);
        });
    }

    bindCategoryChange(0);

    $('#btnAddRow').on('click', function () {
        rowCount++;
        const idx = rowCount;

        // Build category options from the JavaScript array (already loaded from the controller)
        let catOptions = '<option value="">Select</option>';
        materialCategories.forEach(cat => {
            catOptions += `<option value="${cat.idtbl_material_category}">${cat.categoryname} - ${cat.categorycode}</option>`;
        });

        const html = `
            <div class="bom-row border rounded p-4 mb-3" id="bom-row-${idx}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label required">Material Category</label>
                        <select class="form-select materialcate" name="materialcategory[]"
                                id="materialcategory${idx}" required>
                            ${catOptions}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label required">Material</label>
                        <select class="form-select materialinfo" name="materialinfo[]"
                                id="materialinfo${idx}" required>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label required">Quantity</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="qty[]" id="qty${idx}" required>
                            <input type="text" class="form-control" id="unit${idx}" name="unit[]"
                                   readonly style="max-width:60px">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label required">Wastage %</label>
                        <input type="text" class="form-control" name="wastage[]" id="wastage${idx}" required>
                    </div>
                </div>
            </div>`;

        $('#bomRowsContainer').append(html);
        bindCategoryChange(idx);
    });

    $('#btnRemoveRow').on('click', function () {
        const rows = $('.bom-row');
        if (rows.length > 1) rows.last().remove();
    });

    // Open Create modal
    $('#btnCreateBOM').on('click', function () {
        $('#bomForm')[0].reset();
        $('#bomForm').attr('action', "{{ route('finishgoodbom.store') }}");
        $('#bomForm input[name="_method"]').remove();
        $('#bomSubmitBtn').text('Save All');
        $('#modalBOMTitle').text('Create BOM');
        // Reset to single row (clone the template)
        $('#bomRowsContainer').html($('#bom-row-0').clone());
        rowCount = 0;
        bindCategoryChange(0);
        $('#modalBOM').modal('show');
    });

    // Edit BOM
    $(document).on('click', '.btnEditBOM', function () {
        const id = $(this).data('id');

        $.get(`/finishgoodbom/${id}/edit`, function (res) {
            $('#bomRecordID').val(res.id);
            $('#bomtitle').val(res.title);
            $('#modalBOMTitle').text('Edit BOM');

            // Set finish good
            if (res.finishGood) {
                const opt = new Option(
                    `${res.finishGood.product_name} - ${res.finishGood.product_code}`,
                    res.finishGood.idtbl_product,
                    true, true
                );
                $('#finishgood').empty().append(opt).trigger('change');
            }

            // Build bom rows
            $('#bomRowsContainer').empty();
            res.bomRows.forEach((row, idx) => {
                const catOpts = materialCategories.map(c =>
                    `<option value="${c.idtbl_material_category}"
                             ${c.idtbl_material_category == row.material?.tbl_material_category_idtbl_material_category ? 'selected' : ''}>
                         ${c.categoryname} - ${c.categorycode}
                     </option>`
                ).join('');

                const matOpts = row.materialsInCategory.map(m =>
                    `<option value="${m.idtbl_material_info}"
                             data-unit="${m.unitcode}"
                             ${m.idtbl_material_info == row.bom.tbl_material_info_idtbl_material_info ? 'selected' : ''}>
                         ${m.materialname} - ${m.materialinfocode} / ${m.unitcode}
                     </option>`
                ).join('');

                const unitVal = row.materialsInCategory.find(
                    m => m.idtbl_material_info == row.bom.tbl_material_info_idtbl_material_info
                )?.unitcode ?? '';

                $('#bomRowsContainer').append(`
                    <div class="bom-row border rounded p-4 mb-3" id="bom-row-${idx}">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label required">Material Category</label>
                                <select class="form-select materialcate" name="materialcategory[]"
                                        id="materialcategory${idx}" required>
                                    <option value="">Select</option>${catOpts}
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label required">Material</label>
                                <select class="form-select materialinfo" name="materialinfo[]"
                                        id="materialinfo${idx}" required>
                                    <option value="">Select</option>${matOpts}
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label required">Quantity</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="qty[]"
                                           id="qty${idx}" value="${row.bom.qty}" required>
                                    <input type="text" class="form-control" id="unit${idx}"
                                           name="unit[]" value="${unitVal}" readonly style="max-width:60px">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label required">Wastage %</label>
                                <input type="text" class="form-control" name="wastage[]"
                                       id="wastage${idx}" value="${row.bom.wastage}" required>
                            </div>
                        </div>
                    </div>`);

                bindCategoryChange(idx);
            });

            rowCount = res.bomRows.length - 1;

            $('#bomForm').attr('action', `/finishgoodbom/${res.id}`);
            if ($('#bomForm input[name="_method"]').length === 0) {
                $('#bomForm').append('<input type="hidden" name="_method" value="PUT">');
            }
            $('#bomSubmitBtn').text('Update');
            $('#modalBOM').modal('show');
        });
    });

    // View BOM Details
    $(document).on('click', '.btnViewDetails', function () {
        const id    = $(this).data('id');
        const title = $(this).data('title');

        $('#bomDetailTitle').text(title);
        $('#bomDetailsBody').html('<tr><td colspan="5" class="text-center">Loading...</td></tr>');
        $('#modalBOMDetails').modal('show');

        $.get(`/finishgoodbom/${id}/details`, function (rows) {
            if (!rows.length) {
                $('#bomDetailsBody').html('<tr><td colspan="5" class="text-center">No records</td></tr>');
                return;
            }
            let html = '';
            rows.forEach(r => {
                html += `<tr>
                    <td>${r.categoryname}</td>
                    <td>${r.materialname} - ${r.materialinfocode}</td>
                    <td>${r.qty} ${r.unitcode}</td>
                    <td>${r.wastage}%</td>
                    <td class="text-end">
                        @if(checkPrivilege(11,'edit'))
                        <button class="btn btn-sm btn-light-primary btnEditBOMRow me-1"
                                data-id="${r.idtbl_product_bom}">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        @endif
                        @if(checkPrivilege(11,'remove'))
                        <button class="btn btn-sm btn-light-danger btnDeleteBOMRow"
                                data-id="${r.idtbl_product_bom}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                        @endif
                    </td>
                </tr>`;
            });
            $('#bomDetailsBody').html(html);
        });
    });

    // Edit single BOM row
    $(document).on('click', '.btnEditBOMRow', function () {
        const id = $(this).data('id');

        $.get(`/finishgoodbom/row/${id}/edit`, function (row) {
            $('#rowEditID').val(row.idtbl_product_bom);
            $('#rowEditCategory').val(row.categoryname);
            $('#rowEditMaterial').val(row.tbl_material_info_idtbl_material_info).trigger('change');
            $('#rowEditQty').val(row.qty);
            $('#rowEditWastage').val(row.wastage);

            const unit = $('#rowEditMaterial option:selected').data('unit') || '';
            $('#rowEditUnit').val(unit);

            $('#modalBOMRowEdit').modal('show');
        });
    });

    $('#rowEditMaterial').on('change', function () {
        const unit = $(this).find('option:selected').data('unit') || '';
        $('#rowEditUnit').val(unit);
    });

    $('#btnSaveBOMRow').on('click', function () {
        const id = $('#rowEditID').val();

        $.post(`/finishgoodbom/row/${id}/update`, {
            materialinfo:      $('#rowEditMaterial').val(),
            quantity:          $('#rowEditQty').val(),
            wastagepresentage: $('#rowEditWastage').val()
        })
        .done(function (res) {
            Swal.fire('Updated!', res.message, 'success');
            $('#modalBOMRowEdit').modal('hide');
        })
        .fail(function () {
            Swal.fire('Error', 'Update failed', 'error');
        });
    });

    // Delete single BOM row
    $(document).on('click', '.btnDeleteBOMRow', function () {
        const id = $(this).data('id');
        const btn = $(this);

        Swal.fire({
            title: 'Remove this row?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, remove it'
        }).then(result => {
            if (!result.isConfirmed) return;

            $.post(`/finishgoodbom/row/${id}/delete`)
                .done(function (res) {
                    Swal.fire('Removed!', res.message, 'success');
                    btn.closest('tr').fadeOut(300, function () { $(this).remove(); });
                });
        });
    });

    // Status (activate / deactivate / delete)
    $(document).on('click', '.btnStatus', function (e) {
        e.preventDefault();
        const id     = $(this).data('id');
        const status = $(this).data('status');
        const labels = { 1: 'activate', 2: 'deactivate', 3: 'delete' };

        Swal.fire({
            title: 'Are you sure?',
            text: `This will ${labels[status]} the BOM!`,
            icon: 'warning',
            showCancelButton: true
        }).then(result => {
            if (!result.isConfirmed) return;

            $.post(`/finishgoodbom/${id}/status`, { status })
                .done(res => {
                    Swal.fire('Done!', res.message, 'success');
                    table.ajax.reload(null, false);
                })
                .fail(() => Swal.fire('Error', 'Action failed', 'error'));
        });
    });

    // View All BOM
    $('#btnViewAllBOM').on('click', function () {
        $('#viewAllBOMBody').html('<tr><td colspan="8" class="text-center">Loading...</td></tr>');
        $('#modalViewAllBOM').modal('show');

        $.get("{{ route('finishgoodbom.ajax.viewall') }}", function (data) {
            let html = '';
            let i = 1;
            data.forEach(item => {
                html += `<tr class="table-secondary fw-bold">
                    <td>${i++}</td>
                    <td>${item.product.product_code}</td>
                    <td>${item.product.product_name}</td>
                    <td colspan="3"></td>
                    <td></td><td></td>
                </tr>`;
                item.boms.forEach(b => {
                    html += `<tr>
                        <td></td><td></td><td></td>
                        <td>${b.materialinfocode}</td>
                        <td>${b.materialname}</td>
                        <td>${b.qty}</td>
                        <td>${b.unitcode}</td>
                        <td>${b.wastage}%</td>
                    </tr>`;
                });
            });
            $('#viewAllBOMBody').html(html || '<tr><td colspan="8" class="text-center">No data</td></tr>');
        });
    });

});
</script>
@endsection