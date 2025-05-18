<?php

namespace App\Http\Requests;

use App\Enums\OrderStatus;
use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\Enum;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sale_date' => 'required|date', //|before_or_equal:today.
            'amount' => 'required|numeric|min:0.01',
            'client_id' => 'required|numeric|min:1',
            'articles_id' => 'required|string|max:255'
        ];  
    }


    // Para cuando falla una de las reglas.
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiResponse::error($validator->errors(), 'Error validator', Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
