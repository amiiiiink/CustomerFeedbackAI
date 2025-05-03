<?php
namespace Modules\CustomerFeedback\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\CustomerFeedback\DTOs\FeedbackDTO;
use Modules\CustomerFeedback\Enums\FeedbackStatus;
use Modules\CustomerFeedback\Http\Requests\StoreFeedbackRequest;
use Modules\CustomerFeedback\Models\Feedback;
use Modules\CustomerFeedback\Services\FeedbackService;

class FeedbackController extends Controller
{
    public function __construct(protected readonly FeedbackService $service) {}
    public function store(StoreFeedbackRequest $request)
    {
        $dto = FeedbackDTO::fromArray($request->validated());
        $this->service->submit($dto);
        return response()->json(['message' => 'Feedback submitted successfully.'], 201);
    }
    public function approve($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->status = FeedbackStatus::APPROVED;
        $feedback->save();

        return response()->json([
            'status' => $feedback->status->value,
        ]);
    }

    public function reject($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->status = FeedbackStatus::REJECTED;
        $feedback->save();

        return response()->json([
            'status' => $feedback->status->value,
        ]);
    }
}
