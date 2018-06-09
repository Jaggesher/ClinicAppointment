<?php
/**
 * Created by PhpStorm.
 * User: Jaggesher
 * Date: 16-Mar-18
 * Time: 12:09 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\district;
use App\category;
use App\doctor;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function AdminAdd()
    {
        $dbVar1= category::all();
        $dbVar2= district::all();
        return view('Admin.AdminAdd')->with('Categories',$dbVar1)->with('Districts',$dbVar2);
    }

    public function NewDistrict(Request $request)
    {
        $this->validate( $request,[
            'district' => 'required|string|max:145|unique:districts',
        ]);

        $dbVar = new district();
        $dbVar->district = $request->district;
        $dbVar->save();

        return redirect(route('AdminAdd'));
    }

    public function NewCategory(Request $request)
    {
        $this->validate( $request,[
            'category' => 'required|string|max:145|unique:categories',
        ]);

        $dbVar = new category();
        $dbVar->category = $request->category;
        $dbVar->save();

        return redirect(route('AdminAdd'));

    }

    public function DeleteCategory(Request $request)
    {
        if($request->id != null)
        {
            $id= $request->id;
            $dbvar= category::find($id);
            if($dbvar != null) {
                $dbvar->delete();
                return redirect(route('AdminAdd'));
            }
        }
        return redirect(route('error'));
    }

    public function DeleteDistrict(Request $request)
    {
        if($request->id != null)
        {
            $id= $request->id;
            $dbvar= district::find($id);
            if($dbvar != null) {
                $dbvar->delete();
                return redirect(route('AdminAdd'));
            }
        }
        return redirect(route('error'));
    }

    public function DeleteDoctor(Request $request)
    {
        $flight = doctor::find($request->DoctorId);
        $flight->delete();
        return redirect(route('Doctors'));

    }
}