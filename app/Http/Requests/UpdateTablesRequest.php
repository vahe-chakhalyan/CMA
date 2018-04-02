<?php

namespace App\Http\Requests;

use App\Role;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTablesRequest extends FormRequest
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
        $waiters_array = User::where('role_id', Role::getWaiterRole()->id)->pluck('id')->toArray();
        return [
            'name' => 'required|string',
            'waiter' => 'nullable|in:'  . implode(',', $waiters_array)
        ];
    }
}
