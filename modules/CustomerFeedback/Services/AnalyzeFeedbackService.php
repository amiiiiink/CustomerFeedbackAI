<?php

namespace Modules\CustomerFeedback\Services;


use Modules\CustomerFeedback\Repositories\FeedbackRepository;
use Modules\CustomerFeedback\DTOs\FeedbackDTO;


class AnalyzeFeedbackService
{
    public function __construct(
        protected FeedbackRepository $feedbackRepository
    )
    {
    }

    public function handle(array $data): void
    {
        // Step 2: Create DTO
        $dto = new FeedbackDTO(
            message: $data['message'],
        );

        // Step 3: Save feedback via repository
        $this->feedbackRepository->store($dto);
    }


}

