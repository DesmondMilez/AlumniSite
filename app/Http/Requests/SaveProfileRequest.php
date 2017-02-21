<?php


namespace App\Http\Requests;


use Auth;

class SaveProfileRequest extends Request
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'surename' => 'required',
            'password' => 'confirmed',
            'smer_id' => 'required',
            'skill' => 'required',
            'avatar' => 'max:1024'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Името е задолжително',
            'surename.required' => 'Презимето е задолжително',
            'password.confirmed' => 'Лозинките не се исти.',
            'smer_id.required' => 'Насоката е задолжителнa',
            'skill.required' => 'Техничките познавања се задолжителни',
            'avatar.max' => 'Фајлот е преголем. 1MB максимум дозволено'
        ];
    }
}