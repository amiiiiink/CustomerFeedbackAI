<?php

namespace Modules\CustomerFeedback\Kafka\Consumers;

namespace Modules\CustomerFeedback\Kafka\Consumers;

use Junges\Kafka\Message\Message;
use Illuminate\Support\Facades\Log;
use Modules\CustomerFeedback\Services\AnalyzeFeedbackService;

class AnalyzeFeedbackConsumer
{
    public function __invoke(Message $message): void
    {
        // Deserialize the payload
        $payload = json_decode($message->getBody(), true);
        // Optionally log it
        Log::info('Received feedback:', $payload);
        // Process the feedback using your service
        app(AnalyzeFeedbackService::class)->handle($payload);
    }
}

