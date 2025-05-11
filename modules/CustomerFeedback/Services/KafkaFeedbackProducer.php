<?php
namespace Modules\CustomerFeedback\Services;


use Exception;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class KafkaFeedbackProducer
{
    /**
     * @param array $data
     * @param string $topic
     * @return string|null
     */
    public function execute(array $data, string $topic): string|null
    {
        $message = new Message(
            body: $data,
        );

        try {
            $producer = Kafka::publish('localhost')->onTopic($topic)->withMessage($message);
            $producer->send();
            return "ok";
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
