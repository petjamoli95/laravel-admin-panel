<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'firstname' => 'required|max:80',
            'lastname' => 'required|max:80',
            'company' => 'required|max:160',
            'email' => 'email|max:255|unique:employees,email,' . $this->get('id'),
            'phone' => 'regex:/^(?:((\+?\d{2,3})|(\(\+?\d{2,3}\))) ?)?(((\d{2}[\ \-\.]?){3,5}\d{2})|((\d{3}[\ \-\.]?){2}\d{4}))$/'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'company' => $this->company,
            'email' => $this->email,
            'phone' => $this->phone
        ]);
    }
}
