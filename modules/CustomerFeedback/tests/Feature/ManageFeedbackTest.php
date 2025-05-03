<?php

namespace Modules\CustomerFeedback\tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\CustomerFeedback\Enums\FeedbackStatus;
use Modules\CustomerFeedback\Models\Feedback;
use Tests\TestCase;

class ManageFeedbackTest extends TestCase
{
    use RefreshDatabase;


    public function test_manager_can_approve_a_feedback()
    {
        $feedback = Feedback::factory()->create([
            'status' => FeedbackStatus::PENDING,
        ]);

        $response = $this->patchJson("/manager/feedbacks/{$feedback->id}/approve");
        $response->assertOk()
            ->assertJson([
                'status' => FeedbackStatus::APPROVED->value,
            ]);

        $this->assertDatabaseHas('feedbacks', [
            'id' => $feedback->id,
            'status' => FeedbackStatus::APPROVED->value,
        ]);
    }


    public function test_manager_can_reject_a_feedback()
    {
        $feedback = Feedback::factory()->create([
            'status' => FeedbackStatus::PENDING,
        ]);

        $response = $this->patchJson("/manager/feedbacks/{$feedback->id}/reject");
        $response->assertOk()
            ->assertJson([
                'status' => FeedbackStatus::REJECTED->value,
            ]);

        $this->assertDatabaseHas('feedbacks', [
            'id' => $feedback->id,
            'status' => FeedbackStatus::REJECTED->value,
        ]);
    }
}
