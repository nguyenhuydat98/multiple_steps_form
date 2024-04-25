<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;

class StepThreeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'names' => [
                'required',
                'array',
            ],
            'names.*' => [
                'required',
                'distinct',
            ],
            'amount' => [
                'required',
                'array',
            ],
            'amount.*' => [
                'required',
                'numeric',
                'min:1',
                'max:10',
            ],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            $params = $this->all();
            $stepOne = Session::get('stepOne');
            $numberOfPeople = $stepOne['number_of_people'];

            if ($numberOfPeople > array_sum($params['amount'])) {
                $message = "The total quantity of all dishes must be greater than or equal to $numberOfPeople";
                $validator->errors()->add("totalAmount", $message);
            }
        });
    }
}
