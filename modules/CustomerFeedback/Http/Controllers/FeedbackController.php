<?php

namespace Modules\CustomerFeedback\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\CustomerFeedback\DTOs\FeedbackDTO;
use Modules\CustomerFeedback\Enums\FeedbackStatus;
use Modules\CustomerFeedback\Http\Requests\FilterIndexFeedbackRequest;
use Modules\CustomerFeedback\Http\Requests\StoreFeedbackRequest;
use Modules\CustomerFeedback\Services\FeedbackService;
use Modules\CustomerFeedback\Services\KafkaFeedbackProducer;

class FeedbackController extends Controller
{
    public function __construct(protected readonly FeedbackService $service)
    {
    }

    public function index(FilterIndexFeedbackRequest $request)
    {
        $status = $request->input('status');
        $this->service->filter($status ? FeedbackStatus::tryFrom($status) : null);
        return response()->json(['message' => 'Feedbacks list.']);
    }

    public function store(StoreFeedbackRequest $request)
    {
        $dto = FeedbackDTO::fromArray($request->validated());
        $this->service->submit($dto);
        return response()->json(['message' => 'Feedback submitted successfully.'], 201);
    }

    public function approve(int $id)
    {
        $this->service->approveOrReject(id: $id, status: FeedbackStatus::APPROVED);
        return response()->json(['message' => 'Feedback approved successfully.']);
    }

    public function reject(int $id)
    {
        $this->service->approveOrReject(id: $id, status: FeedbackStatus::REJECTED);
        return response()->json(['message' => 'Feedback rejected successfully.']);
    }

    public function produceKafka()
    {
        $kafkaService =resolve(KafkaFeedbackProducer::class);
        $kafkaService->execute(data:array('name'=>'amin'),topic: 'test-1');
    }
}
