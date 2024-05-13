<?php

namespace App\Http\Requests\Service;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string'],
'desc' => ['string'],
'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20480',
'category_id' => ['string'],
'slug' => ['string'],

        ];
    }
}
