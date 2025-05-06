<?php
namespace Modules\CustomerFeedback\Enums;

enum FeedbackStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';


    /**
     * Get all possible enum values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
