@extends('layouts.client')
@section('title') INFORMACION PERSONAL @endsection
@section('content')
    <div class="content-wizard">
        <form-wizard-unt names="{{$data->names}}" email="{{$data->email}}" dni="{{$data->dni}}" ></form-wizard-unt>
    </div>
@endsection



