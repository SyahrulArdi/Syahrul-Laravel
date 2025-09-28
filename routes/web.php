<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::resource('employees',EmployeeController::class);
#Route::get('/employee', [EmployeeController::class, 'index']);

#default route

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
return 'Halo, Laravel!';
});

Route::get('/employee/{id}', function ($id) {
return "Data pegawai dengan ID: " . $id;
});

Route::get('/employee/{nama?}', function ($nama = 'Tidak Diketahui') {
return "Nama Pegawai: " . $nama;
});