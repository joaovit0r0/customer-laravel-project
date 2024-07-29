<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateCustomersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => [
                'required',
                'max:255'
            ],
            'cpf' => [
                'required',
                'unique:customer',
                'min:11',
                'max:11'
            ],
            'contact' => [
                'required',
                'min:11',
                'max:11',
            ],
            'born_date' =>  [
                'required'
            ],
            'city_id' => [
                'required',
                'exists:city,id'
            ]
        ];

        if($this->method() === 'PATCH') {
            $rules['cpf'] = [
                'required',
                Rule::unique('customer')->ignore($this->id)
            ];
        }

        return $rules;
    }
}
