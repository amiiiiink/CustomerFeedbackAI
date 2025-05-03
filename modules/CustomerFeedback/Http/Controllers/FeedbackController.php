<?php
namespace Modules\CustomerFeedback\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\CustomerFeedback\Http\Requests\StoreFeedbackRequest;
use Modules\CustomerFeedback\Services\FeedbackService;

class FeedbackController extends Controller
{
    public function __construct(protected readonly FeedbackService $service) {}
    public function store(StoreFeedbackRequest $request)
    {
        $this->service->submit($request->validated());
        return response()->json(['message' => 'Feedback submitted successfully.'], 201);
    }
}
