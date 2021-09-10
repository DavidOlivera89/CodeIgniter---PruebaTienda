<?php 
	// Inicializar el componente modal
	$datos_modal['selector'] = 'btn-confirmar';
	$datos_modal['title'] = 'Borrando categoría';
	$datos_modal['texto'] = '¿Está seguro que desea borrar la categoría?';
?>
<div class="container">
	<h2 class="text-center margin-top triple-margin-bottom">Lista de categorías</h2>
	<div class="row margin-bottom text-right">
		<div class="col">
			<a href="<?php echo base_url('categoria/crear') ?>" class="btn btn-success mouse-hand margin-right"><i class="fa fa-plus" aria-hidden="true"></i> Crear</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-bordered table-stripped w-100 mydatatable">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php foreach ($categorias as $categoria): ?>
							<tr id="<?php echo "categoria-$categoria->id" ?>">
								<td><?php echo $categoria->id ?></td>
								<td class="nombre-categoria"><?php echo $categoria->nombre ?></td>
								<td>
									<button class="btn btn-primary mouse-hand btn-editar"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
									<button class="btn btn-danger mouse-hand btn-borrar"><i class="fa fa-trash" aria-hidden="true"></i> Borrar</button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="md-edicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        	<div class="form-group">
        		<label for="">Categoria</label>
        		<input id="md-nombre" type="text" class="form-control">
        	</div>
        	<div class="text-center">
        		<span id="mensaje-error" class="badge badge-danger invisible">Errrorrr</span>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mouse-hand" data-dismiss="modal">Cancelar</button>
        <button id="btn-guardar-edicion" type="button" class="btn btn-primary mouse-hand"><i class="fa fa-save"></i> Guardar</button>
      </div>
    </div>
  </div>
</div>
<?php 
	$this->load->view('componentes/modal_confirm',$datos_modal);   // DIRECCIÓN DE LA VISTA
?>
<script>
	jQuery(document).ready(function($) {
		let registroSeleccionado
		
		// Acción al hacer clic en el botón de editar
		$('.btn-editar').click(function(event) {
			armarRegistro(this)
			$('#md-nombre').val(registroSeleccionado.nombre)
			$('#md-edicion').modal('show')
		})

		// Acción al guardar la edición
		$('#btn-guardar-edicion').click(function(event) {
			if(registroSeleccionado.nombre != $('#md-nombre').val()){
				registroSeleccionado.nombre = $('#md-nombre').val()
				guardarEdicion()		
			}else{
				$('#mensaje-error').text('La categoría no fue modificada').removeClass('invisible')
			}
		})

		// Acción al presionar enter en el nuevo nombre y al ingresar al input
		$('#md-nombre').keyup(function(e) {
			if(e.keyCode == 13){guardarEdicion()}
		})
		.focusin(function(event) {
			$('#mensaje-error').addClass('invisible')
		})

		// Realizar el foco en el nuevo nombre, una vez se muestre el modal
		$('#md-edicion').on('shown.bs.modal', function (e) {
			$('#md-nombre').focus()
		})

		// AJAX para guardar la edición
		function guardarEdicion(){
			if($('#md-nombre').val()){
				$.ajax({
					url: '<?php echo base_url('categoria/guardar_edicion') ?>',
					type: 'POST',
					data: registroSeleccionado,
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
					$('#mensaje-error').text('Ocurrió un problema en el servidor y no se pudo completar la acción').removeClass('invisible')
				})
			}else{
				$('#mensaje-error').text('Ingrese un nombre para la categoría').removeClass('invisible')
			}
		}

		// Acción al hacer clic en el botón guardar
		$('.btn-borrar').click(function(event) {
			armarRegistro(this)
			$('#modal-confirm').modal('show')
		})

		// AJAX para borrar categoria, previo confirmación
		$('#btn-confirmar').click(function(event) {
			$.ajax({
				url: '<?php echo base_url('categoria/borrar_categoria') ?>',
				type: 'POST',
				data: registroSeleccionado,
			})
			.done(function() {
				location.reload()
			})
			.fail(function() {
				$('#mensaje-error').text('Ocurrió un problema en el servidor y no se pudo completar la acción').removeClass('invisible')
			})
			
		})

		// Agrupa el registro en edición, en base a la tabla
		function armarRegistro(dato){
			$trEdicion = $(dato).closest('tr') 
			registroSeleccionado = {
				id: $($trEdicion).attr('id').replace('categoria-',''),
				nombre: $($trEdicion).find('.nombre-categoria').html()
			}
		}
	})
</script>

