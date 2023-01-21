<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\SignaturePadController;

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
    return view('welcome');
});
Route::get('signature-pad', [SignaturePadController::class, 'index']);
Route::post('signature-pad', [SignaturePadController::class, 'save'])->name('signpad.save');
Route::get('signature_pad', [SignatureController::class, 'index']);
Route::post('signature_pad', [SignatureController::class, 'store'])->name('signature_pad.store');
