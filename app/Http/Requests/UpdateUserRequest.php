<?php

namespace App\Http\Requests;

use App\Role;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $id = $this->request->get('id');
        $roles_array = Role::all()->pluck('id')->toArray();
        return [
            'id' => 'required|numeric',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:'  . implode(',', $roles_array)
        ];
    }
}
