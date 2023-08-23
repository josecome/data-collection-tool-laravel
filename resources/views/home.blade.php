@extends('template')
@section('main')
<main>
<div style="width: 100%; overflow: hidden;">
            <div style="width: 280px; float: left;">
                <button type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#formModal"
                        style="width: 100%;"
                >
                New Project
                </button><br>
            <div style="width: 280px; float: left;">
                <div style="color: white; background-color: #2471A3; width: 100%;">Deployed</div>
                @foreach ($form_deployed as $key=>$f)
                 <div @class([
                    'projects_name',
                    'projects_name_y' => $key % 2 == 0,
                    'projects_name_n' => $key % 2 == 1,
                    ])>
                    <form action="/formpage/{{ $f->id }}" style="float: left; padding-right: 4px;">
                        <button type="submit" class="">{{ $f->form_name }}</button>
                    </form>
                </div>
                @endforeach
               <div style="color: white; background-color: #2471A3; width: 100%;">Draft</div>
               @foreach ($form_draft as $key=>$f)
               <div @class([
                    'projects_name',
                    'projects_name_y' => $key % 2 == 0,
                    'projects_name_n' => $key % 2 == 1,
                    ])>{{ $f->form_name }}</div>
               @endforeach
               <div style="color: white; background-color: #2471A3; width: 100%;">Arquived</div>
               @foreach ($form_arquived as $key=>$f)
               <div @class([
                    'projects_name',
                    'projects_name_y' => $key % 2 == 0,
                    'projects_name_n' => $key % 2 == 1,
                    ])>{{ $f->form_name }}</div>
               @endforeach
            </div>
            <div style="margin-left: 300px;">
               @if(isset($form_id))
                    <h3>{{ $form_id[0]->form_name }}</h3>
                    <form action="/formpage/submitnewfield" style="width: 100%">
                    <table style="width: 100%">
                      <tr>
                        <td>
                            Name:
                        </td>
                        <td>
                            <input type="name" class="form-control" id="name" placeholder="Enter name" style="width: 260px">
                        </td>
                        <td>
                            Label:
                        </td>
                        <td>
                            <input type="name" class="form-control" id="name" placeholder="Enter name" style="width: 260px">
                        </td>
                        <td>
                            Type:
                        </td>
                        <td>
                            <select class="form-control" id="qtype" style="width: 260px">
                                <option>String</option>
                                <option>Integer</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Type:
                        </td>
                        <td>
                            <select class="form-control" id="qtype" style="width: 260px">
                                <option>Type</option>
                                <option>Select</option>
                            </select>
                        </td>
                        <td>
                            Length:
                        </td>
                        <td>
                            <input type="name" class="form-control" id="name" placeholder="Enter name" style="width: 260px">
                        </td>
                        <td colspan="2">
                            <button type="submit" class="">Add</button>
                        </td>
                      </tr>
                      <tr>
                      <td colspan="6"><hr style="width: 100%;"/></td>
                      </tr>
                    </table>
                </form>
               @else
                    <h3>No Form Selected </h3>
               @endif
            </div>
    </div>
    <!-- New Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="NewProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="NewProjectModalLabel">New Project</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/createnewform/" method="post" class="new_project_form">
                @csrf
                <p>
                    <label for="id_form_name">Form name:</label>
                    <input type="text" name="form_name" maxlength="80" required id="id_form_name">
                </p>
                <p>
                    <label for="id_form_description">Form description:</label>
                    <input type="text" name="form_description" maxlength="160" required id="id_form_description">
                </p>
                <p>
                    <label for="id_form_country">Form country:</label>
                    <input type="text" name="form_country" maxlength="40" required id="id_form_country">
                </p>
                <p>
                    <label for="id_form_field">Form field:</label>
                    <input type="text" name="form_field" maxlength="80" required id="id_form_field">
                </p>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
