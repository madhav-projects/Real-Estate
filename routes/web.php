<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RealtronController;
use App\Http\Controllers\SellerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[IndexController::class,'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//register part
Route::get('/home',[HomeController::class,'index']);
Route::get('/realtronregister',[RealtronController::class,'viewregister'])->name('register.agentregistration');
Route::post('/createregister',[RealtronController::class,'createregister']);
Route::post('/createagentregister',[RealtronController::class,'createagentregister']);

//adminpart
Route::get('/Realtrondetail',[AdminController::class,'realtrondetails']);//realtron details fetch by admin site
Route::post('/Approve_detail/{id}',[RealtronController::class,'approve_detail']);//approve and reject written in realtron controller
Route::post('/Reject_detail/{id}',[RealtronController::class,'reject_detail']);


//realtron part
Route::get('/showagentregister', [RealtronController::class, 'showagent']);//here fetch the agent details in realtron page
Route::post('/Approve_detailagent/{id}',[RealtronController::class,'approve_detailagent']);//approve and reject written in realtron controller
Route::post('/Reject_detailagent/{id}',[RealtronController::class,'reject_detailagent']);

Route::get('/viewuser_request',[RealtronController::class,'userrequest'])->name('viewuser_request');//usersite request will be show in companysite
Route::post('/assign_agent', [RealtronController::class, 'assignAgent'])->name('assign_agent');//here taske will be assing to particular agent in that company


//agent part
Route::get('/selecttype',[AdminController::class,'selecttype']);//this for view page
Route::post('/addcategory',[AdminController::class,'addcategory']);
Route::get('/show_category',[AdminController::class,'showcategory']);
Route::delete('/delete_category/{id}', [AdminController::class, 'deleteCategory']);

Route::get('/view_properties', [AdminController::class, 'view_properties']);

Route::post('/add_property',[AdminController::class,'addproperty']);
Route::get('/show_properties',[AdminController::class,'show_properties']);
Route::get('/edit_property',[AdminController::class,'editProperty']);

//user controller
Route::get('/view_seller',[SellerController::class,'viewseller']);
Route::get('/seller_contact/{id}',[SellerController::class,'sellercontact']);
Route::post('/create_selleruser',[SellerController::class,'createseller']);

require __DIR__.'/auth.php';
