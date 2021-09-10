<div class="container">
	<h2 class="text-center double-padding-top double-padding-bottom">Acceso al sistema</h2>
	<div class="row">
		<div class="col"></div>
		<div class="col-xl-8 col-md-10 col-12">
			<div class="form-group">
				<label for="">Usuario</label>
				<input id="usuario" type="text" class="form-control" placeholder="Usuario">
			</div>
			<div class="form-group">
				<label for="">Contraseña</label>
				<input id="password" type="password" class="form-control" placeholder="******">
			</div>
			<div class="text-center invisible">
				<span id="mensaje-error" class="badge badge-danger margin-bottom">Mensaje de Error!</span>
			</div>
			<div class="text-center">
				<button id="btn-limpiar" class="btn btn-secondary mouse-hand">Limpiar datos</button>&nbsp;
				<button id="btn-ingresar" class="btn btn-primary mouse-hand"><i class="fa fa-sign-in"></i> Acceder</button>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		// Realizo el foco en el input apenas carga la página
		$('#usuario').focus()
		
		// Acción al hacer clic en el botón limpiar
		$('#btn-limpiar').click(function() {
			// Limpio los inputs de usuario y la contraseña
			$('#usuario, #password').val('')
			// Realizo el foco en el input de usuario
			$('#usuario').focus()
		})

		// Selecciono al input de usuario y contraseña
		$('#usuario,#password')
		// Agrego compartamiento cuando se haga foco en los inputs
		.focusin(function() {
			$('#mensaje-error').addClass('invisible').removeClass('visible')
		})
		// Agrego compartimiento cuando se presione enter dentro de los inputs
		.keyup(function(e) {
			if(e.keyCode == 13){acceder()}
		})

		// Acción al hacer clic en el botón ingresar
		$('#btn-ingresar').click(function() {
			acceder()
		})

		// Si los inputs de usuario y contraseña estan completos, realiza el llamado AJAX
		function acceder(){
			if($('#usuario').val() && $('#password').val()){
				$.ajax({
					url: '<?php echo base_url('acceso/datos_acceso') ?>',
					type: 'POST',
					data: {
							usuario: $('#usuario').val(),
							password: $('#password').val()
					},
				})
				.done(function(resp) {
					if(resp != 'success'){
						$('#mensaje-error').text(resp).removeClass('invisible').addClass('visible')
					}else{
						window.location.href = '<?php echo base_url('panel') ?>';
					}
				})
				.fail(function() {
					$('#mensaje-error').text('Ocurrió un problema en el servidor').removeClass('invisible').addClass('visible')
				})
			}else{
				$('#mensaje-error').text('Complete todos los campos').removeClass('invisible').addClass('visible')
			}
		}

	})
</script>