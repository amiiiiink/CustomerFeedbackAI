<?php
use Illuminate\Support\Facades\Route;
use Modules\CustomerFeedback\Http\Controllers\FeedbackController;


Route::post('/customer-feedback', [FeedbackController::class, 'store']);

