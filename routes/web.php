<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'app' => 'Shohel Rana Portfolio API Backend',
        'status' => 'Running',
        'version' => '1.0.0'
    ]);
});
