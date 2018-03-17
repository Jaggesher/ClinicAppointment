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
use App\patient;

class PatientLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:patient',['except' => 'logout']);
    }

    public function Login()
    {
        return View('Patient.Login');
    }

    public function LoginSubmit(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255',
            'password' =>  'required|min:6'
        ]);
        Auth::guard()->logout();
        if(Auth::guard('patient')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
            return redirect('/');
        }

        $errors = ['email' => trans('auth.failed')];

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors($errors);
    }

    public function AddPatient()
    {
        return View('Patient.AddPatient');
    }

    public function AddPatientSubmit(Request $request)
    {
        $this->validate( $request,[
            'fname' => 'required|string|max:20',
            'lname' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:patients',
            'gender' => 'required|string',
            'phone' => 'required|numeric',
            'age' => 'required|integer',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $dbVar=new patient();
        $dbVar->email=$request['email'];
        $dbVar->fname=$request['fname'];
        $dbVar->lname=$request['lname'];
        $dbVar->gender=$request['gender'];
        $dbVar->phone=$request['phone'];
        $dbVar->age=$request['age'];
        $dbVar->password = bcrypt($request['password']);
        $dbVar->save();

        Auth::guard()->logout();
        if(Auth::guard('patient')->attempt(['email' => $request->email,'password' => $request->password])){
            return redirect('/');
        }

        $request->session()->flash('email', 'These credentials do not match our records.');

        return redirect()->back();
    }


    public function logout(Request $request)
    {
        Auth::guard('patient')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

}