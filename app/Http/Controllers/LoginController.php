<?php


namespace App\Http\Controllers;


use App\Repositories\Contacts\UserRepository;
use Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('pages.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            {
                $redirect = route('user.profile.edit');

                return redirect()->to($redirect);
            }
        }

        if ($this->userRepository->isEmailInUse($request->get('email'))) {
            return redirect()->back()->with([
                'status' => 'Danger',
                'message' => 'Погрешна лозинка.'
            ])->withInput($request->all());
        }

        return redirect()->back()->with([
            'status' => 'Danger',
            'message' => 'Емаилот не е искористен.'
        ])->withInput($request->all());
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }
}