<?php


namespace App\Http\Requests;


use Auth;

class CreateJobRequest extends Request
{
    public function authorize()
    {
        return Auth::user()->isAdmin();
    }

    public function rules()
    {
        return [
            'subject' => 'required',
            'description' => 'required',
            'skill' => 'required'
        ];
    }
}