<?php
/**
 * Created by PhpStorm.
 * User: Jaggesher
 * Date: 16-Mar-18
 * Time: 12:10 AM
 */

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;

class CommonController extends Controller
{
    public function Error()
    {
        return View('error');
    }
}