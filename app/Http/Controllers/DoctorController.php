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
use App\category;
use App\district;
use App\doctor;
use Hash;
use Auth;

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:doctor',['except' => 'ViewDoc']);
    }

    public function ViewDoc($id)
    {
        $dbVar = doctor::find($id);
        if($dbVar != null)
        {
            return view('Doctor.viewDoctor')->with('Personal',$dbVar);
        }
        return redirect('error');
    }



    public function EditDoc()
    {
        $id = Auth::guard('doctor')->user()->id;
        $dbVar1 = category::all();
        $dbVar2 = district::all();
        $dbVar3 = doctor::find($id);
        return View('Doctor.EditDoctor')->with('Categories',$dbVar1)->with('Districts',$dbVar2)->with('Personal',$dbVar3);
    }

    public function EditDocSubmit(Request $request)
    {

        $id=Auth::guard('doctor')->user()->id;

        $this->validate($request,[
            'name' => 'required|string|max:45',
            'sort_msg' => 'required|string|max:145',
//            'email' => 'required|string|email|max:255|unique:doctors',
            'category' => 'required|string',
            'district' => 'required|string',
            'description' => 'required|string',
        ]);

        $dbVar = doctor::find($id);
        $dbVar->name = $request->name;
        $dbVar->sort_msg = $request->sort_msg;
        $dbVar->category = $request->category;
        $dbVar->district = $request->district;
        $dbVar->description = $request->description;
        $dbVar->save();

        return redirect()->route('ViewDoc',['id'=>$id]);

    }

    public function EditDocPicSubmit(Request $request)
    {
        $id=Auth::guard('doctor')->user()->id;

        $this->validate($request,[
            'fileToUpload' => 'required|image|mimes:jpeg,jpg,png|max:2500',
        ]);

        $file = $request->file('fileToUpload');

        $dbVar=doctor::find($id);
        $destinationPath="profilePicture";
        $fileName=$id.'D.'.$file->getClientOriginalExtension();
        $uploadSuccess = $file->move($destinationPath, $fileName);
        if($uploadSuccess){
            $dbVar->img=$destinationPath.'/'.$fileName;
            $dbVar->save();
            return redirect()->route('ViewDoc',['id'=>$id]);
        }
        //Here just send a flush message for for someting wrong for storing picture
        $request->session()->flash('wrong', 'Something Went Wrong. Please Try Latter');

        return redirect()->back();
    }

    public function EditPatientPassSubmit(Request $request)
    {
        $id=Auth::guard('doctor')->user()->id;
        $dbVar=doctor::find($id);
        $hashedPassword=$dbVar->password;

        $this->validate($request,[
            'old_password' => 'required|max:15|min:6',
            'password' => 'required|max:15|min:6|confirmed',
        ]);

        if (Hash::check($request->old_password, $hashedPassword)) {
            $dbVar->password=bcrypt($request['password']);
            $dbVar->save();
            return redirect()->route('ViewDoc',['id'=>$id]);
        }

        //Here just send a flush message for invalid old password
        $request->session()->flash('no_match', 'Invalid Old Password');

        return redirect()->back();
    }

}