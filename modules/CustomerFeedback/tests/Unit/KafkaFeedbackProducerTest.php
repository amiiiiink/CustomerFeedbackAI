<?php

namespace Modules\CustomerFeedback\tests\Unit;

use Junges\Kafka\Facades\Kafka;
use Modules\CustomerFeedback\Services\KafkaFeedbackProducer;
use Tests\TestCase;

class KafkaFeedbackProducerTest extends TestCase
{
    public function test_it_publish_message_to_kafka()
    {
        $kafkaService = resolve(KafkaFeedbackProducer::class);
        $response = $kafkaService->execute(data: ['name' => 'amin'], topic: 'test-1');
        $this->assertEquals('ok', $response);
    }

    public function test_it_calls_kafka_publish_method()
    {
        Kafka::fake();
        $producer = Kafka::publish('localhost')
            ->onTopic('topic')
            ->withBodyKey('foo', 'bar');
        $producer->send();

        Kafka::assertPublished($producer->getMessage());
    }
}
