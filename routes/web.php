<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\BackendAdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('/auth/login');
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::group(['controller' => AdminController::class], function () {

        Route::get('/admin/dashboard', 'AdminDashboard')->name('adminDash');

        Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/admin/logout', 'AdminDestroy')->name('admin.logout');
    });


    Route::group(['controller' => BackendAdminController::class], function () {

        Route::post('/user/store/', 'UserStore')->name('user.store');
        Route::get('/user/index/', 'index')->name('user.index');
        Route::get('/user/{id}/edit/','UserEdit')->name('user.edit');
        Route::delete('/user/delete/{id}/','UserDelete')->name('user.delete');

        Route::get('/get/data/members/', 'GetDataMembers')->name('get.data.members');
        Route::get('/member/{id}/edit/','MemberEdit')->name('member.edit');
        Route::delete('/member/delete/{id}/','MemberDelete')->name('member.delete');

        Route::get('/departments/index/','departmentsIndex')->name('departments.index');
        Route::post('/departments/store/','DepartmentsStore')->name('departments.store');

        Route::post('/Member/store/','MemberStore')->name('Member.store');
        Route::get('/all/departments','AllDepartment')->name('all.departments');
        Route::get('/student-all/ajax/{AllCourse}','StudentAllAjax');
    });
   
});


Route::middleware(['auth', 'role:user'])->group(function () {

    Route::group(['controller' => UserController::class], function () {

        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/user/logout','UserDestroy')->name('user.logout');

        Route::get('/user/account/page','UserAccount')->name('user.account.page');

        Route::post('/user/profile/store','UserProfileStore')->name('user.profile.store');
    });

});
