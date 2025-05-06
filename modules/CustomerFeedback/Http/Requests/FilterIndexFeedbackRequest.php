<?php

namespace Modules\CustomerFeedback\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\CustomerFeedback\Enums\FeedbackStatus;

class FilterIndexFeedbackRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['nullable', 'string',Rule::in(FeedbackStatus::values()),],
        ];
    }
}
