<?php


namespace App\Http\Controllers;


use App\Http\Requests\RegisterRequest;
use App\Repositories\Contacts\UserProfileRepository;
use App\Repositories\Contacts\UserRepository;
use Exception;

class RegisterController extends Controller
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

    public function index()
    {
        return view('pages.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        try {
            $user = $this->userRepository->createNewUser($request->all());
            $this->profileRepository->createNewProfile($request->all(), $user);
        } catch (Exception $e) {
            return redirect()->back()->withInput($request->all())->with([
                'status' => 'Danger',
                'message' => 'Неочекувана грешка. Ве молиме обидете се повторно.'
            ]);
        }

        return redirect()->route('login')->with(['status' => 'Success', 'message' => 'Успешна регистрација.']);
    }
}