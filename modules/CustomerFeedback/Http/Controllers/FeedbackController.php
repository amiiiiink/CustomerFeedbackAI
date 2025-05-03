<?php

namespace Modules\CustomerFeedback\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CustomerFeedback\Models\Feedback;
use Modules\CustomerFeedback\Services\FeedbackService;

class FeedbackController extends Controller
{
    public function __construct(protected readonly FeedbackService $service) {}
    public function store(Request $request)
    {
        $data = $request->validate([
            'message' => ['required', 'string'],
        ]);

        $this->service->store($data);

        return response()->json(['message' => 'Feedback submitted successfully.'], 201);
    }
}
