<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country' => ['string'],
'title' => ['string'],
'status' => ['string'],
'desc' => ['string'],
'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf,webp|max:20480',
'images' => 'mimes:jpeg,png,jpg,gif,svg,pdf,webp|max:20480',

        ];
    }
}
