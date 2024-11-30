<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('biodata', BiodataController::class);
    Route::get('/overview/{id}', [OverviewController::class, 'show'])->name('user.overview');
    Route::get('/settings/{id}', [BiodataController::class, 'show'])->name('user.settings');
    Route::post('ajaxemailupdate', [BiodataController::class, 'ajaxemailupdate']);
    Route::post('ajaxpasswordupdate', [BiodataController::class, 'ajaxpasswordupdate']);
    Route::resource('permissions', PermissionController::class);
    Route::get('/adduser/{id}', [RoleController::class, 'adduser'])->name('roles.adduser');
    Route::get('/updateuserrole', [RoleController::class, 'updateuserrole'])->name('roles.updateuserrole');
    Route::get('/userid/{userid}/roleid/{roleid}', [RoleController::class, 'removeuserrole'])->name('roles.removeuserrole');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class);
    Route::delete('/deletecategory/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::resource('brand', BrandController::class);
    Route::delete('/deletebrand/{id}', [CategoryController::class, 'destroy'])->name('brand.destroy');

    Route::resource('customer', CustomerController::class);
    Route::resource('invoice', InvoiceController::class);
    Route::resource('pos', PosController::class);

    Route::resource('product', ProductController::class);
    Route::delete('/deleteproduct/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::resource('report', ReportController::class);
    Route::resource('return', ReturnController::class);

    Route::resource('sale', SaleController::class);

    Route::resource('store', WarehouseController::class);
    Route::delete('/deletestore/{id}', [WarehouseController::class, 'destroy'])->name('store.destroy');

    Route::resource('tag', TagController::class);
    Route::delete('/deletetag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

    Route::resource('unit', UnitController::class);
    Route::delete('/deleteunit/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');

    Route::resource('variant', VariantController::class);
    Route::delete('/deletevariant/{id}', [VariantController::class, 'destroy'])->name('variant.destroy');

    Route::resource('pos', PosController::class);

    Route::resource('stocks', StockController::class);

    Route::resource('orders', OrderController::class);

    Route::resource('sales', SaleController::class);



    Route::resource('customers', CustomerController::class);


    Route::resource('payments', PaymentController::class);



    Route::resource('payments', OrderController::class);

});
