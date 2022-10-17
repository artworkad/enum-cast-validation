<?php

namespace App\Http\Requests;

use App\Enums\PostTopic;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', new Enum(PostTopic::class)],
            'title_other' => 'required_if:title,' . PostTopic::OTHER->value
        ];
    }
}
