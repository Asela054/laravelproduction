@extends('base.master')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <!-- Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">
                    Unit
                </h1>
                <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Materials</li>
                    <li class="breadcrumb-item text-muted">Unit</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <!-- FORM -->
            @if(hasAnyPrivilege(10, ['add','edit']))
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="card-title fw-bold">Unit</h3>
                </div>

                <div class="card-body">
                    <form id="unitForm" method="POST" action="{{ route('materials.unit.store') }}">
                        @csrf

                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="form-label required">Unit</label>
                                <input type="text" name="unit" id="unit" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label required">Unit Code</label>
                                <input type="text" name="code" id="code" class="form-control" required>
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
                               placeholder="Search Unit">
                    </div>
                </div>

                <div class="card-body pt-0">

                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="dataTable">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                                    <th>#</th>
                                    <th>Unit</th>
                                    <th>Code</th>
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
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}'
    });
    @endif

    @if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}'
    });
    @endif

    @if ($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        html: '{!! implode('<br>', $errors->all()) !!}'
    });
    @endif

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('materials.unit.data') }}",

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
                {
                    data: 'idtbl_unit',
                    name: 'idtbl_unit'
                },
                {
                    data: 'unitname',
                    name: 'unitname'
                },
                {
                    data: 'unitcode',
                    name: 'unitcode'
                },
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
                                    Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                </button>

                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600
                                            menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                    data-kt-menu="true">
                            `;

                            @if(checkPrivilege(10,'edit'))
                            actions += `
                                <div class="menu-item px-3">
                                    <a href="#"
                                    class="menu-link px-3 editUnit"
                                    data-id="${row.idtbl_unit}">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                        <span class="menu-title">Edit</span>
                                    </a>
                                </div>
                            `;
                            @endif

                            @if(checkPrivilege(10,'statuschange'))
                            if (row.status == 1) {
                                actions += `
                                    <div class="menu-item px-3">
                                        <a href="#"
                                        class="menu-link px-3 deactivateUnit"
                                        data-id="${row.idtbl_unit}">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-ban"></i>
                                            </span>
                                            <span class="menu-title">Deactivate</span>
                                        </a>
                                    </div>
                                `;
                            } else {
                                actions += `
                                    <div class="menu-item px-3">
                                        <a href="#"
                                        class="menu-link px-3 activateUnit"
                                        data-id="${row.idtbl_unit}">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                            <span class="menu-title">Activate</span>
                                        </a>
                                    </div>
                                `;
                            }
                            @endif

                            @if(checkPrivilege(10,'remove'))
                            actions += `
                                <div class="menu-item px-3">
                                    <a href="#"
                                    class="menu-link px-3 deleteUnit"
                                    data-id="${row.idtbl_unit}">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </span>
                                        <span class="menu-title">Delete</span>
                                    </a>
                                </div>
                            `;
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
        $(document).on('click', '.editUnit', function () {
            let id = $(this).data('id');

            $.get(`/materials/unit/${id}/edit`, function (res) {

                $('#recordID').val(res.idtbl_unit);
                $('#unit').val(res.unitname);
                $('#code').val(res.unitcode);

                $('#submitBtn').text('Update');

                $('#unitForm').attr('action', `/materials/unit/${id}`);

                if ($('#unitForm input[name="_method"]').length === 0) {
                    $('#unitForm').append('<input type="hidden" name="_method" value="PUT">');
                }
            });
        });

        // DELETE
        $(document).on('click', '.deleteUnit', function (e) {
            e.preventDefault();

            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This will delete the unit!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: `/materials/unit/${id}`,
                        type: 'DELETE',
                        success: function (response) {

                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );

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

                $.post(`/materials/unit/${id}/status`, {
                    status: status
                })
                .done(function (res) {

                    Swal.fire(
                        'Success',
                        res.message,
                        'success'
                    );

                    table.ajax.reload(null, false);
                })
                .fail(function () {

                    Swal.fire(
                        'Error',
                        'Action failed',
                        'error'
                    );
                });
            });
        }

        $(document).on('click', '.activateUnit', function () {
            updateStatus($(this).data('id'), 1, 'This will activate the unit!');
        });

        $(document).on('click', '.deactivateUnit', function () {
            updateStatus($(this).data('id'), 2, 'This will deactivate the unit!');
        });

        // RESET
        $('#resetBtn').on('click', function () {
            $('#unitForm')[0].reset();
            $('#unitForm').attr('action', "{{ route('materials.unit.store') }}");
            $('#unitForm input[name="_method"]').remove();
            $('#submitBtn').text('Add');
        });

    });

</script>
@endsection