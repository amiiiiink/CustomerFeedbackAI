<?php

namespace Modules\CustomerFeedback\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmitFeedbackTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_submits_customer_feedback()
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
}
