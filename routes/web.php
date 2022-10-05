<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExportImportController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ShelfController;
use App\Http\Controllers\Admin\TransferController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Admin\WarehouseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});
Route::get('/locale/{lang}', [LocalizationController::class, 'setLang']);

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    DashboardController::Routes();
    CalendarController::Routes();
    WarehouseController::Routes();
    InventoryController::Routes();
    CategoryController::Routes();
    BankController::Routes();
    ExportImportController::Routes();
    ItemController::Routes();
    InvoiceController::Routes();
    ShelfController::Routes();
    TransferController::Routes();
    UnitController::Routes();
    AccountController::Routes();
});
