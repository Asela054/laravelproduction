@extends('base.master')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <!-- Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">Material Detail</h1>
                <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Materials</li>
                    <li class="breadcrumb-item text-muted">Material Detail</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <!-- FORM -->
            @if(hasAnyPrivilege(9, ['add','edit']))
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="card-title fw-bold">Material Detail</h3>
                </div>
                <div class="card-body">
                    <form id="detailForm" method="POST" action="{{ route('materials.detail.store') }}">
                        @csrf

                        <div class="row g-5">
                            <div class="col-md-4">
                                <label class="form-label required">Material Category</label>
                                <select name="materialcategory" id="materialcategory" class="form-select" required>
                                    <option value="">Select</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->idtbl_material_category }}">
                                            {{ $cat->categoryname }} - {{ $cat->categorycode }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label required">Material Name</label>
                                <input type="text" name="materialname" id="materialname" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label required">Material Code</label>
                                <input type="text" name="materialcode" id="materialcode" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label required">Unit</label>
                                <select name="unit" id="unit" class="form-select" required>
                                    <option value="">Select</option>
                                    @foreach($units as $u)
                                        <option value="{{ $u->idtbl_unit }}">{{ $u->unitname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label required">Unit per Ctn</label>
                                <input type="text" name="unitperctn" id="unitperctn" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label required">Re-order Level</label>
                                <input type="text" name="reorder" id="reorder" class="form-control" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Comment</label>
                                <textarea name="comment" id="comment" class="form-control" rows="2"></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="recordID" id="recordID">

                        <div class="d-flex justify-content-end mt-5">
                            <button type="reset" id="resetBtn" class="btn btn-light me-3">Clear</button>
                            <button type="submit" id="submitBtn" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

            <!-- TABLE -->
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <input type="text"
                               data-kt-table-filter="search"
                               class="form-control form-control-solid w-250px"
                               placeholder="Search Material">
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="dataTable">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                                    <th>#</th>
                                    <th>Material Name</th>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Unit per Ctn</th>
                                    <th>Re-order</th>
                                    <th>Comment</th>
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
@endsection

@section('scripts')
<script>

    @if(session('success'))
    Swal.fire({ icon: 'success', title: 'Success', text: '{{ session('success') }}' });
    @endif

    @if(session('error'))
    Swal.fire({ icon: 'error', title: 'Error', text: '{{ session('error') }}' });
    @endif

    @if ($errors->any())
    Swal.fire({ icon: 'error', title: 'Validation Error', html: '{!! implode('<br>', $errors->all()) !!}' });
    @endif

    $(document).ready(function () {

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        let table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('materials.detail.data') }}",

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
                { data: 'idtbl_material_info', name: 'idtbl_material_info' },
                { data: 'materialname',        name: 'materialname' },
                { data: 'materialinfocode',    name: 'materialinfocode' },
                { data: 'categoryname',        name: 'categoryname', orderable: false },
                { data: 'unitname',            name: 'unitname',     orderable: false },
                { data: 'unitperctn',          name: 'unitperctn' },
                { data: 'reorderlevel',        name: 'reorderlevel' },
                { data: 'comment',             name: 'comment' },
                {
                    data: 'status',
                    render: function (data) {
                        return data == 1
                            ? '<span class="badge badge-light-success">Active</span>'
                            : '<span class="badge badge-light-warning">Inactive</span>';
                    }
                },
                {
                    data: null,
                    className: 'text-end',
                    orderable: false,
                    searchable: false,
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

                        @if(checkPrivilege(9,'edit'))
                        actions += `
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3 editDetail" data-id="${row.idtbl_material_info}">
                                    <span class="menu-icon"><i class="fa-solid fa-pen"></i></span>
                                    <span class="menu-title">Edit</span>
                                </a>
                            </div>`;
                        @endif

                        @if(checkPrivilege(9,'statuschange'))
                        if (row.status == 1) {
                            actions += `
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 deactivateDetail" data-id="${row.idtbl_material_info}">
                                        <span class="menu-icon"><i class="fa-solid fa-ban"></i></span>
                                        <span class="menu-title">Deactivate</span>
                                    </a>
                                </div>`;
                        } else {
                            actions += `
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 activateDetail" data-id="${row.idtbl_material_info}">
                                        <span class="menu-icon"><i class="fa-solid fa-check"></i></span>
                                        <span class="menu-title">Activate</span>
                                    </a>
                                </div>`;
                        }
                        @endif

                        @if(checkPrivilege(9,'remove'))
                        actions += `
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3 deleteDetail" data-id="${row.idtbl_material_info}">
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

            drawCallback: function () {
                KTMenu.createInstances();
            }
        });

        // SEARCH
        $("input[data-kt-table-filter='search']").on('keyup', function () {
            table.search(this.value).draw();
        });

        // EDIT
        $(document).on('click', '.editDetail', function () {
            let id = $(this).data('id');

            $.get(`/materials/detail/${id}/edit`, function (res) {
                $('#recordID').val(res.idtbl_material_info);
                $('#materialname').val(res.materialname);
                $('#materialcode').val(res.materialinfocode);
                $('#materialcategory').val(res.tbl_material_category_idtbl_material_category);
                $('#unit').val(res.tbl_unit_idtbl_unit);
                $('#unitperctn').val(res.unitperctn);
                $('#reorder').val(res.reorderlevel);
                $('#comment').val(res.comment);

                $('#submitBtn').text('Update');
                $('#detailForm').attr('action', `/materials/detail/${id}`);

                if ($('#detailForm input[name="_method"]').length === 0) {
                    $('#detailForm').append('<input type="hidden" name="_method" value="PUT">');
                }

                $('html, body').animate({ scrollTop: 0 }, 300);
            });
        });

        // DELETE
        $(document).on('click', '.deleteDetail', function (e) {
            e.preventDefault();
            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This will delete the material!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/materials/detail/${id}`,
                        type: 'DELETE',
                        success: function (response) {
                            Swal.fire('Deleted!', response.message, 'success');
                            table.ajax.reload(null, false);
                        }
                    });
                }
            });
        });

        // STATUS
        function updateStatus(id, status, text) {
            Swal.fire({
                title: 'Are you sure?',
                text: text,
                icon: 'warning',
                showCancelButton: true
            }).then((result) => {
                if (!result.isConfirmed) return;

                $.post(`/materials/detail/${id}/status`, { status: status })
                    .done(function (res) {
                        Swal.fire('Success', res.message, 'success');
                        table.ajax.reload(null, false);
                    })
                    .fail(function () {
                        Swal.fire('Error', 'Action failed', 'error');
                    });
            });
        }

        $(document).on('click', '.activateDetail', function () {
            updateStatus($(this).data('id'), 1, 'This will activate the material!');
        });

        $(document).on('click', '.deactivateDetail', function () {
            updateStatus($(this).data('id'), 2, 'This will deactivate the material!');
        });

        // RESET
        $('#resetBtn').on('click', function () {
            $('#detailForm')[0].reset();
            $('#detailForm').attr('action', "{{ route('materials.detail.store') }}");
            $('#detailForm input[name="_method"]').remove();
            $('#submitBtn').text('Add');
        });

    });
</script>
@endsection