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
use App\date;
use App\serial;
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
            $dbVar1 = date::where('doctor',$id)->get();
            return view('Doctor.viewDoctor')->with('Personal',$dbVar)->with('Dates',$dbVar1);
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


    public function AddDateSubmit(Request $request)
    {
        $this->validate($request,[
            'serial_date' => 'required|date',
            'minute_for_each' => 'required|numeric|max:60',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'chember' => 'required|string',
        ]);
        
        if($request->start_time >= $request->end_time)
        {
            $request->session()->flash('Already_added', 'Check Start And End Date.');
            return redirect()->back();

        }
        
        $st_time = $request->start_time;
        $end_time = $request->end_time;

        

        $time1 = strtotime($request->start_time);
        $time2 = strtotime($request->end_time);
        $time3 = $request->minute_for_each*60;
        $diff = round(abs($time2 - $time1) / 60,2);
        
        $dbVar = date::where('serial_date','=',$request->serial_date)->where('doctor','=',$request->doctor)->get();
        

        if(empty($dbVar)){
            $request->session()->flash('Already_added', 'Check Start And End time & Also Date.');
            return redirect()->back();
        }

        foreach($dbVar as $var)
        {
            $tmStart= strtotime($var->start_time);
            $tmEnd= strtotime($var->end_time);

            if(($time1 <= $tmStart  && $time2>= $tmStart ) || ($time1 <= $tmEnd  && $time2>= $tmEnd ))
            {
                $request->session()->flash('Already_added', 'Check Start And End time & Also Date.');
                return redirect()->back();
            }
        }

        

        if($diff < $request->minute_for_each)
        {
            $request->session()->flash('Already_added', 'Check Start And Ennd time interval.');
            return redirect()->back();
        }
        
        $dbVar = new date;
 
        $dbVar->serial_date = $request->serial_date;
        $dbVar->start_time = $request->start_time;
        $dbVar->end_time = $request->end_time;
        $dbVar->doctor = Auth::guard('doctor')->user()->id;
        $dbVar->chember = $request->chember;

        $dbVar->save();

        while(($time1+$time3) <= $time2)
        {
            $dbVar1 = new serial;
            $dbVar1->start_time = date("H:i",$time1);
            $dbVar1->end_time = date("H:i",$time1+$time3);
            $dbVar1->serial_date = $dbVar->id;
            $dbVar1->save();

            $time1+=$time3;
        }

        $id = Auth::guard('doctor')->user()->id;
        
        return redirect()->route('ViewDoc',['id'=>$id]);

    }

    public function GetList($id)
    {
        $dbVar = date::find($id);
        $dbVar2 = doctor::find($dbVar->doctor);
        $dbVar1 = serial::where('serial_date', $id)->get();
        //return $dbVar;
        return view('Doctor/serialList')->with('Date', $dbVar)->with('Doctor', $dbVar2)->with('Serials', $dbVar1);
    }

}