<div class="container">
	<h2 class="text-center margin-top margin-bottom">Modificar acceso</h2>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label for="password_actual">Contraseña actual</label>
				<input type="password" id="password_actual" class="form-control" placeholder="******">
			</div>
			<div class="form-group">
				<label for="nueva_password">Contraseña nueva</label>
				<input type="password" id="nueva_password" class="form-control" placeholder="******">
			</div>
			<div class="form-group">
				<label for="password_repetida">Repita la contraseña nueva</label>
				<input type="password" id="password_repetida" class="form-control" placeholder="******">
			</div>
			<div class="text-center">
				<span id="mensaje-error" class="badge badge-danger margin-bottom invisible">Error</span>
			</div>
			<div class="text-center">
				<button id="btn-limpiar" class="btn btn-secondary mouse-hand"> Limpiar</button>
				<button id="btn-cambiar" class="btn btn-primary mouse-hand"><i class="fa fa-save"></i> Cambiar</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#password_actual').focus()

		$('#btn-limpiar').click(function(event) {
			$('input').val('').first().focus()
		})

		$('input').focusin(function(event) {
			$('#mensaje-error').addClass('invisible')
		})	

		$('#btn-cambiar').unbind().click(function(event) {
			if($('#nueva_password').val() && $('#password_repetida').val() && $('#password_actual').val()){
				if($('#nueva_password').val() == $('#password_repetida').val()){
					$.ajax({
						url: '<?php echo base_url('acceso/guardar_cambio') ?>',
						type: 'POST',
						data: {actual: $('#password_actual').val(),nueva: $('#nueva_password').val()},
					})
					.done(function(resp) {
						JSONResp = JSON.parse(resp)
						if(JSONResp.status == 'success'){
							location.reload()
						}else{
							$('#mensaje-error').text(JSONResp.mensaje).removeClass('invisible')
						}
					})
					.fail(function() {
						$('#mensaje-error').text('Ocurrió un problema en el servidor').removeClass('invisible')
					})
					
				}else{
					$('#mensaje-error').text('La nueva contraseña no coincide').removeClass('invisible')
				}
			}else{
				$('#mensaje-error').text('Debe completar todos los campos').removeClass('invisible')
			}
		})
	})
</script>