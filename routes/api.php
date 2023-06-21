<?php

use Illuminate\Http\Request;
use App\Http\Controllers\MunicipioController;
use Illuminate\Support\Facades\Route;

Route::get('/municipios', [MunicipioController::class, 'index']);
Route::post('/municipios/sync', [MunicipioController::class, 'sync']);
