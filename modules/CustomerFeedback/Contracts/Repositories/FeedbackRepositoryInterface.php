<?php

namespace Modules\CustomerFeedback\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\CustomerFeedback\DTOs\FeedbackDTO;
use Modules\CustomerFeedback\Enums\FeedbackStatus;
use Modules\CustomerFeedback\Models\Feedback;

interface FeedbackRepositoryInterface
{
    public function store(FeedbackDTO $data): Feedback;
    public function changeStatus(int $id, FeedbackStatus $status): bool;
    public function index(?FeedbackStatus $status): Collection;
}
