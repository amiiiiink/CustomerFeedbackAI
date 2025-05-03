<?php
namespace Modules\CustomerFeedback\Enums;

enum FeedbackStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
