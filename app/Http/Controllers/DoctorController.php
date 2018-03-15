<?php
/**
 * Created by PhpStorm.
 * User: Jaggesher
 * Date: 16-Mar-18
 * Time: 12:08 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function ViewDoctor($id)
    {

    }

    public function AddDoc()
    {
        return View('Doctor.AddDoctor');
    }

    public function AddDocSubmit(Request $request)
    {
        return $request->all();
    }
}