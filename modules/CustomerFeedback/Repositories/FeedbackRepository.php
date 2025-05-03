<?php

namespace Modules\CustomerFeedback\Repositories;

use Modules\CustomerFeedback\Contracts\Repositories\FeedbackRepositoryInterface;
use Modules\CustomerFeedback\Models\Feedback;

readonly class FeedbackRepository implements FeedbackRepositoryInterface
{

    public function store(array $data): Feedback
    {
        return Feedback::query()->create($data);
    }
}
