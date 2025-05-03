<?php

namespace Modules\CustomerFeedback\DTOs;

class FeedbackDTO
{
    public function __construct(
        public readonly string $message
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            message: $data['message'] ?? '',
        );
    }

    public function toArray(): array
    {
        return [
            'message' => $this->message,
        ];
    }
}
