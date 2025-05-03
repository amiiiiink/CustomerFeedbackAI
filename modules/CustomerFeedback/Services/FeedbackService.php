<?php
namespace Modules\CustomerFeedback\Services;

use Modules\CustomerFeedback\Contracts\Repositories\FeedbackRepositoryInterface;
use Modules\CustomerFeedback\Models\Feedback;

readonly class FeedbackService
{
    public function __construct(protected readonly FeedbackRepositoryInterface $repository) {}

    public function submit(array $data): Feedback
    {
        return $this->repository->store($data);
    }
}
