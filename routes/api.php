<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RealtronController;
use App\Http\Controllers\SellerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//register part
Route::get('/realtronregister',[RealtronController::class,'viewregister'])->name('register.agentregistration');
Route::post('/createregister',[RealtronController::class,'createregister']);//realtron register
Route::post('/createagentregister',[RealtronController::class,'createagentregister']);//agent register
Route::get('/showregister',[RealtronController::class,'showrealtron']);

//adminpart
Route::get('/Realtrondetail',[AdminController::class,'realtrondetails']);
Route::get('/view_properties',[AdminController::class,'view_properties']);
Route::post('/addcategory',[AdminController::class,'addcategory']);
Route::get('/show_category',[AdminController::class,'showcategory']);
Route::delete('/delete_category/{id}', [AdminController::class, 'deleteCategory']);


//realtron part
Route::get('/showagentregister', [RealtronController::class, 'showagent']);//here fetch the agent details in realtron page
Route::get('/viewuser_request',[RealtronController::class,'userrequest']);//usersite request will be show in companysite

Route::post('/assign_agent', [RealtronController::class, 'assignAgent'])->name('assign_agent');//here taske will be assing to particular agent in that company

//property parts
Route::get('/view_properties',[AdminController::class,'view_properties']);
Route::post('/add_property',[AdminController::class,'addproperty']);
Route::get('/show_properties',[AdminController::class,'show_properties']);
Route::get('/edit_property/{id}',[AdminController::class,'editProperty']);
Route::get('/update_property/{id}',[AdminController::class,'updateProperty']);

//user part
Route::get('/view_seller',[SellerController::class,'viewseller']);
Route::post('/create_selleruser',[SellerController::class,'createseller']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
