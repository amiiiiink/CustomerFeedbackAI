<?php
namespace Modules\CustomerFeedback\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CustomerFeedback\Models\Feedback;
use Modules\CustomerFeedback\Enums\FeedbackStatus;

class FeedbackFactory extends Factory
{
    protected $model = Feedback::class;

    public function definition(): array
    {
        return [
            'message' => $this->faker->sentence(),
            'status' => FeedbackStatus::PENDING->value,
        ];
    }
}

