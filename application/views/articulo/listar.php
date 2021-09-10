<?php 
	// Inicializar el componente modal
	$datos_modal['selector'] = 'btn-confirmar';
	$datos_modal['title'] = 'Borrando artículo';
	$datos_modal['texto'] = '¿Está seguro que desea borrar el artículo?';
?>
<div class="container-fluid">
	<h2 class="text-center margin-top margin-bottom">Lista de artículos</h2>
	<div class="row">
		<div class="col">
			<div class="text-right margin-right margin-bottom">
				<a href="<?php echo base_url('articulo/crear') ?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Crear</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-bordered table-stripped mydatatable text-center">
					<thead class="thead-light">
						<tr>
							<th>Nombre</th>
							<th>Precio Compra</th>
							<th>Precio Venta</th>
							<th>Categoría</th>
							<th>Descripción</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($articulos as $articulo): ?>
							<?php $nombre_categoria = $this->db_util->get('categoria',$articulo->categoria)->nombre ?>
							<tr id="<?php echo "articulo-$articulo->id" ?>">
								<td class="nombre"><?php echo $articulo->nombre ?></td>
								<td class="precio_compra">$<?php echo $articulo->precio_compra ?></td>
								<td class="precio_venta">$<?php echo $articulo->precio_venta ?></td>
								<td class="categoria <?php echo "categoria-$articulo->categoria" ?>"><?php echo $nombre_categoria ?></td>
								<td><small class="descripcion"><?php echo $articulo->descripcion ?></small></td>
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
<div class="modal fade" id="md-edicion" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        		<label for="">Nombre</label>
        		<input id="md-nombre" type="text" class="form-control" placeholder="Nombre del artículo">
        	</div>
        	<div class="form-group">
        		<label for="">Precio compra</label>
        		<div class="input-group">
        			<span class="input-group-addon">$</span>
        			<input id="md-precio_venta" type="number" class="form-control" placeholder="$0.00">
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="">Precio venta</label>
        		<div class="input-group">
        			<div class="input-group-addon">$</div>
        			<input id="md-precio_compra" type="number" class="form-control" placeholder="$0.00">
        		</div>	
        	</div>
        	<div class="form-group">
        		<label for="">Descripción</label>
        		<textarea name="descripcion" id="md-descripcion" rows="3" class="form-control" placeholder="Descripción del producto"></textarea>
        	</div>
        	<div class="form-group">
        		<label for="">Categoria</label>
        		<select name="md-categoria" id="md-categoria">
        			<option value="0">Seleccione una categoría</option>
        			<?php foreach ($categorias as $categoria): ?>
        				<option value="<?php echo $categoria->id ?>"><?php echo $categoria->nombre ?></option>
        			<?php endforeach ?>
        		</select>
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

		$('input, textarea, select')
		.focusin(function(event) {
			$('#mensaje-error').addClass('invisible')
		})

		$('.btn-editar').click(function(event) {
			armarRegistro(this)
			rellenarModal()
			$('#md-edicion').modal('show')
		})

		$('#btn-guardar-edicion').click(function(event) {
			if($('#md-nombre').val()){
				agruparDatos()
				$.ajax({
					url: '<?php echo base_url('articulo/guardar_edicion') ?>',
					type: 'POST',
					data: registroSeleccionado,
				})
				.done(function(resp) {
					JSONResp = JSON.parse(resp)
					if(JSONResp.status == 'success'){
						window.location.href = '<?php echo base_url('articulo/listar') ?>'
					}else{
						$('#mensaje-error').text(JSONResp.mensaje).removeClass('invisible')
					}
				})
				.fail(function() {
					$('#mensaje-error').text('Ocurrió un problema en el servidor').removeClass('invisible')
				})
				
			}else{
				$('#mensaje-error').text('Debe especificar un nombre').removeClass('invisible')
			}
		})

		$('.btn-borrar').click(function(event) {
			armarRegistro(this)
			$('#modal-confirm').modal('show')
		})

		// AJAX para borrar categoria, previo confirmación
		$('#btn-confirmar').click(function(event) {
			$.ajax({
				url: '<?php echo base_url('articulo/borrar_articulo') ?>',
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

		function agruparDatos(){
			registroSeleccionado.nombre = $('#md-nombre').val()
			registroSeleccionado.precio_compra = $('#md-precio_compra').val()
			registroSeleccionado.precio_venta = $('#md-precio_venta').val()
			registroSeleccionado.descripcion = $('#md-descripcion').val()
			registroSeleccionado.categoria = $('#md-categoria').val()
		}

		// Rellena los datos del modal, en base al registro armado
		function rellenarModal(){
			$('#md-nombre').val(registroSeleccionado.nombre)
			$('#md-precio_compra').val(registroSeleccionado.precio_compra)
			$('#md-precio_venta').val(registroSeleccionado.precio_venta)
			$('#md-descripcion').val(registroSeleccionado.descripcion)
			$('#md-categoria').val(registroSeleccionado.categoria).trigger('change')
		}

		// Agrupa el registro en edición, en base al TR de la tabla
		function armarRegistro(dato){
			$trEdicion = $(dato).closest('tr') 
			registroSeleccionado = {
				id: $($trEdicion).attr('id').replace('articulo-',''),
				nombre: $($trEdicion).find('.nombre').html(),
				precio_venta: $($trEdicion).find('.precio_venta').html(),
				precio_compra: $($trEdicion).find('.precio_compra').html(),
				descripcion: $($trEdicion).find('.descripcion').html(),
				categoria: 
				// Selecciono y obtengo las clases: categoria categoria-NUMERO
				$($trEdicion).find('.categoria').attr('class')
				// Genero un array con corte en donde se encuentre un espacio: [categoria, categoria-NUMERO]
				.split(' ')
				// Filtro al item que sea distinto de categoria: [categoria-NUMERO] y selecciono el item que queda
				.filter(function(text) {
					return text != 'categoria'
				})[0]
				// Quito el texto 'categoria-'
				.replace('categoria-','')
			}
		}

	})
</script>