<?php
namespace Modules\CustomerFeedback\Services;

use Modules\CustomerFeedback\Contracts\Repositories\FeedbackRepositoryInterface;
use Modules\CustomerFeedback\DTOs\FeedbackDTO;
use Modules\CustomerFeedback\Models\Feedback;

readonly class FeedbackService
{
    public function __construct(protected readonly FeedbackRepositoryInterface $repository) {}

    public function submit(FeedbackDTO $dto): Feedback
    {
        return $this->repository->store($dto->toArray());
    }
}
