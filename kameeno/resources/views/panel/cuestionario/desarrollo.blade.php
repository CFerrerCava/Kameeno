@extends('panel/layout')
@section('content')

<div class="row">
	<div class="col-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Responder cuestionario</h4>
			</div>
			<div class="card-body" id="app_vue">
				<!--
					<cuestionario-listar></cuestionario-listar>
					<cuestionario-registrar></cuestionario-registrar>
					<cuestionario-resolver></cuestionario-resolver>
				-->
				<cuestionario-resolver idcuestionario="{{$id}}"></cuestionario-resolver>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script_abajo')
<script src="/js/app.js"></script>
@endsection
