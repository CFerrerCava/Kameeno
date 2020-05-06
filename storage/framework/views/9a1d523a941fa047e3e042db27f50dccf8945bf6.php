
<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Gestor de Cuestionarios</h4>
			</div>
			<div class="card-body" id="app_vue">
				<!--
					<cuestionario-listar></cuestionario-listar>
				-->
				<cuestionario-registrar></cuestionario-registrar>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_abajo'); ?>
<script src="/js/app.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\RobertGutierrez\Desktop\Nortec\Kameeno\kameeno\resources\views\panel\cuestionario\mantenedor.blade.php ENDPATH**/ ?>