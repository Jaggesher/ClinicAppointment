<?php
/**
 * Created by PhpStorm.
 * User: Jaggesher
 * Date: 16-Mar-18
 * Time: 12:10 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\category;
use App\doctor;
use App\district;

class CommonController extends Controller
{
    public function Error()
    {
        return View('error');
    }

    public function ShowDoctors()
    {
        $dbVar = category::all();
        $dbVar2 = district::all();

        return view('Doctor.doctors')->with('Categories', $dbVar)->with('Zones', $dbVar2);
    }

    public function Doctors(Request $request)
    {
        $district = $request->district;
        $category = $request->category;

        if ($district == "" && $category !="")
            $dbVar = doctor::where('category', $category)->get();
        else if($district != "" && $category =="")
            $dbVar = doctor::where('district', $district)->get();
        else
            $dbVar = doctor::where('district', $district)->where('category', $category)->get();
        $data = '';

        foreach ($dbVar as $Personal) {

            $data .= '<div class="col-sm-3">
			            <div class="mem_box">
			                <h2><strong> <i>' . $Personal->name . '</i></strong></h2>
			                <h3>' . $Personal->category . '</h3>
			                <h4>Zone : ' . $Personal->district . '</h4>
			                <h5>' . $Personal->sort_msg . '</h5>
			                <div class="mem_btn_div">
			                    <form role="form" method="get" action="' . route('ViewDoc', ['id' => $Personal->id]) . '">
			                        <input type="hidden" name="id" value="' . $Personal->id . '">
			                        <button name="action" value="accept" class="btn btn-default btn-md" type="submit" data-toggle="tooltip" data-placement="bottom" title="View" ><i class="glyphicon glyphicon-eye-open"></i></button>
			                    </form>
			                </div>
			            </div>
			        </div>';
        }
        if ($data == '') {
            $data = ' <br>
	        <br>
	        <br>
	        <br>
	        <h1 class="alert alert-success text-center">We Are Sorry. Currently We have No Doctors Of This Category</h1>';
        }

        return $data;
    }

}