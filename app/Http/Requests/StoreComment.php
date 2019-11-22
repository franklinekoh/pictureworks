<?php

namespace App\Http\Requests;

class StoreComment extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|numeric|exists:users,id',
            'comments' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'Missing key/value for :attribute',
            'comments.required' => 'Missing key/value for :attribute',
            'password.required' => 'Missing key/value for :attribute',
            'id.numeric' => 'Invalid id',
            'id.exists' => 'No such user (1)'
        ];
    }
}
