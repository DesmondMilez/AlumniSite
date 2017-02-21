<?php


namespace App\Http\Controllers\Admin;


use App\Applications\Datatables\JobAdvertDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateJobRequest;
use App\Models\JobAdvert;
use App\Models\Skill;
use Auth;
use DB;
use Exception;

class JobAdvertController extends Controller
{
    /**
     * @var JobAdvertDatatable
     */
    private $advertDatatable;

    public function __construct(JobAdvertDatatable $advertDatatable)
    {
        $this->advertDatatable = $advertDatatable;
    }

    public function index()
    {
        return view('pages.admin.index_job-advert');
    }

    public function getAjaxData()
    {
        return $this->advertDatatable->from(Auth::user()->advert());
    }

    public function newJobAdvert()
    {
        $skills = Skill::all();

        return view('pages.admin.job-advert_new', compact('skills'));
    }

    public function create(CreateJobRequest $request)
    {
        try {
            DB::beginTransaction();
            $job = JobAdvert::create($request->all());
            $job->skills()->sync($request->get('skill'));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput($request->all())->with([
                'status' => 'Danger',
                'message' => 'Неочекувана грешка. Ве молиме обидете се повторно.'
            ]);
        }

        return redirect()->route('admin.job-ad.index')->with([
            'status' => 'Success',
            'message' => 'Огласот е успешно додаден'
        ]);
    }

    public function delete($id)
    {
        /** @var JobAdvert $job */
        $job = JobAdvert::find($id);
        $job->delete();

        return redirect()->route('admin.job-ad.index')->with([
            'status' => 'Success',
            'message' => 'Огласот е успешно избришан'
        ]);
    }

    public function edit($id)
    {
        /** @var JobAdvert $job */
        $job = JobAdvert::find($id);
        $jobSkillIds = $job->Skills->lists('id')->toArray();
        $skills = Skill::all();
        $data = compact('job', 'skills', 'jobSkillIds');

        return view('pages.admin.job-advert_edit', $data);
    }

    public function save(CreateJobRequest $request)
    {
        try {
            DB::beginTransaction();
            /** @var JobAdvert $job */
            $job = JobAdvert::find($request->get('job_id'));
            $job->update($request->all());
            $job->skills()->sync($request->get('skill'));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput($request->all())->with([
                'status' => 'Danger',
                'message' => 'Неочекувана грешка. Ве молиме обидете се повторно.'
            ]);
        }

        return redirect()->route('admin.job-ad.index')->with([
            'status' => 'Success',
            'message' => 'Огласот е успешно додаден'
        ]);
    }

    public function view($id)
    {
        /** @var JobAdvert $job */
        $job = JobAdvert::find($id);
        $data = compact('job');

        return view('pages.admin.job-advert_view', $data);
    }
}