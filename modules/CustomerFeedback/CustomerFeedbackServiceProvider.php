<?php

namespace Modules\CustomerFeedback;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\CustomerFeedback\Contracts\Repositories\FeedbackRepositoryInterface;
use Modules\CustomerFeedback\Repositories\FeedbackRepository;

class CustomerFeedbackServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

    }

    public function register(): void
    {
        $this->app->bind(FeedbackRepositoryInterface::class, FeedbackRepository::class);
    }
}
