<?php

namespace Modules\CustomerFeedback\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\CustomerFeedback\Database\factories\FeedbackFactory;
use Modules\CustomerFeedback\Enums\FeedbackStatus;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = ['message'];

    protected $table = 'feedbacks';

    protected $casts = [
        'status' => FeedbackStatus::class,
    ];

    public function setStatus(FeedbackStatus $status): void
    {
        $this->status = $status->value;
        $this->save();
    }

    public function getStatus(): FeedbackStatus
    {
        return FeedbackStatus::from($this->status);
    }
    protected static function newFactory(): FeedbackFactory
    {
        return FeedbackFactory::new();
    }
}
