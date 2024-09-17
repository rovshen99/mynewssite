<?php

use App\Http\Controllers\Api\NewsController;

Route::get('news', [NewsController::class, 'index']);
Route::get('news/{id}', [NewsController::class, 'show']);