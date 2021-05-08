<?php

use App\Actions\Fortify\AdminTwoFactorAuthenticationController;
use App\Http\Controllers\Admin\AnnauncementController;
use App\Http\Controllers\Admin\ForgotePassword;
use App\Http\Controllers\Admin\ForgotePasswordController;
use App\Http\Controllers\Admin\Login\AdminApprovalController;
use App\Http\Controllers\Admin\Login\AdminLoginController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PrincipalDeskController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TopbarController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VisionController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class,'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//Admin Route Are Here
Route::middleware(['auth.admin:admin', 'verified'])->get('/admin/dashboard', function () {
    return view('Admin.dashboard');
})->name('admin.dashboard');


Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminLoginController::class, 'AdminLoginForm']);
    Route::post('/login', [AdminLoginController::class, 'store'])->name('admin.login');
    Route::get('/register', [AdminLoginController::class, 'AdminRegisterForm']);
    Route::post('/register', [AdminLoginController::class, 'storeForm'])->name('admin.register');
});

Route::post('admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout')->middleware('auth.admin:admin');

Route::middleware(['auth.admin:admin', 'verified'])->group(function () {
    Route::get('/approval', [AdminApprovalController::class, 'approval'])->name('approval');
    Route::middleware(['approval'])->group(function () {
        Route::get('/admin/dashboard', [AdminApprovalController::class, 'admin'])->name('admin.dashboard');
    });
    Route::middleware(['admincheck'])->group(function () {
        Route::get('/approval', [AdminApprovalController::class, 'approval'])->name('approval');
    });
});


// logo routes
Route::get('admin/logo', [TopbarController::class, 'logo'])->name('logo');
Route::get('admin/logo/edit/{id}', [TopbarController::class, 'logoEdit'])->name('logo.edit');
Route::post('admin/logo/update/{id}', [TopbarController::class, 'logoUpdate']);

//topbar routes
Route::get('admin/topbar', [TopbarController::class, 'index'])->name('topbar');
Route::get('admin/topbar/edit/{id}', [TopbarController::class, 'edit'])->name('topbar.edit');
Route::post('admin/topbar/update/{id}', [TopbarController::class, 'update']);

//slider routes
Route::get('admin/slider', [SliderController::class, 'index'])->name('slider');
Route::get('admin/slider/create', [SliderController::class, 'create'])->name('slider.create');
Route::post('admin/slider/store', [SliderController::class, 'store'])->name('slider.store');
Route::get('admin/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('admin/slider/update/{id}', [SliderController::class, 'update']);
Route::get('admin/slider/published/{id}', [SliderController::class, 'publish']);
Route::get('admin/slider/unpublished/{id}', [SliderController::class, 'unpublish']);
Route::get('admin/slider/delete/{id}', [SliderController::class, 'destroy']);

//annauncement routes
Route::get('admin/annauncement', [AnnauncementController::class, 'index'])->name('annauncement');
Route::get('admin/annauncement/create', [AnnauncementController::class, 'create'])->name('annauncement.create');
Route::post('admin/annauncement/store', [AnnauncementController::class, 'store'])->name('annauncement.store');
Route::get('admin/annauncement/edit/{id}', [AnnauncementController::class, 'edit'])->name('annauncement.edit');
Route::post('admin/annauncement/update/{id}', [AnnauncementController::class, 'update']);
Route::get('admin/annauncement/unpublish/{id}', [AnnauncementController::class, 'unpublish']);
Route::get('admin/annauncement/publish/{id}', [AnnauncementController::class, 'publish']);
Route::get('admin/annauncement/delete/{id}', [AnnauncementController::class, 'destroy']);

//vision routes
Route::get('admin/vision', [VisionController::class, 'index'])->name('vision');
Route::get('admin/vision/edit/{id}', [VisionController::class, 'edit'])->name('vision.edit');
Route::post('admin/vision/update/{id}', [VisionController::class, 'update']);
Route::get('admin/vision/unpublish/{id}', [VisionController::class, 'unpublish']);
Route::get('admin/vision/publish/{id}', [VisionController::class, 'publish']);
Route::get('admin/vision/delete/{id}', [VisionController::class, 'destroy']);
//mission routes
Route::get('admin/mission', [MissionController::class, 'index'])->name('mission');
Route::get('admin/mission/edit/{id}', [MissionController::class, 'edit'])->name('mission.edit');
Route::post('admin/mission/update/{id}', [MissionController::class, 'update']);
Route::get('admin/mission/delete/{id}', [MissionController::class, 'destroy']);
Route::get('admin/mission/unpublish/{id}', [MissionController::class, 'unpublish']);
Route::get('admin/mission/publish/{id}', [MissionController::class, 'publish']);
//principal routes
Route::get('admin/principal', [PrincipalDeskController::class, 'index'])->name('principal');
Route::post('admin/principal/update/{id}', [PrincipalDeskController::class, 'update']);
Route::get('admin/principal/edit/{id}', [PrincipalDeskController::class, 'edit'])->name('principal.edit');
Route::get('admin/principal/unpublish/{id}', [PrincipalDeskController::class, 'unpublish']);
Route::get('admin/principal/publish/{id}', [PrincipalDeskController::class, 'publish']);
//users routes
Route::get('admin/users/', [UserController::class, 'index'])->name('users');
Route::get('admin/users/create', [UserController::class, 'create'])->name('user.create');
Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('admin/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('admin/users/active/{id}', [UserController::class, 'active']);
Route::get('admin/users/inactive/{id}', [UserController::class, 'inactive']);
Route::get('admin/user/softdelete/{id}', [UserController::class, 'softdestroy']);
Route::get('admin/user/undo/{id}', [UserController::class, 'undo']);
Route::get('admin/user/fdelete/{id}', [UserController::class, 'fdelete']);
Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.Store');

//role routes
Route::get('admin/role', [RoleController::class, 'index'])->name('role');
Route::get('admin/role/create',[RoleController::class,'create'])->name('role.create');
Route::post('admin/role/store',[RoleController::class,'store'])->name('role.store');
Route::get('admin/role/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
Route::post('admin/role/update/{id}',[RoleController::class,'update']);
Route::get('admin/role/delete/{id}',[RoleController::class,'destroy']);
//permission route
Route::get('admin/permission',[PermissionController::class,'index'])->name('permission');
Route::get('admin/permission/create',[PermissionController::class,'create'])->name('permission.create');
Route::post('admin/permission/store',[PermissionController::class,'store'])->name('permission.store');
Route::get('admin/permission/delete/{id}',[PermissionController::class,'destroy']);
Route::get('admin/permission/edit/{id}',[PermissionController::class,'edit'])->name('permission.edit');
Route::post('admin/permission/update/{id}',[PermissionController::class,'update']);

//Profile Routes

Route::get('admin/profile', [ProfileController::class, 'show'])->name('admin.profile.show');

Route::post('admin/profile/update',[ProfileController::class,'update'])->name('profile.update');
Route::post('admin/pass',[ProfileController::class,'UpdatePassword'])->name('profile.passwordupdate');
Route::post('admin/logoutOtherDevices',[ProfileController::class,'logoutOtherDevices'])->name('logoutOtherDevices');

//forgot password route
Route::get('admin/forgot-password',[ForgotePasswordController::class,'resetForm'])->name('reset');
Route::post('admin/forgot-password',[ForgotePasswordController::class,'sendMail'])->name('sendMail');
Route::get('admin/reset-password/{token}',[ForgotePasswordController::class,'getPassword'])->name('token');
Route::post('admin/reset-password/{token}',[ForgotePasswordController::class,'updatePassword'])->name('update.password');

Route::post('admin/two-factor-authentication',[AdminTwoFactorAuthenticationController::class,'store']);