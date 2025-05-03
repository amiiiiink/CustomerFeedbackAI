<?php

namespace Modules\CustomerFeedback\Tests\Unit;

use Modules\CustomerFeedback\DTOs\FeedbackDTO;
use PHPUnit\Framework\TestCase;

class FeedbackDTOTest extends TestCase
{
    public function test_it_creates_dto_from_array()
    {
        $data = [
            'message' => 'خیلی خوب بود',
        ];

        $dto = FeedbackDTO::fromArray($data);

        $this->assertInstanceOf(FeedbackDTO::class, $dto);
        $this->assertEquals('خیلی خوب بود', $dto->message);
    }

    public function test_it_converts_dto_to_array()
    {
        $dto = new FeedbackDTO('خیلی خوب بود');

        $array = $dto->toArray();

        $this->assertIsArray($array);
        $this->assertArrayHasKey('message', $array);
        $this->assertEquals('خیلی خوب بود', $array['message']);
    }
}
