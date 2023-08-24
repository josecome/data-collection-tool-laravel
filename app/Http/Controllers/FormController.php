<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\ProjectFormMeta;
use App\Models\ProjectForm;
use Exception;

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

    public function formpage(string $id)
    {
        $formid = ProjectFormMeta::find($id)->get(); //all();
        $deployed = ProjectFormMeta::where('form_status', 'deployed')->get(); //all();
        $draft = ProjectFormMeta::where('form_status', 'draft')->get();
        $arquived = ProjectFormMeta::where('form_status', 'arquived')->get();
        $form_fields = ProjectForm::where('form_meta_id', $id)->get();
        return view('home',
                [
                    'form_id'=>$formid,
                    'form_deployed'=>json_decode($deployed),
                    'form_draft'=>json_decode($draft),
                    'form_arquived'=>json_decode($arquived),
                    'fields'=>json_decode($form_fields)
                ]
            );
    }
    public function createnewform(Request $req) {
        $result = "";
        try{
            $proj = new ProjectFormMeta;
            $proj->form_name = $req->form_name;
            $proj->form_description = $req->form_description;
            $proj->form_country = $req->form_country;
            $proj->form_field = $req->form_field;
            $proj->form_status = 'draft';
            $proj->user_id = 1;
            $proj->save();
            return Redirect::to('/formpage/' . $proj->id )->with('success', $result);
        } catch(Exception $e) {
            $result = 'Error ocurred: ' . $e->getMessage();
            return back()->with('error', $result);
        }
    }
}
