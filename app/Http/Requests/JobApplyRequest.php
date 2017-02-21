<?php


namespace App\Http\Requests;


use Auth;

class JobApplyRequest extends Request
{
    public function authorize()
    {
        return Auth::user()->isStudent();
    }

    public function rules()
    {
        return [
            'cv' => 'required|mimes:doc,docx,pdf'
        ];
    }

    public function messages()
    {
        return [
            'cv.required' => 'Вашето CV е задолжително',
            'cv.mimes' => 'Дозволени формати на фајлот: doc; docx; pdf'
        ];
    }
}