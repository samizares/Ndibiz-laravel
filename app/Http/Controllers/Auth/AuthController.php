<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	protected $redirectPath = '/';
     protected $loginPath = '/auth/login';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']);

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $confirmation_code = str_random(30) . $request->input('email');
        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->confirmation_code = $confirmation_code;

        if ($user->save()) {
            $data = array(
                'username' => $user->username,
                'email'     => $user->email,
            );
            \Mail::queue('emails.activate', ['confirmation_code' => $confirmation_code], function($message) use ($user) {
                $message->to($user->email, $user->username)
                    ->subject('Beazea: Verify your email address');
            });
            return view('pages.activate');
        }
        else {
            \Session::flash('message', 'Your account couldn\'t be created please try again');
            return redirect()->back()->withInput();
        }

    }

    public function activateAccount($code, User $user)
    {

        if($user->accountIsActive($code)) {

            \Session::flash('message', 'Success, your account has been activated.');
            return redirect('/');

        }

        \Session::flash('message', 'Your account couldn\'t be activated, please try again');
        return redirect('home');
    }
}
