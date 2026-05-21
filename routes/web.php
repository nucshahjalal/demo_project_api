<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\VueVehicleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Sms\EmployeeController;
use App\Http\Controllers\Sms\ProductController;
use App\Http\Controllers\Sms\VehicleController;
use App\Http\Controllers\Sms\PortfolioController;
use App\Http\Controllers\Sms\ReportController;
use App\Http\Controllers\Sms\ItemController;
use App\Http\Controllers\uploadController;
use App\Http\Controllers\IdcardController;
use App\Http\Controllers\StudentController;
use App\Models\{Employee, Product, Current, Portfolio};

//student
Route::get('/student/create', [StudentController::class, 'index'])->name('student.create');
Route::post('/student/save', [StudentController::class, 'store'])->name('student.save');
Route::get('/idcard/create', [IdcardController::class, 'index'])->name('idcard.create');
Route::post('/idcard/save', [IdcardController::class, 'store'])->name('idcard.save');
Route::get('/card/print/{id}', [IdcardController::class, 'print'])->name('card.print');

Route::get('/vue/vehicle', [VueVehicleController::class, 'index'])->name('vue.vehicle');
Route::get('/vue/vehicle-data', [VueVehicleController::class, 'vehicleList']);
Route::get('/vue/vehicle-list', [VueVehicleController::class, 'create'])->name('vue.vehicle-list');
Route::post('/vehicle/save', [VueVehicleController::class, 'store']);
Route::get('/api/employees', function () {
    return \App\Models\Employee::where('status', 1)->get();
});
Route::post('/vue/vehicle/update-status', [VueVehicleController::class, 'updateStatus'])
    ->name('vue.vehicle.update-status');
Route::delete('/vue/vehicle/{id}', [VueVehicleController::class, 'destroy'])
    ->name('vue.vehicle.destroy');

Route::get('/vue/status_list', [VueVehicleController::class, 'getStatus'])->name('vue.status_list');
Route::get('/api/products', function () {
    return \App\Models\Product::where('status', 1)->get();
});
Route::get('/api/portfolios', function () {
    return \App\Models\Portfolio::where('status', 1)->get();
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [dashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// custom auth login route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';

// card
Route::get('/card/list/{studentId}', [dashboardController::class, 'showCard'])->name('card.list');

// notice pdf download
Route::get('/notice/download-pdf/{id}', [dashboardController::class, 'downloadNoticePdf'])->name('notice.download-pdf');

// employee
Route::get('/employee/list', [EmployeeController::class, 'index'])->name('employee.list');
Route::get('/employee/create', [EmployeeController::class, 'createForm'])->name('employee.create');
Route::post('/employee/save', [EmployeeController::class, 'store'])->name('employee.save');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'editForm'])->name('employee.edit');
Route::get('/employee/view/{id}', [EmployeeController::class, 'view'])->name('employee.view');
Route::post('/employee/update', [EmployeeController::class, 'update'])->name('employee.update');
Route::get('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::get('/vehicle/employee-history/{id}', [EmployeeController::class, 'empHistory'])->name('vehicle.employee-history');
Route::get('vehicle/employee-history/download-pdf/{emp_id}', [EmployeeController::class, 'empHistoryDownloadPdf']);

// product
Route::get('/product/list', [ProductController::class, 'index'])->name('product.list');
Route::get('/product/create', [ProductController::class, 'createForm'])->name('product.create');
Route::post('/product/save', [ProductController::class, 'store'])->name('product.save');
Route::get('/product/edit/{id}', [ProductController::class, 'editForm'])->name('product.edit');
Route::get('/product/view/{id}', [ProductController::class, 'view'])->name('product.view');
Route::post('/product/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// portfolio
Route::get('/portfolio/list', [PortfolioController::class, 'index'])->name('portfolio.list');
Route::get('/portfolio/create', [PortfolioController::class, 'createForm'])->name('portfolio.create');
Route::post('/portfolio/save', [PortfolioController::class, 'store'])->name('portfolio.save');
Route::get('/portfolio/edit/{id}', [PortfolioController::class, 'editForm'])->name('portfolio.edit');
Route::post('/portfolio/update', [PortfolioController::class, 'update'])->name('portfolio.update');
Route::get('/portfolio/delete/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');

// vehicle
Route::get('/vehicle/list', [VehicleController::class, 'index'])->name('vehicle.list');
Route::get('/vehicle/create', [VehicleController::class, 'createForm'])->name('vehicle.create');
Route::post('/vehicle/save', [VehicleController::class, 'store'])->name('vehicle.save');
Route::get('/vehicle/edit/{id}', [VehicleController::class, 'editForm'])->name('vehicle.edit');
Route::get('/vehicle/view/{id}', [VehicleController::class, 'view'])->name('vehicle.view');
Route::post('/vehicle/update', [VehicleController::class, 'update'])->name('vehicle.update');
Route::get('/vehicle/transfer/{id}', [VehicleController::class, 'transferForm'])->name('transfer.create');
Route::post('/vehicle/transfer', [VehicleController::class, 'vehicleTransfer'])->name('vehicle.transfer');

Route::get('/transfer-vehicle/list', [VehicleController::class, 'transferVehicle'])->name('transfer-vehicle.list');
Route::get('/employee-wise-vehicle/list', [VehicleController::class, 'empWiseVehicle'])->name('employee-wise-vehicle.list');
Route::get('/chassis-wise-vehicle/list', [VehicleController::class, 'chassisWiseVehicle'])->name('chassis-wise-vehicle.list');
Route::get('/vehicle/eligible-user/list', [VehicleController::class, 'eligibleUser'])->name('vehicle.eligible-user.list');
Route::get('/vehicle/assign-vehicle/list', [VehicleController::class, 'assignVehicle'])->name('vehicle.assign-vehicle.list');
Route::post('/vehicle/update-status', [VehicleController::class, 'updateStatus'])->name('vehicle.update-status');
Route::post('/vehicle/hand-over', [VehicleController::class, 'handOver'])->name('vehicle.hand-over');

// report print
Route::get('/vehicle/export', [ReportController::class, 'ongoingDownloadExcel'])->name('vehicle.export');
Route::get('/vehicle/download-pdf', [ReportController::class, 'ongoingDownloadPdf'])->name('vehicle.download-pdf');
Route::get('/transfer-vehicle/export', [ReportController::class, 'transferdDownloadExcel'])->name('transfer-vehicle.export');
Route::get('/transfer-vehicle/download-pdf', [ReportController::class, 'transferDownloadPdf'])->name('transfer-vehicle.download-pdf');
Route::get('/employee-wise-vehicle/export', [ReportController::class, 'empWiseDownloadExcel'])->name('employee-wise-vehicle.export');
Route::get('/employee-wise-vehicle/download-pdf', [ReportController::class, 'empWiseDownloadPdf'])->name('employee-wise-vehicle.download-pdf');
Route::get('/chassis-wise-vehicle/export', [ReportController::class, 'chassisWiseDownloadExcel'])->name('chassis-wise-vehicle.export');
Route::get('/chassis-wise-vehicle/download-pdf', [ReportController::class, 'chassisWiseDownloadPdf'])->name('chassis-wise-vehicle.download-pdf');
Route::get('/vehicle/eligible-user/export', [ReportController::class, 'eligibleUserDownloadExcel'])->name('vehicle.eligible-user.export');
Route::get('/vehicle/assign-vehicle/export', [ReportController::class, 'assignVehicleDownloadExcel'])->name('vehicle.assign-vehicle.export');
Route::get('/vehicle/eligible-user/download-pdf', [ReportController::class, 'eligibleUserDownloadPdf'])->name('vehicle.eligible-user.download-pdf');
Route::get('/vehicle/assign-vehicle/download-pdf', [ReportController::class, 'assignVehicleDownloadPdf'])->name('vehicle.assign-vehicle.download-pdf');

// item
Route::get('/item/list', [ItemController::class, 'index'])->name('item.list');
Route::get('/item/create', [ItemController::class, 'createForm'])->name('item.create');
Route::post('/item/save', [ItemController::class, 'store'])->name('item.save');
Route::get('/item/edit/{id}', [ItemController::class, 'editForm'])->name('item.edit');
Route::post('/item/update', [ItemController::class, 'update'])->name('item.update');
Route::get('/item/delete/{id}', [ItemController::class, 'destroy'])->name('item.destroy');

// file upload
Route::get('/upload/list', [uploadController::class, 'index'])->name('upload.list');
Route::post('file/upload', [uploadController::class, 'upload'])->name('file.upload');

// Admin Dashboard Content Management
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\InstituteHistoryController;
use App\Http\Controllers\Admin\SpeechController;
use App\Http\Controllers\Admin\AdmissionController;

// Slider
Route::get('/admin/slider/list', [SliderController::class, 'index'])->name('admin.slider.index');
Route::get('/admin/slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
Route::post('/admin/slider/save', [SliderController::class, 'store'])->name('admin.slider.store');
Route::get('/admin/slider/edit/{id}', [SliderController::class, 'edit'])->name('admin.slider.edit');
Route::post('/admin/slider/update', [SliderController::class, 'update'])->name('admin.slider.update');
Route::get('/admin/slider/delete/{id}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');

// Notice
Route::get('/admin/notice/list', [NoticeController::class, 'index'])->name('admin.notice.index');
Route::get('/admin/notice/create', [NoticeController::class, 'create'])->name('admin.notice.create');
Route::post('/admin/notice/save', [NoticeController::class, 'store'])->name('admin.notice.store');
Route::get('/admin/notice/edit/{id}', [NoticeController::class, 'edit'])->name('admin.notice.edit');
Route::post('/admin/notice/update', [NoticeController::class, 'update'])->name('admin.notice.update');
Route::get('/admin/notice/delete/{id}', [NoticeController::class, 'destroy'])->name('admin.notice.destroy');

// Institute History
Route::get('/admin/history/list', [InstituteHistoryController::class, 'index'])->name('admin.history.index');
Route::get('/admin/history/create', [InstituteHistoryController::class, 'create'])->name('admin.history.create');
Route::post('/admin/history/save', [InstituteHistoryController::class, 'store'])->name('admin.history.store');
Route::get('/admin/history/edit/{id}', [InstituteHistoryController::class, 'edit'])->name('admin.history.edit');
Route::post('/admin/history/update', [InstituteHistoryController::class, 'update'])->name('admin.history.update');
Route::get('/admin/history/delete/{id}', [InstituteHistoryController::class, 'destroy'])->name('admin.history.destroy');

// Speech
Route::get('/admin/speech/list', [SpeechController::class, 'index'])->name('admin.speech.index');
Route::get('/admin/speech/create', [SpeechController::class, 'create'])->name('admin.speech.create');
Route::post('/admin/speech/save', [SpeechController::class, 'store'])->name('admin.speech.store');
Route::get('/admin/speech/edit/{id}', [SpeechController::class, 'edit'])->name('admin.speech.edit');
Route::post('/admin/speech/update', [SpeechController::class, 'update'])->name('admin.speech.update');
Route::get('/admin/speech/delete/{id}', [SpeechController::class, 'destroy'])->name('admin.speech.destroy');

// Admission (Public submit + Admin list)
Route::post('/admission/save', [AdmissionController::class, 'store'])->name('admission.store');
Route::get('/admin/admission/list', [AdmissionController::class, 'index'])->name('admin.admission.index');
Route::get('/admin/admission/show/{id}', [AdmissionController::class, 'show'])->name('admin.admission.show');
Route::get('/admin/admission/delete/{id}', [AdmissionController::class, 'destroy'])->name('admin.admission.destroy');
