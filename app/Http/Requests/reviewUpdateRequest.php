<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class reviewUpdateRequest extends FormRequest
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
            "nota"=>"required|numeric|max:5",
            "texto"=>"required|string|max:500"
        ];
    }
}
