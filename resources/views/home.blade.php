@extends('template')
@section('main')
<main>
<div style="width: 100%; overflow: hidden;">
            <div style="width: 280px; float: left;">
                <div style="color: white; background-color: black; width: 100%;">Deployed</div>
                @foreach ($form_deployed as $f)
                 <span>{{ $f->form_name }}</span>
                @endforeach
               <div style="color: white; background-color: black; width: 100%;">Draft</div>
               @foreach ($form_draft as $f)
               <span>{{ $f->form_name }}</span>
               @endforeach
               <div style="color: white; background-color: black; width: 100%;">Arquived</div>
               @foreach ($form_arquived as $f)
               <span>{{ $f->form_name }}</span>
               @endforeach
            </div>
            <div style="margin-left: 300px;">
               No Data to Display
            </div>
    </div>
</main>
@endsection
