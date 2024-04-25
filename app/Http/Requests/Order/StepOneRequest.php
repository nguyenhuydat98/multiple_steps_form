<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseRequest;

class StepOneRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'meal_category' => [
                'required',
            ],
            'number_of_people' => [
                'required',
                'numeric',
                'min:1',
                'max:10',
            ],
        ];
    }
}
