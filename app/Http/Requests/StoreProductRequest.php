<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreProductRequest extends FormRequest
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
        return [
            'product_name' => 'required',
            'product_description' => 'required',
            'category_id' => 'required',
          
            'quantity' => 'required',
            'price' => 'required',
        ];
    }


     // validation

     public function failedValidation(Validator $validator)
     {
         throw new HttpResponseException(response()->json([
             'success'   => false,
             'message'   => 'Validation errors',
             'data'      => $validator->errors()
         ]));
     }

}
