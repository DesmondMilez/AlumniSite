<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplyRequest;
use App\Models\JobAdvert;
use App\Models\User;
use Auth;
use Exception;
use Mail;

class UserJobAdvertController extends Controller
{
    public function apply($id)
    {
        /** @var JobAdvert $jobAd */
        $jobAd = JobAdvert::find($id);
        $jobAd->views += 1;
        $jobAd->save();

        $user = Auth::user();
        $data = compact('jobAd', 'user');

        return view('pages.job.apply_job-ad', $data);
    }

    public function postApply(JobApplyRequest $request)
    {
        try {
            /** @var JobAdvert $job */
            $job = JobAdvert::findOrFail($request->get('job_id'));
            $jobOwner = $job->Admin;
            /** @var User $user */
            $user = Auth::user();
            $file = $request->file('cv');
            Mail::send('mail.job_apply', [], function ($message) use ($jobOwner, $user, $job, $file) {
                $message->from($user->email, "{$user->name} {$user->surename}");
                $message->to($jobOwner->email)->subject("Апликација за {$job->subject}");
                $message->attach($file->getRealPath(),
                    ['as' => $file->getClientOriginalName(), 'mime' => $file->getClientMimeType()]);
            });
        } catch (Exception $e) {
            return redirect()->back()->withInput($request->all())->with([
                'status' => 'Danger',
                'message' => 'Неочекувана грешка. Ве молиме обидете се повторно.'
            ]);
        }

        return redirect()->back()->with(['status' => 'Success', 'message' => 'Вашата апликација е успешно испратена.']);
    }
}