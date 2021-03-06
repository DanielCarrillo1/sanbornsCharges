<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchesRequest extends FormRequest
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
            'sanborns_id' => 'regex:/^(?:\d{0,9}(?:[\r\n]\d{0,9})*)?$/i|required', // ^(?:\d{0,9}(?:[\r\n]\d{0,9})*)?
        ];
    }
}
