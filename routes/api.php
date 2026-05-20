<?php

use App\Http\Controllers\Sms\EmployeeController;

require __DIR__.'/auth.php';


Route::get('/employee/list', [EmployeeController::class, 'apiIndex'])->name('employee.list');
Route::get('/employee/create', [EmployeeController::class, 'createForm'])->name('employee.create');
Route::post('/employee/save', [EmployeeController::class, 'apiStore'])->name('employee.save');