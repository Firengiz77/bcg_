<?php

namespace App\Http\Requests\ServiceAttribute;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceAttributeRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'key' => ['string'],
'value' => ['string'],
'service_id' => ['string'],

        ];
    }
}
