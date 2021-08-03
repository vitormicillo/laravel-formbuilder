<?php

namespace doode\FormBuilder\Requests;

use doode\FormBuilder\Models\Form;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveFormRequest extends FormRequest
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
            'name' => 'required|max:100',
            'visibility' => ['required', Rule::in([Form::FORM_PUBLIC, Form::FORM_PRIVATE])],
            'allows_edit' => 'required|boolean',
            'form_builder_json' => 'required|json',
        ];
    }
}
