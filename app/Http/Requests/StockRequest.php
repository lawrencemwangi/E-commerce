<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Stock;

class StockRequest extends FormRequest
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
        $stock = $this->route('stock');

        return [
            'item_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('stocks', 'item_name')->ignore(optional($stock)->id),
            ],
            'quantity' => ['required', 'integer', 'min:0'],
            'low_stock_alert' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
        ];
    }
}
