<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationRequest extends FormRequest
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
        $quotation = $this->route('quotation');

        return [
            'names' => ['required', 'string', 'max:255'],
            'email' => ['required','string','email','max:255'],
            'contact' => ['required', 'string', 'max:15'],
            'color' =>['required', 'string','max:255'],
            'quantity' => ['required', 'integer', 'min:1'],
            'collection_id' => ['required', 'exists:collections,id'],
            'size' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ];
    }
}
