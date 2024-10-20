<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AuditLogsController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'auth.gates']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resources([
        'permissions' => PermissionsController::class,
        'roles' => RolesController::class,
        'users' => UsersController::class,
    ]);
    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class,'massDestroy'])->name('permissions.massDestroy');
    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    // Users
    Route::delete('users/destroy', [UsersController::class,'massDestroy'])->name('users.massDestroy');

    // Audit Logs
//    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
    Route::get('audit-logs', [AuditLogsController::class, 'index'])->name('audit-logs.index');
    Route::get('audit-logs/{audit_log}', [AuditLogsController::class, 'show'])->name('audit-logs.show');
//    Route::delete('audit-logs/{audit_log}', [AuditLogsController::class, 'destroy'])->name('audit-logs.destroy');
});

