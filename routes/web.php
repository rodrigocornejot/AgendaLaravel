<?php

use App\Http\Controllers\FullCalendarEventMasterController;
use Illuminate\Support\Facades\Route;

//fullcalender
Route::get('/fullcalendareventmaster',[FullCalendarEventMasterController::class,"index"]);
Route::post('/fullcalendareventmaster/create',[FullCalendarEventMasterController::class,"create"]);
Route::post('/fullcalendareventmaster/update',[FullCalendarEventMasterController::class,"update"]);
Route::post('/fullcalendareventmaster/delete',[FullCalendarEventMasterController::class,"destroy"]);

Route::get('/', function () {
    return view('welcome');
});
