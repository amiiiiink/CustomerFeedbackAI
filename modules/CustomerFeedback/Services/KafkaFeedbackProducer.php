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
     */
    public function execute(array $data, string $topic)
    {
        $message = new Message(
            body: $data,
        );

        try {
            $producer = Kafka::publish('localhost')->onTopic($topic)->withMessage($message);
            $producer->send();
            return "ok";
            Log::info('kafka produce '.$topic.' successfully done. ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
