<?php

namespace Modules\CustomerFeedback\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CustomerFeedback\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'message' => ['required', 'string'],
        ]);

        Feedback::create($data);

        return response()->json(['message' => 'Feedback submitted successfully.'], 201);
    }
}
