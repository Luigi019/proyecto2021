<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => [
                'required',

            ]
        ];

        switch ($this->getMethod()):

            case 'POST':
                $rules += [
                    'phone' => [
                        'required',
                        // 'unique:users'
                    ],
                    'email' => [
                        'required',
                        'email',
                        'unique:users'
                    ],
                    'password' => [
                        'required'
                    ]
                ];
                break;

            case 'PUT':

            if (request()->only('password')['password'] !== null) {
                $rules += [
                    'password' => ['required'],
                ];
            }
                if (request()->only('phone')['phone'] !== null) {
                    $rules += [
                      //  'phone' =>['required', "unique:users,phone,{$this->route('user')}"]

                    ];
                }
                    $rules +=['email' => ['required', "unique:users,email,{$this->route('admin')->id}"]];

                break;

        endswitch;


        return $rules;
    }
}
