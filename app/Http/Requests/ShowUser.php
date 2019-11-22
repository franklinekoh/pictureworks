<?php

namespace App\Http\Requests;


class ShowUser extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|numeric|exists:users,id'
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
            'id.exists' => 'No such user (2)'
        ];
    }

    /**
     * Get all of the input and files for the request.
     *
     * @param  array|mixed|null  $keys
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('id');
        return $data;
    }
}
