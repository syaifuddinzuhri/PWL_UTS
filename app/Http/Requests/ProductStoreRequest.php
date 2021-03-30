<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ProductStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|numeric|min:0',
            'categorie_id' => 'required',
        ];
    }

    public function getAttributes()
    {
        $latestProduct = Product::orderBy('created_at', 'DESC')->first();
        return array_merge(
            $this->only('name', 'price', 'qty', 'categorie_id'),
            ['code_product' => 'PRD' . str_pad($latestProduct->id + 1, 3, "0", STR_PAD_LEFT)]
        );
    }
}