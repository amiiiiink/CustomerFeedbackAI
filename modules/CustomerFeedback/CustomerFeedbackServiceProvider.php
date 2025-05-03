<?php

namespace Modules\CustomerFeedback;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CustomerFeedbackServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    public function register(): void
    {
        //
    }
}
