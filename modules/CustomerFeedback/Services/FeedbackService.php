<?php
namespace Modules\CustomerFeedback\Services;

use Modules\CustomerFeedback\Models\Feedback;

class FeedbackService
{
    public function store(array $data): Feedback
    {
        return Feedback::create($data);
    }
}
