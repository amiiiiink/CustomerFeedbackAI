<?php
use Illuminate\Support\Facades\Route;
use Modules\CustomerFeedback\Http\Controllers\FeedbackController;


Route::post('/customer-feedback', [FeedbackController::class, 'store']);
Route::patch('/manager/feedbacks/{id}/approve', [FeedbackController::class, 'approve']);
Route::patch('/manager/feedbacks/{id}/reject', [FeedbackController::class, 'reject']);
Route::get('/manager/feedbacks', [FeedbackController::class, 'index']);
Route::get('/produce/kafka', [FeedbackController::class, 'produceKafka']);



