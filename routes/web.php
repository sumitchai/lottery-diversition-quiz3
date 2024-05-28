<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotteryController;

Route::any('/', [LotteryController::class, 'index']);
Route::get('/lottery', [LotteryController::class, 'lotteryRandom']);

