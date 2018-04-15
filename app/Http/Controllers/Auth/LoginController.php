<?php

namespace App\Http\Controllers\Auth;
use Socialite;
use App\SocialProvider as SocialProvider;
use App\User as User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/all/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
          $socialUser = Socialite::driver('google')->user();
        }
        catch(\Exception $e) {
            return redirect('/');
        }

        // check if we have logged provider...
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
        if(!$socialProvider) {
            // create a new user and provider...
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName()]
            );

            $user->socialProviders()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => 'google']
            );
        }
        else {
            $user = $socialProvider->user;
        }

        auth()->login($user);

        return redirect()->route('home', 'all');
    }
}
