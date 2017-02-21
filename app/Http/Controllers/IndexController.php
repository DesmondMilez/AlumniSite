<?php


namespace App\Http\Controllers;


use App\Http\Requests\ContactUsRequest;
use App\Models\JobAdvert;
use Exception;
use Mail;

class IndexController extends Controller
{
    public function index()
    {
        $jobAds = JobAdvert::all();
        $data = compact('jobAds');
        return view('pages.index', $data);
    }

    public function showContactUsForm()
    {
        return view('pages.contact-us');
    }

    public function submitContactForm(ContactUsRequest $request)
    {
        try {
            Mail::send('mail.contact-us', $request->all(), function ($message) use ($request) {
                $message->from($request->get('email'), 'Алумни');
                $message->to('admin@alumni.com')->subject($request->get('subject'));
            });
        } catch (Exception $e) {
            return redirect()->back()->withInput($request->all())->with([
                'status' => 'Danger',
                'message' => 'Неочекувана грешка. Ве молиме обидете се повторно.'
            ]);
        }

        return redirect()->back()->with(['status' => 'Success', 'message' => 'Вашата порака е успешно испратена.']);
    }
}