@extends('base.master')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <!-- Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">
                    Material Category
                </h1>
                <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Materials</li>
                    <li class="breadcrumb-item text-muted">Category</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <!-- FORM (TOP) -->
            @if(hasAnyPrivilege(8, ['add','edit']))
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="card-title fw-bold">Material Category</h3>
                </div>

                <div class="card-body">
                    <form id="categoryForm" method="POST" action="{{ route('materials.category.store') }}">
                        @csrf

                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="form-label required">Category Name</label>
                                <input type="text" name="category" id="category" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label required">Category Code</label>
                                <input type="text" name="code" id="code" class="form-control" required>
                            </div>
                        </div>

                        <input type="hidden" name="recordOption" id="recordOption" value="1">
                        <input type="hidden" name="recordID" id="recordID">

                        <div class="d-flex justify-content-end mt-5">
                            <button type="reset" id="resetBtn" class="btn btn-light me-3">Clear</button>
                            <button type="submit" id="submitBtn" class="btn btn-primary">Add</button>
                        </div>

                    </form>
                </div>
            </div>
            @endif


            <!-- TABLE (BOTTOM) -->
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"></i>
                            <input type="text"
                                   data-kt-table-filter="search"
                                   class="form-control form-control-solid w-250px ps-13"
                                   placeholder="Search">
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="dataTable">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Code</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('materials.category.data') }}",
            columns: [
                {
                    data: 'categoryname',
                    name: 'categoryname'
                },
                {
                    data: 'categorycode',
                    name: 'categorycode'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                    render: function (data) {
                        return data == 1
                            ? '<div class="badge badge-light-success">Active</div>'
                            : '<div class="badge badge-light-warning">Inactive</div>';
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

                        @if(checkPrivilege(8,'edit'))
                        actions += `
                            <div class="menu-item px-3">
                                <a href="#"
                                   class="menu-link px-3 editCategory"
                                   data-id="${row.idtbl_material_category}">
                                    <span class="menu-icon">
                                        <i class="fa-solid fa-pen"></i>
                                    </span>
                                    <span class="menu-title">Edit</span>
                                </a>
                            </div>
                        `;
                        @endif

                        @if(checkPrivilege(8,'statuschange'))
                        if (row.status == 1) {
                            actions += `
                                <div class="menu-item px-3">
                                    <a href="#"
                                       class="menu-link px-3 deactivateCategory"
                                       data-id="${row.idtbl_material_category}">
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
                                       class="menu-link px-3 activateCategory"
                                       data-id="${row.idtbl_material_category}">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <span class="menu-title">Activate</span>
                                    </a>
                                </div>
                            `;
                        }
                        @endif

                        @if(checkPrivilege(8,'remove'))
                        actions += `
                            <div class="menu-item px-3">
                                <a href="#"
                                   class="menu-link px-3 deleteCategory"
                                   data-id="${row.idtbl_material_category}">
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
            dom: "<'row mb-3'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end w-80'B>>" +
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
            drawCallback: function () {
                KTMenu.createInstances();
            }
        });

        $("input[data-kt-table-filter='search']").on('keyup change', function () {
            table.search(this.value).draw();
        });

        // Edit
        $(document).on('click', '.editCategory', function (e) {
            e.preventDefault();

            let id = $(this).data('id');

            $.get(`/materials/category/${id}/edit`, function (res) {

                $('#recordID').val(res.idtbl_material_category);
                $('#category').val(res.categoryname);
                $('#code').val(res.categorycode);

                $('#submitBtn').text('Update');

                if ($('#categoryForm input[name="_method"]').length === 0) {
                    $('#categoryForm').append(
                        '<input type="hidden" name="_method" value="PUT">'
                    );
                }

                $('#categoryForm').attr(
                    'action',
                    `/materials/category/${id}`
                );

                $('html, body').animate({
                    scrollTop: $('#categoryForm').offset().top - 100
                }, 400);
            });
        });

        // Delete
        $(document).on('click', '.deleteCategory', function (e) {
            e.preventDefault();

            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This will delete the category!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: `/materials/category/${id}`,
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

        // Status Change
        function updateStatus(id, status, text) {

            Swal.fire({
                title: 'Are you sure?',
                text: text,
                icon: 'warning',
                showCancelButton: true
            }).then((result) => {

                if (!result.isConfirmed) return;

                $.post(`/materials/category/${id}/status`, {
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

        $(document).on('click', '.activateCategory', function (e) {
            e.preventDefault();
            updateStatus($(this).data('id'), 1, 'Activate this category?');
        });

        $(document).on('click', '.deactivateCategory', function (e) {
            e.preventDefault();
            updateStatus($(this).data('id'), 2, 'Deactivate this category?');
        });

        // Reset Form
        $('#resetBtn').on('click', function () {

            $('#categoryForm')[0].reset();

            $('#categoryForm').attr(
                'action',
                "{{ route('materials.category.store') }}"
            );

            $('#categoryForm input[name="_method"]').remove();

            $('#submitBtn').text('Add');
        });

    });

</script>
@endsection