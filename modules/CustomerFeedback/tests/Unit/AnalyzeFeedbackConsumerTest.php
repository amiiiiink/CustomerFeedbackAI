<?php
namespace Modules\CustomerFeedback\tests\Unit;
use Modules\CustomerFeedback\Kafka\Consumers\AnalyzeFeedbackConsumer;
use Modules\CustomerFeedback\Services\AnalyzeFeedbackService;
use Junges\Kafka\Contracts\KafkaConsumerMessage;
use Mockery;
use Tests\TestCase;

class AnalyzeFeedbackConsumerTest extends TestCase
{
    public function test_consumer_calls_analyze_feedback_service()
    {
        // Step 1: Fake Kafka Message
        $fakePayload = ['user_id' => 1, 'message' => 'This is great!'];
        $mockMessage = Mockery::mock(KafkaConsumerMessage::class);
        $mockMessage->shouldReceive('getBody')->andReturn(json_encode($fakePayload));

        // Step 2: Mock Service
        $mockService = Mockery::mock(AnalyzeFeedbackService::class);
        $mockService->shouldReceive('handle')->once()->with($fakePayload);
        $this->app->instance(AnalyzeFeedbackService::class, $mockService);

        // Step 3: Trigger consumer
        $consumer = new AnalyzeFeedbackConsumer();
        $consumer($mockMessage);
    }
}
