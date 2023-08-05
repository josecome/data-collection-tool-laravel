@extends('template')
@section('main')
<main>
<div style="width: 100%; overflow: hidden;">
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
</main>
@endsection
