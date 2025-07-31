<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CollectionRequest extends FormRequest
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
        $collection = $this->route('collection');
        return [
            'item_id' => ['required','exists:stocks,id'],
            'category_id' => ['required','exists:categories,id'],
            'image' => ['required','image','max:2048','mimes:jpg,jpeg,png,gif,svg',],
            'price' => ['required', 'numeric', 'min:0'],
            'in_stock' => ['required', 'integer', 'min:0'],
            'featured' => ['required', 'in:0,1'],
            'visibility' => ['required', 'in:0,1'], 
            'description' => ['required', 'string'],
        ];
    }
}
