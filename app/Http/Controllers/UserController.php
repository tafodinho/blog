<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//use Illuminate\Support\ViewErrorBag;

class UserController extends Controller
{
    public function signUp(Request $request)
    {
        $this->validate($request, [
              'email' => 'required|email|unique:users',
              'first_name' => 'required|max:120',
              'password' => 'confirmed|required|min:6',
              'password_confirmation' => 'required'
          ]);

        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        $user = new User();

        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function signInPage()
    {
        return view('login');
    }

    public function signIn(Request $request)
    {
        $this->validate($request, [
              'email' => 'required|email',
              'password' => 'required'
          ]);
        $message = "Invalid Login Details!";
        if(Auth::attempt( ['email' => $request['email'], 'password' => $request['password'] ])) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with(['message' => $message]);;
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }

    public function saveAccount(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:120'
        ]);

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();

        $file = $request->file('image');
        $filename = $request['first_name'] . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('account');
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new response($file, 200);
    }
}
