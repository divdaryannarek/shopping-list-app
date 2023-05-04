<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'rate' => ['required','integer','between:1,5'],
            'comment' => ['required','string','max:500'],
            'file' => ['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
            'product_id' => ['required','integer'],
        ];
    }
}
