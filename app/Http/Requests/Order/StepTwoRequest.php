<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseRequest;

class StepTwoRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'restaurant' => [
                'required',
            ],
        ];
    }
}
