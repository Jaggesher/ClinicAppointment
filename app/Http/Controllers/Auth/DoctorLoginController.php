<?php
/**
 * Created by PhpStorm.
 * User: Jaggesher
 * Date: 17-Mar-18
 * Time: 3:59 AM
 */

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DoctorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:doctor',['except' => 'logout']);
    }

    public function Login()
    {
        return View('Doctor.Login');
    }

    public function LoginSubmit(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255',
            'password' =>  'required|min:6'
        ]);

        if(Auth::guard('doctor')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
            return redirect('/');
        }

        $request->session()->flash('email', 'These credentials do not match our records.');

        return redirect()->back();
    }


    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

}