<?php
/**
 * Created by PhpStorm.
 * User: Jaggesher
 * Date: 16-Mar-18
 * Time: 12:08 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\category;
use App\district;
use App\doctor;

class DoctorController extends Controller
{
    public function ViewDoctor($id)
    {

    }

    public function AddDoc()
    {
        $dbVar1 = category::all();
        $dbVar2 = district::all();
        return View('Doctor.AddDoctor')->with('Categories',$dbVar1)->with('Districts',$dbVar2);;
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

        return $request->all();
    }

    public function EditDoc($id)
    {
        return View('Doctor.EditDoctor');
    }

    public function EditDocSubmit(Request $request)
    {
        return $request->all();
    }
}