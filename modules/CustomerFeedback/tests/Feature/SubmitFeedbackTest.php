<?php

namespace Modules\CustomerFeedback\tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\CustomerFeedback\Enums\FeedbackStatus;
use Modules\CustomerFeedback\Models\Feedback;
use Tests\TestCase;

class SubmitFeedbackTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_requires_message_field()
    {
        $response = $this->postJson('/customer-feedback', []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('message');
    }

    public function test_it_requires_message_to_be_a_string()
    {
        $response = $this->postJson('/customer-feedback', [
            'message' => ['not', 'a', 'string'],
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('message');
    }

    public function test_it_submits_customer_feedback()
    {
        $response = $this->postJson('/customer-feedback', [
            'message' => 'این محصول عالی بود!',
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Feedback submitted successfully.',
            ]);

        $this->assertDatabaseHas('feedbacks', [
            'message' => 'این محصول عالی بود!',
        ]);
    }

    public function test_it_submits_customer_feedback_with_enum_status()
    {
        $response = $this->postJson('/customer-feedback', [
            'message' => 'این محصول عالی بود!',
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Feedback submitted successfully.',
            ]);

        $this->assertDatabaseHas('feedbacks', [
            'message' => 'این محصول عالی بود!',
            'status' => FeedbackStatus::PENDING,
        ]);
    }


    public function test_manager_can_approve_feedback()
    {
        $feedback = Feedback::create([
            'message' => 'این محصول عالی بود!',
            'status' => FeedbackStatus::PENDING,
        ]);

        // مدیر فیدبک را تایید می‌کند
        $feedback->status = FeedbackStatus::APPROVED;
        $feedback->save();

        $this->assertDatabaseHas('feedbacks', [
            'id' => $feedback->id,
            'status' => FeedbackStatus::APPROVED,
        ]);
    }


}
