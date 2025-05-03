<?php

namespace Modules\CustomerFeedback\tests\Unit\Repositories;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\CustomerFeedback\Models\Feedback;
use Modules\CustomerFeedback\Repositories\FeedbackRepository;
use Tests\TestCase;

class FeedbackRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_store_feedback()
    {
        // Arrange
        $repository = new FeedbackRepository();
        $data = ['message' => 'محصول خوبی بود!'];

        // Act
        $feedback = $repository->store($data);

        // Assert
        $this->assertInstanceOf(Feedback::class, $feedback);
        $this->assertDatabaseHas('feedbacks', ['message' => 'محصول خوبی بود!']);
    }
}
