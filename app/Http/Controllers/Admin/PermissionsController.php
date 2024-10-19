<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $permissions = Permission::get(); // Modify as per your actual fields

            return datatables()->of($permissions)
                ->addColumn('placeholder', function() {
                    return '';
                })
                ->addColumn('actions', function ($row) {
                    return view('partials.datatablesActions', [
                        'row' => $row,
                        'crudRoutePart' => 'permissions', // Update accordingly
                        'viewGate' => 'permission_show',
                        'editGate' => 'permission_edit',
                        'deleteGate' => 'permission_delete',
                    ]);
                })
                ->make(true);
        }

        return view('admin.permissions.index');
    }


    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        return redirect()->route('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('admin.permissions.index');
    }

    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        $permissions = Permission::find(request('ids'));

        foreach ($permissions as $permission) {
            $permission->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
