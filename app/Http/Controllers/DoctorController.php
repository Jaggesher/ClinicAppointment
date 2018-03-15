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

        return $request->all();
    }

    public function EditDoc()
    {
        $id = 1;
        $dbVar1 = category::all();
        $dbVar2 = district::all();
        $dbVar3 = doctor::find($id);
        return View('Doctor.EditDoctor')->with('Categories',$dbVar1)->with('Districts',$dbVar2)->with('Personal',$dbVar3);
    }

    public function EditDocSubmit(Request $request)
    {
        $this->validate($request,[
            'fname' => 'required|string|max:20',
            'lname' => 'required|string|max:20',
            'gender' => 'required|string',
            'phone' => 'required|numeric',
            'age' => 'required|integer',
        ]);

        $id=1;
        $dbVar=patient::find($id);
        $dbVar->fname=$request['fname'];
        $dbVar->lname=$request['lname'];
        $dbVar->gender=$request['gender'];
        $dbVar->phone=$request['phone'];
        $dbVar->age=$request['age'];

        $dbVar->save();

        return redirect()->route('PatientEdit');

        return $request->all();
    }

    public function EditPatientPicSubmit(Request $request)
    {
        $this->validate($request,[
            'fileToUpload' => 'required|image|mimes:jpeg,jpg,png|max:2500',
        ]);

        $file = $request->file('fileToUpload');
        $id=1;
        $dbVar=patient::find($id);
        $destinationPath="profilePicture";
        $fileName=$id.'P.'.$file->getClientOriginalExtension();
        $uploadSuccess = $file->move($destinationPath, $fileName);
        if($uploadSuccess){
            $dbVar->img=$destinationPath.'/'.$fileName;
            $dbVar->save();
            return redirect()->route('PatientEdit');
        }
        //Here just send a flush message for for someting wrong for storing picture
        $request->session()->flash('wrong', 'Something Went Wrong. Please Try Latter');

        return redirect()->back();
    }

    public function EditPatientPassSubmit(Request $request)
    {
        $id=1;
        $dbVar=patient::find($id);
        $hashedPassword=$dbVar->password;

        $this->validate($request,[
            'old_password' => 'required|max:15|min:6',
            'password' => 'required|max:15|min:6|confirmed',
        ]);

        if (Hash::check($request->old_password, $hashedPassword)) {
            $dbVar->password=bcrypt($request['password']);
            $dbVar->save();
            return redirect()->route('PatientEdit');
        }

        //Here just send a flush message for invalid old password
        $request->session()->flash('no_match', 'Invalid Old Password');

        return redirect()->back();
    }
}