<?php namespace App;

use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Http\Request;
//use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use App\User;


class AuthenticateUser{
	private $socialite;
	public  $user;
	public $request;
	public function __construct(User $users,Socialite $socialite,Request $request)
	{
		$this->user =$users;
		$this->socialite =$socialite;
		$this->request=$request;
		
	}

	public function execute($hasCode)
	{
		if (! $hasCode)
			return $this->getAuthorizationFirst();

		$data =$this->getSocialUser();
		//dd($data);

		$user = $this->user->UpdateCreateUser($data);
		if(isset($user->sessionValue))
		{
			\Auth::login($user, true);
			session()->flash('alert','You are logged in with Facebook');
        	session()->flash('alert_type','alert-success');
			return redirect('/profile/'.$user->id);
		}

		\Auth::login($user, true);
		session()->flash('alert','Thanks for registering with Facebook');
        session()->flash('alert_type','alert-success');
		return redirect('/profile/'.$user->id);
		
	}


	private function getAuthorizationFirst()
	{
		return $this->socialite->driver('facebook')->redirect();
	}

	private function getSocialUser()
	{
		if($this->request->has('error') =='access_denied'){
          return redirect('login');
        }

		$state = $this->request->get('state');
    	$this->request->session()->put('state',$state);
    	if(\Auth::check()==false){
          session()->regenerate();
        }

		$user=$this->socialite->driver('facebook')
				->fields([ 
                    'first_name', 
                    'name',
                    'email',
                    'last_name', 
                    'gender', 
                    'verified'
                ])->user();
              return  $user; 
		return $this->socialite->with('facebook')->user();
	
	}					
}