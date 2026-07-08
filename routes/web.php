<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return response()->json([
        'app' => 'Shohel Rana Portfolio API Backend',
        'status' => 'Running',
        'version' => '1.0.0'
    ]);
});


Route::get('/test', function () {
    return Inertia::render('Test', [
        'name' => 'Shohel Rana'
    ]);
});