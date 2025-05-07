<?php

namespace Modules\CustomerFeedback\DTOs;

readonly class FeedbackDTO
{
    public function __construct(
        public string $message
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
