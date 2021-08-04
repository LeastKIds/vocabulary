<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $profile = new User();
        $profile -> name = $request['name'];
        $profile -> email = $request['email'];
        $profile -> password = Hash::make($request->password);

        // $profile -> save();

        $user = User::create([
            'name' => $profile->name,
            'email' => $profile->email,
            'password' => $profile->password,
        ]);

        // dd($profile);

        // $json = response()->json($profile);

        // return $json;

        event(new Registered($user));

        // Auth::login($user);
        
        // return redirect(RouteServiceProvider::HOME);

        return response("회원가입이 완료되었습니다.");

        // return response($profile);
    }

}
