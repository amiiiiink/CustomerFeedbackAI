<?php

namespace Modules\CustomerFeedback\Kafka\Consumers;

use Illuminate\Support\Facades\Log;
use Junges\Kafka\Contracts\ConsumerMessage;
use Junges\Kafka\Contracts\Handler;
use Modules\CustomerFeedback\Services\AnalyzeFeedbackService;

class AnalyzeFeedbackConsumer implements Handler
{
    public function __invoke(ConsumerMessage $message): void
    {
        $payload = $message->getBody();

        if (!is_array($payload)) {
            Log::warning('Invalid payload received', ['body' => $message->getBody()]);
            return;
        }

        Log::info('Received feedback:', $payload);

        app(AnalyzeFeedbackService::class)->handle($payload);
    }
}

