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
               @if(isset($form_id)) {{ $form_id[0]->form_name }} @else No Form Selected @endif
            </div>
    </div>
</main>
@endsection
