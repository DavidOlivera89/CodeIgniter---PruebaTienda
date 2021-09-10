<div class="container">
	<h2 class="text-center margin-top marign-bottom">Crear una promoción</h2>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" id="nombre" class="form-control" placeholder="Nombre de la promoción">
			</div>
			<div class="form-group">
				<label for="vencimiento">Vencimiento</label>
				<input type="date" id="vencimiento" class="form-control">
			</div>
			<div class="form-group">
				<label for="descuento">Descuento</label>
				<input type="number" min="1" max="100" id="descuento" class="form-control" placeholder="Desde 1 a 99">
			</div>
			<div class="text-center margin-top margin-bottom">
				<span id="mensaje-error" class="badge badge-danger invisible">Error!</span>
			</div>
			<div class="text-center">
				<button id="btn-limpiar" class="btn btn-secondary"> Limpiar</button>
				<button id="btn-guardar" class="btn btn-primary"><i class="fa fa-save"></i>  Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		$('#nombre').focus()

		$('input').focusin(function() {
			$('#mensaje-error').addClass('invisible')
		})

		$('#btn-guardar').click(function(event) {
			if($('#nombre').val()){
				$.ajax({
					url: '<?php echo base_url('promociones/guardar') ?>',
					type: 'POST',
					data: agruparDatos(),
				})
				.done(function(resp) {
					JSONResp = JSON.parse(resp)
					if(JSONResp.status == 'success'){
						window.location.href  = '<?php echo base_url('promociones/detalle/?id=') ?>' + JSONResp.id
					}else{
						$('#mensaje-error').text(JSONResp.mensaje).removeClass('invisible')
					}
				})
				.fail(function(e) {
					$('#mensaje-error').text('Se produjo un error en el servidor. Intente nuevamente').removeClass('invisible')
				})
			}else{
				$('#mensaje-error').text('Debe especificar al menos el nombre').removeClass('invisible')
			}	
		})

		function agruparDatos(){
			return  {
				nombre:  $('#nombre').val(),
				vencimiento: $('#vencimiento').val(),
				descuento: parseInt($('#descuento').val()) /  100
			}
		}
	})
</script>