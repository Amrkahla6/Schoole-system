<?php

namespace App\Http\Requests\Classes;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "listClasses.*.name" => 'required',
            "listClasses.*.name_en" => 'required',
            "listClasses.*.grade_id" => "required"
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => trans('validation.required'),
            'name_en.required'  => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
        ];
    }
}
