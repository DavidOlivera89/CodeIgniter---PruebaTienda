<div class="container">
	<h2 class="text-center margin-top margin-bottom">Mis datos personales</h2>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label for="cuit">CUIT</label>
				<input type="number" id="cuit" class="form-control" placeholder="Ingrese su CUIT sin puntos" value="<?php echo isset($datos_personales->cuit) ? $datos_personales->cuit : '' ?>">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" id="nombre" class="form-control" placeholder="Ingrese su nombre"  value="<?php echo isset($datos_personales->nombre) ? $datos_personales->nombre : '' ?>">
			</div>
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="number" id="telefono" class="form-control" placeholder="Ingrese su telefono" value="<?php echo isset($datos_personales->telefono) ? $datos_personales->telefono : '' ?>">
			</div>
			<div class="form-group">
				<label for="correo">Correo electrónico</label>
				<input type="text" id="correo" class="form-control" placeholder="Ingrese su correo (Ej: mail@ejemplo.com)" value="<?php echo isset($datos_personales->correo) ? $datos_personales->correo : '' ?>">
			</div>
			<div class="form-group">
				<label for="nacimiento">Fecha Nacimiento</label>
				<input type="date" id="nacimiento" class="form-control" value="<?php echo isset($datos_personales->nacimiento) ? $datos_personales->nacimiento : '' ?>">
			</div>
			<div class="text-center margin-top margin-bottom">
				<span id="mensaje-error" class="badge badge-danger invisible"> Errro</span>
			</div>
			<div class="text-center">
				<button id="btn-limpiar" class="btn btn-secondary mouse-hand"> Limpiar</button>
				<button id="btn-guardar" class="btn btn-success mouse-hand"><i class="fa fa-save"></i> Guardar</button>
			</div>
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function($) {

		$('#cuit').focus()


		$('#btn-limpiar').click(function(event) {
			$('input').val('').first().focus()
		})

		$('#btn-guardar').click(function(event) {
			if(validarEmail($('#correo').val())){
				$.ajax({
					url: '<?php echo base_url('usuario/gurdar_datos_personales') ?>',
					type: 'POST',
					data: agruparDatos(),
				})
				.done(function() {
					location.reload()
				})
				.fail(function() {
					$('#mensaje-error').text('Ocurrió un problema en el servidor, intentelo nuevamente').removeClass('invisible')
				})
				
			}else{
				$('#mensaje-error').text('El correo debe respetar el formato ejemplo@dom.com').removeClass('invisible')
			}		
		})	

		$('input').focusin(function(event) {
			$('#mensaje-error').addClass('invisible')
		})


		// Validar email
		function validarEmail(email) {
		    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		    return re.test(String(email).toLowerCase());
		}

		//Agrupar los datos
		function agruparDatos(){
			return {
				cuit: $('#cuit').val(),
				nombre: $('#nombre').val(),
				telefono: $('#telefono').val(),
				correo: $('#correo').val(),
				nacimiento: $('#nacimiento').val()
			}
		}
	})
</script>