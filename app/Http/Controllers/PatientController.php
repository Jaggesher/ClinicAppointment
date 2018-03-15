<?php
/**
 * Created by PhpStorm.
 * User: Jaggesher
 * Date: 16-Mar-18
 * Time: 12:08 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function ViewPatient($id)
    {

    }

    public function AddPatient()
    {
        return View('Patient.AddPatient');
    }

    public function AddPatientSubmit(Request $request)
    {
        return $request->all();
    }

    public function EditPatient($id)
    {
        return View('Patient.EditPatient');
    }

    public function EditPatientSubmit(Request $request)
    {
        return $request->all();
    }

}