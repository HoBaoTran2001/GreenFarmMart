<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'role' => 'required|unique:roles,name'
        ];
    }

    public function messages(){
        return [
            'role.required' => 'Tên vai trò không được bỏ trống',
            'role.unique' => 'Tên vai trò đã tồn tại'
        ];
    }
}