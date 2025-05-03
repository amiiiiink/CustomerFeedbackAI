<?php
use Illuminate\Support\Facades\Route;
use Modules\CustomerFeedback\Http\Controllers\FeedbackController;

//Route::post('/customer-feedback', function () {
//    return response()->json(['message' => 'Feedback submitted successfully.'], 201);
//});




Route::post('/customer-feedback', [FeedbackController::class, 'store']);

