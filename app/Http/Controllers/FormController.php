<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectFormMeta;
use App\Models\ProjectForm;
use Exception;

class FormController extends Controller
{
    public function home()
    {
        $forms = ProjectFormMeta::whereIn('form_status', ['deployed', 'draft', 'archived'])->get();

        $deployed = $forms->where('form_status', 'deployed');
        $draft = $forms->where('form_status', 'draft');
        $arquived = $forms->where('form_status', 'archived');

        return view(
            'home',
            [
                'form_deployed' => $deployed,
                'form_draft' => $draft,
                'form_arquived' => $arquived,
            ]
        );
    }

    public function formpage(string $id)
    {
        $formid = ProjectFormMeta::find($id);
        $forms = ProjectFormMeta::whereIn('form_status', ['deployed', 'draft', 'archived'])->get();

        $deployed = $forms->where('form_status', 'deployed');
        $draft = $forms->where('form_status', 'draft');
        $arquived = $forms->where('form_status', 'archived');

        return view(
            'home',
            [
                'form_id' => $formid,
                'form_deployed' => $deployed,
                'form_draft' => $draft,
                'form_arquived' => $arquived,
                'fields' => ProjectFormMeta::find($id)->projectform,
            ]
        );
    }
    public function createnewform(Request $req)
    {
        $result = "";
        try {
            $proj = new ProjectFormMeta;
            $proj->form_name = $req->form_name;
            $proj->form_description = $req->form_description;
            $proj->form_country = $req->form_country;
            $proj->form_field = $req->form_field;
            $proj->form_status = 'draft';
            $proj->user_id = 1;
            $proj->save();
            return Redirect::to('/formpage/' . $proj->id)->with('success', $result);
        } catch (Exception $e) {
            $result = 'Error ocurred: ' . $e->getMessage();
            return back()->with('error', $result);
        }
    }
    public function submitnewfield(Request $req)
    {
        $result = "";
        try {
            $proj = new ProjectForm;
            $proj->field_name = $req->field_name;
            $proj->field_label = $req->field_label;
            $proj->field_description = $req->field_description;
            $proj->field_type = $req->field_type;
            $proj->field_size = $req->field_size;
            $proj->form_meta_id = $req->form_meta_id;
            $proj->user_id = 1;
            $proj->save();
            return Redirect::to('/formpage/' . $proj->id)->with('success', $result);
        } catch (Exception $e) {
            $result = 'Error ocurred: ' . $e->getMessage();
            return back()->with('error', $result);
        }
    }
    public function deployform(Request $req)
    {
        $result = "";
        try {
            ProjectFormMeta::whereId((int) $req->form_url_d)->update(['form_status' => 'deployed']);
            $create_table_qry = "";
            DB::statement($create_table_qry);
            return Redirect::to('/formpage/' . $req->form_url_d)->with('success', $result);
        } catch (Exception $e) {
            $result = 'Error ocurred: ' . $e->getMessage();
            return back()->with('error', $result);
        }
    }
    public function archiveform(Request $req)
    {
        $result = "";
        try {
            ProjectFormMeta::whereId((int) $req->form_url_a)->update(['form_status' => 'archived']);

            return Redirect::to('/formpage/' . $req->form_url_a)->with('success', $result);
        } catch (Exception $e) {
            $result = 'Error ocurred: ' . $e->getMessage();
            return back()->with('error', $result);
        }
    }
    public function deployedFormOnlineGet(Request $req, $id)
    {
        return view('deployedform');
    }
    public function deployedFormOnlinePost(Request $req, $id)
    {
        $insert_query = "INSERT INTO XXX () VALUES (?,?)";
        $insert_params = [];
        DB::insert($insert_query, $insert_params);
        return view('deployedform');
    }
}
