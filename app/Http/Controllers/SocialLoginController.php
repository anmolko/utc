<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user() && Auth::user()->user_type == 'customer') {
            return redirect('/user-dashboard');
        } else {
            return view('frontend.pages.user.login');
        }
    }

    public function dashboard()
    {
        return view('frontend.pages.user.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function CustomerLogin(Request $request){
        $user = User::where('email', '=', $request->input('email'))->first();
        if ($user === null) {
            Session::flash('error','User Email is not registered with us.');
            return redirect()->back();
        }

        $password = Hash::check($request->input('password'), $user->password);
        if(!$password){
            Session::flash('password','User Password does not match.');
            return redirect()->back();
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->user_type == 'customer'){
                //return redirect('/dashboard');
                return redirect()->back();
            }  else {
                Session::flash('warning','You cannot login to '.Auth::user()->user_type.' dashboard!');
                return redirect()->back();
            }

        }
    }

    public function handleGoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user           = Socialite::driver('google')->user();
            $userExisted    = User::where('oauth_id',$user->id)->where('oauth_type','google')->first();

            if($userExisted){
                Auth::login($userExisted);
                return redirect()->route('front-user.dashboard');
            }else{
                $password = $user->getId().$user->getEmail();

                $newuser = User::create([
                    'name'=> $user->getName(),
                    'email'=>$user->getEmail(),
                    'image'=>$user->getAvatar(),
                    'oauth_id'=>$user->getId(),
                    'oauth_type'=>'google',
                    'user_type'=>'customer',
                    'status'=>1,
                    'password'=>Hash::make($password),
                ]);
                Auth::login($newuser);
                return redirect()->route('front-user.dashboard');


            }

        }catch (Exception $exc){
            dd($exc);
        }
    }

    public function handleFacebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user           = Socialite::driver('facebook')->user();
            $userExisted    = User::where('oauth_id',$user->id)->where('oauth_type','facebook')->first();

            if($userExisted){
                Auth::login($userExisted);
                return redirect()->route('front-user.dashboard');
            }else{
                $password = $user->getId().$user->getEmail();

                $newuser = User::create([
                    'name'=> $user->getName(),
                    'email'=>$user->getEmail(),
                    'image'=>$user->getAvatar(),
                    'oauth_id'=>$user->getId(),
                    'oauth_type'=>'facebook',
                    'user_type'=>'customer',
                    'status'=>1,
                    'password'=>Hash::make($password),
                ]);
                Auth::login($newuser);
                return redirect()->route('front-user.dashboard');


            }

        }catch (Exception $exc){
            dd($exc);
        }
    }
}
