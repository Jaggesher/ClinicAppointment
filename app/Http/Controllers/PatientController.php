<?php
/**
 * Created by PhpStorm.
 * User: Jaggesher
 * Date: 16-Mar-18
 * Time: 12:08 AM
 */

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\patient;
use Hash;

class PatientController extends Controller
{

    public function ViewPatient($id)
    {
        $dbVar=patient::find($id);
        return View('Patient.ViewPatient')->with('Personal',$dbVar);
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

        return $request->all();
    }

    public function EditPatient()
    {
        $id = 1;
        $dbVar=patient::find($id);
        if($dbVar != null)
        {
            return view('Patient.EditPatient')->with('Personal',$dbVar);
        }

        return redirect('error');
    }

    public function EditPatientSubmit(Request $request)
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