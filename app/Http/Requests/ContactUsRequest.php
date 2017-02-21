<?php


namespace App\Http\Requests;


class ContactUsRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Емаилот е задолжителен',
            'email.email' => 'Невалиден формат на емаил адресата',
            'subject.required' => 'Насловот е задолжителен',
            'content.required' => 'Содржината е задолжителна',
        ];
    }
}