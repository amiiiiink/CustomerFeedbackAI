<?php

namespace Modules\CustomerFeedback\tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmitFeedbackTest extends TestCase
{
    use RefreshDatabase;


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
}
