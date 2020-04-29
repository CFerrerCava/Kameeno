@extends('panel/layout_unt')
@section('content')

<div class="row">
	<div class="col-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Mantenedor perfiles</h4>
			</div>
			<div class="card-body" id="app_vue">
				 <unt-perfiles></unt-perfiles>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script_abajo')
<script src="/js/app.js"></script>
@endsection
