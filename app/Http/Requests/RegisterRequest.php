<?php


namespace App\Http\Requests;


use Auth;

class RegisterRequest extends Request
{
    public function authorize()
    {
        return !Auth::check();
    }

    public function rules()
    {
        return [
            'index' => 'required|index|unique:users,index',
            'email' => 'email|required|unique:users,email',
            'name' => 'required',
            'surename' => 'required',
            'password' => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'index.required' => 'Индексот е задолжителен',
            'index.unique' => 'Бројот на индексот е веќе искористен',
            'email.required' => 'Емаилот е задолжителен',
            'email.email' => 'Невалиден формат на емаил адресата',
            'email.unique' => 'Емаилот е веќе искористен',
            'name.required' => 'Името е задолжително',
            'surename.required' => 'Презимето е задолжително',
            'password.required' => 'Лозинката е задолжителна',
            'password.confirmed' => 'Лозинките не се исти.',
        ];
    }
}