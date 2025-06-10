<?php

use App\Http\Controllers\MobileAgentController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PrioritiesController;
use App\Http\Controllers\ComplaintTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\SubTownController;
use App\Http\Controllers\SubTypeController;
use App\Http\Controllers\DistrictController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentHomeController;

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

Route::get('/',function()
{
    return view('tab');
})->name('web.home');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'redirect_page'])->name('auth.home');
});
Route::get('/track/complaint',[FrontendController::class, 'track_complaint'])->name('track.complaint');
Route::get('/add/complaint',[FrontendController::class, 'create_compalint'])->name('front.home');
Route::get('/anonymous/complaint',[FrontendController::class, 'anonymous'])->name('front.anonymous');
Route::get('/add/new/connection',[FrontendController::class, 'create_connection_request'])->name('front.home.connection');
Route::get('/update/connection/data',[FrontendController::class, 'create_connection_request'])->name('update.home.connection');
Route::post('/complaint/store',[FrontendController::class, 'store'])->name('front.compalaint.store');
Route::get('/subtown/by/town', [SubTownController::class, 'get_subtown'])->name('subtown.by.town');
Route::get('/subtype/by/type', [SubTypeController::class, 'get_subtype'])->name('subtype.by.type');

Auth::routes();

//users
Route::prefix('/admin')->group(function (){
    Route::middleware(['IsAdmin'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('/user-management', UserController::class, ['as' => 'admin']);
        Route::resource('/agent-management', MobileAgentController::class, ['as' => 'admin']);
        Route::get('/agent-management/details/{id}',[MobileAgentController::class,'detail'])->name('admin.agent-management.details');
        Route::get('/assign-complaints/{agentId}/{complaintId}',[ComplaintController::class,'assign_complaint'])->name('complaints.assign');
        Route::resource('/town-management', TownController::class, ['as' => 'admin']);
        Route::resource('/subtown-management', SubTownController::class, ['as' => 'admin']);
        Route::resource('/compaints-management', ComplaintController::class, ['as' => 'admin']);
        Route::resource('/priorities-management', PrioritiesController::class, ['as' => 'admin']);
        Route::resource('/subtype-management', SubTypeController::class, ['as' => 'admin']);
        Route::resource('/source-management', SourceController::class, ['as' => 'admin']);
        Route::resource('/compaints-type-management', ComplaintTypeController::class, ['as' => 'admin']);
        Route::get('/compaints-management/details/{id}',[ComplaintController::class,'detail'])->name('admin.compaints-management.details');
        Route::resource('/customer-management', CustomerController::class, ['as' => 'admin']);
        Route::resource('departments', DepartmentController::class, ['as' => 'admin']);


        Route::get('/compaints-reports/reports', [ComplaintController::class, 'generate_report'])->name('compaints-reports.reports');
        Route::get('/compaints-reports/reports2', [ComplaintController::class, 'generate_report2'])->name('compaints-reports.reports2');
        Route::get('/compaints-reports/reports3', [ComplaintController::class, 'generate_report3'])->name('compaints-reports.reports3');
        Route::get('/compaints-reports/reports4', [ComplaintController::class, 'generate_report4'])->name('compaints-reports.reports4');
        Route::get('/compaints-reports/reports5', [ComplaintController::class, 'generate_report5'])->name('compaints-reports.reports5');
        Route::get('/compaints-reports/reports6', [ComplaintController::class, 'generate_report6'])->name('compaints-reports.reports6');
        Route::get('/compaints-reports/reports7', [ComplaintController::class, 'generate_report7'])->name('compaints-reports.reports7');
        Route::get('/compaints-reports/reports8', [ComplaintController::class, 'generate_report8'])->name('compaints-reports.reports8');
        Route::get('/compaints-reports/reports9', [ComplaintController::class, 'generate_report9'])->name('compaints-reports.reports9');
        Route::get('/compaints-reports/reports10', [ComplaintController::class, 'generate_report10'])->name('compaints-reports.reports10');
        Route::get('/compaints-reports/reports11', [ComplaintController::class, 'generate_report11'])->name('compaints-reports.reports11');
        Route::get('/compaints-reports/reports12', [ComplaintController::class, 'generate_report12'])->name('compaints-reports.reports12');
        Route::get('/compaints-reports/reports13', [ComplaintController::class, 'generate_report13'])->name('compaints-reports.reports13');
        Route::get('/reports', [ComplaintController::class, 'report'])->name('admin.reports');

        Route::resource('districts', DistrictController::class, ['as' => 'admin']);


    });
});
Route::prefix('/department')->group(function () {
    Route::middleware(['IsDepartment'])->group(function () {
        //users
        Route::get('/home', [DepartmentHomeController::class,'home'])->name('department.home');
        Route::get('/compaints-management', [ComplaintController::class,'index'])->name('deparment.complaint.index');
        Route::get('/compaints-management/{id}/edit', [ComplaintController::class,'edit'])->name('deparment.complaint.edit');
        Route::put('/compaints-management/{id}/update', [ComplaintController::class,'update'])->name('deparment.complaint.update');
        Route::get('/compaints/details/{id}', [ComplaintController::class,'detail'])->name('deparment.complaint.detail');
        Route::post('/compaints/solved/{id}', [ComplaintController::class,'solved_by_department'])->name('deparment.complaint.solved');

    });
});
Route::prefix('/system')->group(function (){
    Route::middleware(['IsSystemUser'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('system.home');
        Route::resource('/agent-management', MobileAgentController::class, ['as' => 'system']);
        Route::get('/agent-management/details/{id}',[MobileAgentController::class,'detail'])->name('system.agent-management.details');
        Route::resource('/town-management', TownController::class, ['as' => 'system']);
        Route::resource('/subtown-management', SubTownController::class, ['as' => 'system']);
        Route::resource('/compaints-management', ComplaintController::class, ['as' => 'system']);
        Route::resource('/compaints-type-management', ComplaintTypeController::class, ['as' => 'system']);
        Route::get('/compaints-reports/reports',[ComplaintController::class,'generate_report'])->name('system.compaints-reports.reports');
        Route::get('/reports',[ComplaintController::class,'report'])->name('reports');
        Route::resource('districts', DistrictController::class, ['as' => 'system']);

        Route::resource('/subtype-management', SubTypeController::class, ['as' => 'system']);
        Route::resource('/source-management', SourceController::class, ['as' => 'system']);

        Route::resource('/customer-management', CustomerController::class, ['as' => 'system']);
        Route::resource('/priorities-management', PrioritiesController::class, ['as' => 'system']);

        Route::get('/compaints-management/details/{id}',[ComplaintController::class,'detail'])->name('system.compaints-management.details');
    });
});
Route::prefix('/agent')->group(function (){
    Route::middleware(['IsAgent'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('agent.home');
        Route::get('/complaints-management', [ComplaintController::class, 'index'])->name('agent.complaints-management.index');

    });
});
