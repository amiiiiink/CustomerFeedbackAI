<?php

namespace Modules\CustomerFeedback\tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\CustomerFeedback\Enums\FeedbackStatus;
use Modules\CustomerFeedback\Models\Feedback;
use Tests\TestCase;

class ListFeedbacksTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_all_feedbacks()
    {
        Feedback::factory()->create(['message' => 'اولی', 'status' => FeedbackStatus::APPROVED]);
        Feedback::factory()->create(['message' => 'دومی', 'status' => FeedbackStatus::PENDING]);

        $response = $this->getJson('/manager/feedbacks');

        $response->assertOk()
            ->assertJsonFragment(['message' => 'اولی'])
            ->assertJsonFragment(['message' => 'دومی']);
    }

    public function test_it_can_filter_feedbacks_by_status()
    {
        Feedback::factory()->create(['message' => 'رد شده', 'status' => FeedbackStatus::REJECTED]);
        Feedback::factory()->create(['message' => 'در انتظار بررسی', 'status' => FeedbackStatus::PENDING]);

        $response = $this->getJson('/manager/feedbacks?status=pending');

        $response->assertOk()
            ->assertJsonMissing(['message' => 'رد شده'])
            ->assertJsonFragment(['message' => 'در انتظار بررسی']);
    }
}
