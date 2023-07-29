<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectFormMeta;

class FormController extends Controller
{
    public function home()
    {
        $deployed = ProjectFormMeta::where('form_status', 'deployed')->get(); //all();
        $draft = ProjectFormMeta::where('form_status', 'draft')->get();
        $arquived = ProjectFormMeta::where('form_status', 'arquived')->get();
        return view('home',
                [
                    'form_deployed'=>$deployed,
                    'form_draft'=>$draft,
                    'form_arquived'=>$arquived,
                ]
            );
    }
}
