<?php

namespace Modules\CustomerFeedback\Contracts\Repositories;

use Modules\CustomerFeedback\Enums\FeedbackStatus;
use Modules\CustomerFeedback\Models\Feedback;

interface FeedbackRepositoryInterface
{
    public function store(array $data): Feedback;
    public function changeStatus(int $id, FeedbackStatus $status): bool;
}
