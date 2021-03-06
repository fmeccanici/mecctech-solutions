<?php

use App\CustomerRelationshipManagement\Presentation\Http\CustomerRelationshipManagementController;
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

Route::get('/customerrelationshipmanagement', [CustomerRelationshipManagementController::class, 'index']);
Route::post('/submit-contact-request', [CustomerRelationshipManagementController::class, 'submitContactRequest'])->name('submit-contact-request');
