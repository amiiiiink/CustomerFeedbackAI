<?php

namespace Modules\CustomerFeedback\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Consumers\ConsumerBuilder;
use Modules\CustomerFeedback\Kafka\Consumers\AnalyzeFeedbackConsumer;

class AnalyzeFeedbackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feedback:analyze';

    protected $description = 'Consume feedback messages from Kafka and analyze sentiment';

    public function handle(): void
    {
        $this->info("Starting Kafka consumer for feedback analysis...");

        Kafka::consumer(['test-1'])
            ->withConsumerGroupId('feedback-group')
            ->withHandler(new AnalyzeFeedbackConsumer()) // NOT withConsumer
            ->build()
            ->consume();
    }
}
