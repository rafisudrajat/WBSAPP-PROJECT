<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User_test;
use App\Http\Controllers\EntranceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailProject;
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
//     return view('login');
// });
// For Testing
// Route::get('/testrole', [User_test::class, 'addSPRole']);
// Route::get('/testuser', [User_test::class, 'addUser']);


Route::post('/', [EntranceController::class, 'Login_submit'])->name('login.submit');
Route::post('/register', [EntranceController::class, 'Regist_submit'])->name('register.submit');

Route::get('/logout', [EntranceController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/register', [EntranceController::class, 'Regist_index'])->name('register.index');
    Route::get('/', [EntranceController::class, 'Login_index'])->name('login.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/addNewProject', [DashboardController::class, 'NewProjectForm'])->name('dashboard.NewProjectForm');
    Route::post('/addNewProject', [DashboardController::class, 'SubmitNewProject'])->name('dashboard.SubmitNewProject');
    Route::post('/addProjectType', [DashboardController::class, 'add_ProjectType'])->name('dashboard.add_ProjectType');
    Route::post('/addProjectCategory', [DashboardController::class, 'add_ProjectCategory'])->name('dashboard.add_ProjectCategory');
    Route::get('/projectDetails', [DetailProject::class, 'index'])->name('detailProject');
    Route::get('/searchMember', [DetailProject::class, 'searchMember'])->name('detailProject.searchMember');
    Route::post('/addMember', [DetailProject::class, 'addMember'])->name('detailProject.addMember');
    Route::post('/delMember', [DetailProject::class, 'deleteMember'])->name('detailProject.delMember');
    Route::get('/queryCT', [DetailProject::class, 'queryCategory_Type'])->name('detailProject.queryCT');
    Route::post('/editProject', [DetailProject::class, 'editProject'])->name('detailProject.editProject');
});
