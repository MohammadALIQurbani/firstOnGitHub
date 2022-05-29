<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\EmployeerAccountController;
use App\Http\Controllers\EmployeerController;
use App\Http\Controllers\FunctionAreaController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\PublicJobListController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(EmployeerController::class)->group(function(){
   Route::get('/employeer','index')->name('employeer.index');
   Route::get('/user/{user:name}/edit','edit')->name('user.edit');
   Route::patch('/user/{user}','update')->name('user.update');
   Route::get('/user/{user:name}','show')->name('user.show');
   Route::get('/employeerPost', 'employeerPost')->name('employeerPost.index');
    Route::get('/employeerPost/deactive', 'employeerDeactivePost')->name('employeerDeactivePost.index');
   Route::get('/profile','employeeProfile')->name('employeer.profile');

});
Route::get('/admin/create/account',[AccountController::class,'index'])->name('admin.create.account');

Route::controller(EmployeerAccountController::class)->group(function(){
    Route::get('/employeerAccount','index')->name('employeerAccount.index');
    Route::get('/employeerAccount/{employeer}/create','create')->name('employeerAaccount.create');
    Route::post('/employeeAccount','store')->name('employeeAccount.store');
    Route::get('/employeeAccount/list','accountList')->name('employeerAccount.accountList');
    Route::get('/employeerAccount/{user:name}','show')->name('employeerAccount.show');
    Route::get('/employeer/send/mail','mail')->name('send.employeer.mail');
    Route::post('/employeer/send/mail', 'sendMail')->name('sendMail');
});

Route::controller(FunctionAreaController::class)->group(function(){
    Route::get('/functionArea','index')->name('FunctionArea.index');
    Route::post('/functionArea','store')->name('FunctionArea.store');
    Route::patch('/functionArea/{functionArea}','update')->name('FunctionArea.update');
    Route::delete('/functionArea/{functionArea}','destroy')->name('FunctionArea.delete');
});

Route::controller(JobPostController::class)->group(function(){
    Route::get('/jobPost','index')->name('jobPost.index');
    Route::get('/jobPost/create','create')->name('jobPost.create');
    Route::get('/jobPost/{user:name}/post','createPost')->name('jobpost.user.create');
    Route::post('/jobPost/{user}','store')->name('jobPost.store');
    Route::get('/jobPost/{jobPost:title}', 'show')->name('jobPost.show');
    Route::get('/jobPost/{jobPost:title}/edit','edit')->name('jobPost.edit');
    Route::patch('/jopPost/{jobPost}','update')->name('jobPost.update');
    Route::patch('/deactive/jopPost/{jobPost}', 'deactive')->name('jobPost.deactive');
    Route::get('/deactive/jobPost','deactivePost')->name('jobpost.deactive.index');
    Route::patch('/active/jopPost/{jobPost}', 'active')->name('jobPost.active');


});

Route::controller(PublicJobListController::class)->group(function(){
    Route::get('/job/details/{jobPost:title}','details')->name('job.post.details');
});

Route::controller(AdController::class)->group(function(){
    Route::get('/ad','index')->name('ad.index');
    Route::get('/ad/create','create')->name('ad.create');
    Route::post('/ad','store')->name('ad.store');
    Route::get('/ad/{ad}/edit','edit')->name('ad.edit');
    Route::patch('/ad/{ad}','update')->name('ad.update');
    Route::delete('/ad/{ad}','destroy')->name('ad.delete');
    Route::patch('/deactive/{ad}','deactive')->name('ad.deactive');
    Route::get('/acitve/ad','activeAd')->name('ad.active.index');
    Route::patch('/actived/{ad}', 'actived')->name('ad.actived');
});

Route::controller(IncomeController::class)->group(function(){
    Route::get('/income','income')->name('jobpost.income');
});