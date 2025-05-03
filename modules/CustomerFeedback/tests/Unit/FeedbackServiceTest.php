<?php

namespace Modules\CustomerFeedback\Tests\Unit;

use Modules\CustomerFeedback\Contracts\Repositories\FeedbackRepositoryInterface;
use Modules\CustomerFeedback\DTOs\FeedbackDTO;
use Modules\CustomerFeedback\Models\Feedback;
use Modules\CustomerFeedback\Services\FeedbackService;
use Tests\TestCase;
use Mockery;

class FeedbackServiceTest extends TestCase
{
    public function test_it_calls_repository_store_method()
    {
        $mock = Mockery::mock(FeedbackRepositoryInterface::class);

        $dto = new FeedbackDTO('خیلی خوب بود');

//        $mock->shouldReceive('store')
//            ->once()
//            ->with(['message' => 'خیلی خوب بود'])
//            ->andReturn(new Feedback(['message' => 'خیلی خوب بود']));

        $mock->shouldReceive('store')
            ->once()
            ->with($dto->toArray())  // Passing the array conversion of the DTO
            ->andReturn(new Feedback(['message' => 'خیلی خوب بود']));

        $this->app->instance(FeedbackRepositoryInterface::class, $mock);
        $service = new FeedbackService($mock);
        $feedback = $service->submit($dto);

        $this->assertEquals('خیلی خوب بود', $feedback->message);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
