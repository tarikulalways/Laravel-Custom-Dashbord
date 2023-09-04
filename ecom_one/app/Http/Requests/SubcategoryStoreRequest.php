<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sub_category' => ['required','string', 'unique:sub_categories,sub_category'],
            'category' => ['required','numeric'],
            'Subcat_img' => ['required','image'],
            'is_active' => 'nullable'
        ];
    }
}
