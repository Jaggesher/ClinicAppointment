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
use App\doctor;
use App\category;
use App\district;

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


        Auth::guard()->logout();
        if(Auth::guard('doctor')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
            return redirect('/');
        }

        $errors = ['email' => trans('auth.failed')];

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors($errors);
    }

    public function AddDoc()
    {
        $dbVar1 = category::all();
        $dbVar2 = district::all();
        return View('Doctor.AddDoctor')->with('Categories',$dbVar1)->with('Districts',$dbVar2);
    }

    public function AddDocSubmit(Request $request)
    {
        $this->validate( $request,[
            'name' => 'required|string|max:45',
            'sort_msg' => 'required|string|max:145',
            'email' => 'required|string|email|max:255|unique:doctors',
            'category' => 'required|string',
            'district' => 'required|string',
            'description' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $dbVar = new doctor();

        $dbVar->name = $request->name;
        $dbVar->sort_msg = $request->sort_msg;
        $dbVar->email = $request->email;
        $dbVar->category = $request->category;
        $dbVar->district = $request->district;
        $dbVar->description = $request->description;
        $dbVar->password = bcrypt($request->password);
        $dbVar->save();


        Auth::guard()->logout();
        if(Auth::guard('doctor')->attempt(['email' => $request->email,'password' => $request->password])){
            return redirect('/');
        }

        $request->session()->flash('error', 'Opps!!! Somethings went wrong.');

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

}