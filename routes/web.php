<?php

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
    return view('landing_page');
});



Route::get('/proceed_to_controller', [App\Http\Controllers\Landing_page_controller::class, 'proceed_to_controller'])->name('proceed_to_controller');
Route::post('/user_credential', [App\Http\Controllers\Landing_page_controller::class, 'user_credential'])->name('user_credential');


Route::get('/location_upload', [App\Http\Controllers\Location_controller::class, 'index'])->name('location_upload');
Route::post('/location_upload_process', [App\Http\Controllers\Location_controller::class, 'location_upload_process'])->name('location_upload_process');


Route::get('/principal_upload', [App\Http\Controllers\Principal_controller::class, 'index'])->name('principal_upload');
Route::post('/principal_upload_process', [App\Http\Controllers\Principal_controller::class, 'principal_upload_process'])->name('principal_upload_process');


Route::get('/customer_upload', [App\Http\Controllers\Customer_controller::class, 'index'])->name('customer_upload');
Route::post('/customer_upload_process', [App\Http\Controllers\Customer_controller::class, 'customer_upload_process'])->name('customer_upload_process');
Route::get('/customer_principal_code_upload', [App\Http\Controllers\Customer_controller::class, 'customer_principal_code_upload'])->name('customer_principal_code_upload');
Route::post('/customer_principal_code_upload_process', [App\Http\Controllers\Customer_controller::class, 'customer_principal_code_upload_process'])->name('customer_principal_code_upload_process');
Route::get('/customer_principal_price_upload', [App\Http\Controllers\Customer_controller::class, 'customer_principal_price_upload'])->name('customer_principal_price_upload');
Route::post('/customer_principal_price_upload_process', [App\Http\Controllers\Customer_controller::class, 'customer_principal_price_upload_process'])->name('customer_principal_price_upload_process');



Route::get('/inventory_upload', [App\Http\Controllers\Inventory_controller::class, 'index'])->name('inventory_upload');
Route::post('/inventory_upload_process', [App\Http\Controllers\Inventory_controller::class, 'inventory_upload_process'])->name('inventory_upload_process');

Route::get('/sales_register_upload', [App\Http\Controllers\Sales_register_controller::class, 'index'])->name('sales_register_upload');
Route::post('/sales_register_upload_process', [App\Http\Controllers\Sales_register_controller::class, 'sales_register_upload_process'])->name('sales_register_upload_process');




Route::get('/work_flow', [App\Http\Controllers\Work_flow_controller::class, 'index'])->name('work_flow');
Route::post('/work_flow_show_inventory', [App\Http\Controllers\Work_flow_controller::class, 'work_flow_show_inventory'])->name('work_flow_show_inventory');
Route::post('/work_flow_suggested_sales_order', [App\Http\Controllers\Work_flow_controller::class, 'work_flow_suggested_sales_order'])->name('work_flow_suggested_sales_order');
Route::post('/work_flow_final_summary', [App\Http\Controllers\Work_flow_controller::class, 'work_flow_final_summary'])->name('work_flow_final_summary');
Route::post('/work_flow_no_inventory', [App\Http\Controllers\Work_flow_controller::class, 'work_flow_no_inventory'])->name('work_flow_no_inventory');







