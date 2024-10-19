@extends('layouts.admin')
@section('content')

    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    @can('permission_create')
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                                    {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                                </a>
                            </div>
                        </div>
                    @endcan
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Roles
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->


    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-10">
        <div class="card-header">
            {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Permission">
                <thead>
                <tr>
                    <th width="10"></th>
                    <th>{{ trans('cruds.permission.fields.id') }}</th>
                    <th>{{ trans('cruds.permission.fields.title') }}</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>        </div>
    </div>        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            @can('permission_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.permissions.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    let ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id;
                    });
                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}');
                        return;
                    }
                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: { 'x-csrf-token': _token },
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }
                        }).done(function () { location.reload(); });
                    }
                }
            };
            dtButtons.push(deleteButton);
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.permissions.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                pageLength: 10,
                responsive: true,
            };

            let table = $('.datatable-Permission').DataTable(dtOverrideGlobals);
        });
    </script>
@endsection
