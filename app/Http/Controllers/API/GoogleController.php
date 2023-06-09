<?php

namespace App\Http\Controllers\API;
use Exception;



use App\Models\Google_user;
use App\Models\Tb_google;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SocialAccount;
use PhpParser\Node\Stmt\Catch_;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect('/');
        }

        $authUser = $this->findOrCreateUser($user, $provider);


        Auth()->login($authUser, true);

        if($authUser->profile == null){
            return redirect('/profile/create');
        }


        return redirect('/');
    }

    public function findOrCreateUser($socialUser, $provider)
    {


            $user = User::where('email', $socialUser->getEmail())->first();


            if (!$user) {
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => encrypt('12345678')
                ]);
            }

            return $user;
        }
    }


