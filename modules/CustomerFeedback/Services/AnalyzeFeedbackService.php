<?php

namespace Modules\CustomerFeedback\Services;

namespace Modules\CustomerFeedback\Services;

use Illuminate\Support\Facades\Log;
use Modules\CustomerFeedback\Repositories\FeedbackRepository;
use Modules\CustomerFeedback\DTOs\FeedbackDTO;
use Modules\CustomerFeedback\Enums\FeedbackSentiment;
use Modules\CustomerFeedback\Jobs\IndexFeedbackInElasticsearch;

class AnalyzeFeedbackService
{
    public function __construct(
        protected FeedbackRepository $feedbackRepository
    ) {}

    public function handle(array $data): void
    {

        // Step 1: Analyze sentiment using dummy AI (replace later)
//        $sentiment = $this->analyzeSentiment($data['message']);
        // Step 2: Create DTO
        $dto = new FeedbackDTO(
            message: $data['message'],
        );

        // Step 3: Save feedback via repository
        $feedback = $this->feedbackRepository->store($dto);

        // Step 4: Dispatch job to index in Elasticsearch
//        IndexFeedbackInElasticsearch::dispatch($feedback);

        // Step 5: Optional – cache result
        // Cache::put("feedback:{$feedback->id}:sentiment", $sentiment->value, now()->addHour());
    }

    private function analyzeSentiment(string $text): FeedbackSentiment
    {
        // For now, fake it — later replace with OpenAI or HuggingFace call
//        return match (true) {
//            str_contains($text, ['great', 'love', 'excellent']) => FeedbackSentiment::Positive,
//            str_contains($text, ['bad', 'hate', 'terrible'])     => FeedbackSentiment::Negative,
//            default                                              => FeedbackSentiment::Neutral,
//        };
    }
}

