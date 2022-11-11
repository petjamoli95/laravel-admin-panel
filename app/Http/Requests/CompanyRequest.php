<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|max:160|unique:companies,name,' . $this->get('id'),
            'email' => 'email|max:255|unique:companies,email,' . $this->get('id'),
            'logo' => 'image|dimensions:min_width=100,max_width=100,min_height=100,max_height=100|max:80',
            'website' => 'regex:/^((ftp|http|https):\/\/)?(www.)?(?!.*(ftp|http|https|www.))[a-zA-Z0-9_-]+(\.[a-zA-Z]+)+((\/)[\w#]+)*(\/\w+\?[a-zA-Z0-9_]+=\w+(&[a-zA-Z0-9_]+=\w+)*)?\/?$/'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name,
            'email' => $this->email,
            'website' => $this->website,
        ]);
    }
}
