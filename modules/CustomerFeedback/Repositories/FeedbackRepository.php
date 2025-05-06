<?php

namespace Modules\CustomerFeedback\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\CustomerFeedback\Contracts\Repositories\FeedbackRepositoryInterface;
use Modules\CustomerFeedback\Enums\FeedbackStatus;
use Modules\CustomerFeedback\Models\Feedback;

readonly class FeedbackRepository implements FeedbackRepositoryInterface
{
    public function store(array $data): Feedback
    {
        return Feedback::query()->create($data);
    }

    /**
     * @param int $id
     * @param FeedbackStatus $status
     * @return bool
     */
    public function changeStatus(int $id, FeedbackStatus $status): bool
    {
        $feedback=Feedback::query()->findOrFail($id);
        $feedback->status = $status;
        return $feedback->save();
    }

}
