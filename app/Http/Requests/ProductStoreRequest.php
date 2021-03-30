<?php

namespace App\Http\Requests;

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
        return array_merge(
            $this->only('name', 'price', 'qty', 'categorie_id'),
            ['code_product' => $this->autoCode('products', 'id', 'PRD')]
        );
    }

    private function autoCode($table, $primary, $prefix)
    {
        $q = DB::table($table)->select(DB::raw('MAX(RIGHT(' . $primary . ',1)) as kd_max'));
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = $prefix . sprintf("%03s", $tmp);
            }
        } else {
            $kd = $prefix . "001";
        }
        return $kd;
    }
}