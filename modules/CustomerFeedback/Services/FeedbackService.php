<?php

namespace Modules\CustomerFeedback\Services;

use Modules\CustomerFeedback\Contracts\Repositories\FeedbackRepositoryInterface;
use Modules\CustomerFeedback\DTOs\FeedbackDTO;
use Modules\CustomerFeedback\Enums\FeedbackStatus;
use Modules\CustomerFeedback\Models\Feedback;

readonly class FeedbackService
{
    public function __construct(protected FeedbackRepositoryInterface $repository)
    {
    }

    public function filter(?FeedbackStatus $status): void
    {
        $this->repository->index($status);
    }

    public function submit(FeedbackDTO $dto): Feedback
    {
        return $this->repository->store($dto);
    }

    /**
     * @param int $id
     * @param FeedbackStatus $status
     * @return bool
     */
    public function approveOrReject(int $id, FeedbackStatus $status): bool
    {
        return $this->repository->changeStatus(id: $id, status: $status);
    }
}
