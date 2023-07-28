<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectFormMeta;

class FormController extends Controller
{
    public function home()
    {
        $data = ProjectFormMeta::all();
        return view('home',['data'=>$data]);
    }
}
