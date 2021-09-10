<?php 
	// Inicializar el componente modal
	$datos_modal['selector'] = 'btn-confirmar';
	$datos_modal['title'] = 'Quitar artículo';
	$datos_modal['texto'] = '¿Esta seguro que desea quitar el artóculo de la promoción?';
?>

<div class="container">
 	<h2 class="text-center margin-top margin-bottom"><?php echo $promocion->nombre ?></h2>
 	<hr>
 	<div class="row">
 		<div class="col">
 			<div class="form-group">
 				<label for="vencimiento">Vencimiento</label>
 				<input type="date" class="form-control" value="<?php echo $promocion->vencimiento ?>" readonly>
 			</div>
 		</div>
 		<div class="col">
 			<div class="form-group">
 				<label for="">Descuento</label>
 				<input type="text" value="<?php echo floatval($promocion->descuento) * 100 ?>%" readonly class="form-control">
 			</div>
 		</div>
 	</div>
 	<hr>
 	<div class="row">
 		<div class="col">
 			<div class="text-right margin-right margin-bottom">
 				<button id="btn-agregar" class="btn btn-primary btn-agregar-articulo mouse-hand"> Agregar artículo</button>
 			</div>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col">
 			<div class="table-responsive">
 				<table class="table table-bordered table-stripped mydatatable">
 					<thead class="thead-light">
 						<tr>
 							<th>Nombre</th>
 							<th>Precio venta</th>
 							<th>Precio Promocion</th>
 							<th>Acción</th>
 						</tr>
 					</thead>
 					<tbody class="text-center">
 						<?php foreach ($articulos as $articulo): ?>
 							<tr id="articulo-<?php echo $articulo->id ?>">
 								<td><?php echo $articulo->nombre ?></td>
 								<td>$<?php echo $articulo->precio_venta ?></td>
 								<td>$<?php echo (floatval($articulo->precio_venta) - (floatval($articulo->precio_venta) * $promocion->descuento)) ?></td>
 								<td><button class="btn btn-danger btn-quitar mouse-hand"><i class="fa fa-trash"></i> Borrar</button></td>
 							</tr>
 						<?php endforeach ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>
 </div>
 <?php 
 	$this->load->view('componentes/modal_confirm',$datos_modal);   // DIRECCIÓN DE LA VISTA
 ?>
 <!-- Modal -->
 <div class="modal fade" id="md-agregar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Agregar artículo a promoción</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
       		<div class="container">
       			<div class="row">
       				<div class="col">
       					<div class="form-group">
       						<label for="">Articulo</label>
       						<select id="nuevo_articulo">
       							<?php foreach ($otros_articulos as $otro): ?>
       								<option value="<?php echo $otro->id ?>"><?php echo $otro->nombre ?></option>
       							<?php endforeach ?>
       						</select>
       					</div>
       					<div class="text-center margin-top margin-bottom">
       						<span class="badge badge-danger invisible"> </span>
       					</div>
       				</div>
       			</div>
       		</div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary mouse-hand" data-dismiss="modal">Cancelar</button>
         <button id="btn-guardar-articulo" type="button" class="btn btn-primary mouse-hand">Guardar</button>
       </div>
     </div>
   </div>
 </div>
 <script>
 	jQuery(document).ready(function($) {

 		let idPromocion = '<?php echo $promocion->id ?>',
 		idArticulo = undefined

 		$('#btn-agregar').click(function(event) {
 			$('#md-agregar').modal('show')
 		})

 		$('#nuevo_articulo').focusin(function(event) {
 			$('#mensaje-error').addClass('invisible')
 		})

 		$('#btn-guardar-articulo').click(function(event) {
			if($('#nuevo_articulo').val()){
				$.ajax({
		 			url: '<?php echo base_url('promociones/agregar_articulo') ?>',
		 			type: 'POST',
		 			data: {promocion: idPromocion,articulo: $('#nuevo_articulo').val()},
		 		})
		 		.done(function() {
		 			location.reload()
		 		})
		 		.fail(function() {
		 			$('#mensaje-error').text('Se produjo un error en el servidor. Intente nuevamente').removeClass('invisible')
		 		})
			}else{
				$('#mensaje-error').text('Seleccione una opcion').removeClass('invisible')
			}			 		 		
 		})

 		$('.btn-quitar').click(function(event) {
 			idArticulo = $(this).closest('tr').attr('id').replace('articulo-','')
 			$('#modal-confirm').modal('show')
 		})
 		
 		$('#btn-confirmar').click(function(event) {
 			// Quitar!!
 			$.ajax({
 				url: '<?php echo base_url('promociones/quitar_articulo') ?>',
 				type: 'POST',
 				data: {articulo: idArticulo,promocion: idPromocion},
 			})
 			.done(function() {
 				location.reload()
 			})
 			.fail(function() {
		 		$('#mensaje-error').text('Se produjo un error en el servidor. Intente nuevamente').removeClass('invisible')
 			})
 			
 		})

 	})
 </script>