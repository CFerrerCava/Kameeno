@extends('layouts.client')
@section('title') INFORMACION PERSONAL @endsection
@section('content')
    <div class="content-wizard">
        <form-wizard-unt names="{{$data->names}}" appaterno="{{$data->appaterno}}" apmaterno="{{$data->apmaterno}}"  email="{{$data->email}}" dni="{{$data->dni}}" ></form-wizard-unt>
    </div>
@endsection



