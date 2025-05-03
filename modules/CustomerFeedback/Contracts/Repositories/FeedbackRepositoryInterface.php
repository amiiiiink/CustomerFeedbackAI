<?php

namespace Modules\CustomerFeedback\Contracts\Repositories;

use Modules\CustomerFeedback\Models\Feedback;

interface FeedbackRepositoryInterface
{
    public function store(array $data): Feedback;
}
