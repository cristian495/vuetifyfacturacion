<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerFormRequest extends FormRequest
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
            'type' => 'required|in:customers,suppliers',
            'identity_document_type_id' => 'required|string',
            'identity_document_number' => 'required|string',
            'name' => 'required|string',
            'trade_name' => 'string',
            'country_id' => 'required|string',
            'department_id' => 'string',
            'province_id' => 'string',
            'district_id' => 'string',
            'address' => 'string',
            'email' => 'string|email',
            'telephone' => 'string',            
        ];
    }
}
