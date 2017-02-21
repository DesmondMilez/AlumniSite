<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProfileRequest;
use App\Models\Skill;
use App\Models\Smer;
use App\Repositories\Contacts\UserProfileRepository;
use App\Repositories\Contacts\UserRepository;
use Auth;
use DB;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserProfileRepository
     */
    private $profileRepository;

    public function __construct(UserRepository $userRepository, UserProfileRepository $profileRepository)
    {
        $this->userRepository = $userRepository;
        $this->profileRepository = $profileRepository;
    }

    public function showEditForm()
    {
        $profile = Auth::user()->Profile;
        $user = Auth::user();
        $smerovi = Smer::all();
        $skills = Skill::all();
        $data = compact('profile', 'user', 'smerovi', 'skills');

        return view('pages.profile.edit', $data);
    }

    public function saveProfile(SaveProfileRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $profile = $user->Profile;
            $this->userRepository->updateUser($user, $request->all());
            $this->profileRepository->updateProfile($profile, $request->all());
            if ($request->hasFile('avatar')) {
                $this->profileRepository->handleAvatarImage($profile, $request->file('avatar'));
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput($request->all())->with([
                'status' => 'Danger',
                'message' => 'Неочекувана грешка. Ве молиме обидете се повторно.'
            ]);
        }

        return redirect()->route('homepage')->with([
            'status' => 'Success',
            'message' => 'Вашиот профил е зачуван успешно.'
        ]);
    }
}