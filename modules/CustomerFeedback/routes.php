<?php
use Illuminate\Support\Facades\Route;

Route::post('/customer-feedback', function () {
    return response()->json(['message' => 'Feedback submitted successfully.'], 201);
});
