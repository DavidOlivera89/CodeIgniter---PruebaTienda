<div class="container">
	<h2 class="text-center margin-top double-margin-bottom">Crear categoria</h2>
	<div class="row">
		<div class="col"></div>
		<div class="col-xl-6 col-sm-10 col-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input id="nombre" type="text" class="form-control" placeholder="Nombre de categoria">
			</div>
			<div class="text-center invisible">
				<span id="mensaje-error" class="badge badge-danger half-margin-bottom">Mensaje de Error!</span>
			</div>
			<div class="text-center">	        
				<button id="btn-limpiar" type="button" class="btn btn-secondary mouse-hand">Limpiar</button>&nbsp;
				<button id="btn-guardar" type="button" class="btn btn-primary mouse-hand"><i class="fa fa-save" aria-hidden="true"></i> Guardar</button>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		
		// Realizar el foco apenas carga la página y esconder el mensaje de error cada vez que nos posicionamos en el input
		$('#nombre')
		.focus()
		.focusin(function(event) {
			$('#mensaje-error').addClass('invisible')
		})

		// Función para limpiar el input
		$('#btn-limpiar').click(function(event) {
			$('#nombre').val('').focus()
		})

		// Acción al hacer clic en guardar
		$('#btn-guardar').click(function(event) {
			crearCategoria()
		})

		// Acción al apretar enter en el nombre de la nueva categoría
		$('#nombre').keyup(function(e) {
			if(e.keyCode == 13){crearCategoria()}
		})

		// AJAX para guardar la categoría
		function crearCategoria(){
			if($('#nombre').val()){
				$.ajax({
					url: '<?php echo base_url('categoria/guardar_categoria') ?>',
					type: 'POST',
					data: {
						nombre: $('#nombre').val()
					},
				})
				.done(function(resp) {
					JSONresp = JSON.parse(resp)
					if(JSONresp.status == 'success'){
						window.location.href = '<?php echo base_url('categoria/listar') ?>'
					}else{
						$('#mensaje-error').text(JSONresp.mensaje).removeClass('invisible')
					}
				})
				.fail(function() {
					$('#mensaje-error').text('Ocurrió un problema en el servidor').removeClass('invisible')
				})
				
			}else{
				$('#mensaje-error').text('Complete el nombre').removeClass('invisible')
			}
		}	
	})
</script>