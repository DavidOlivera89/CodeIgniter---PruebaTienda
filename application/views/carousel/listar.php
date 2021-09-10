<?php 
	$items_carousel = $this->db_util->get('carousel');
 ?>
<div class="container">
	<h2 class="text-center">Lista de items del carousel</h2>
</div>

<div class="container" style="margin-bottom: 1rem">
	<div class="text-right"><a  href="<?php echo base_url('carousel/crear'); ?>" ><button class="btn btn-success btn-md" role="button" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</button></a></div>
</div>
<div  class="container contenedor">
	<table class="table tabla-dt">
		<thead>
			<tr>
				<th>Imagen</th>
				<th class="text-center">Titulo</th>
				<th>Texto botón</th>
				<th>Visibilidad</th>
				<th class="text-center">Acción</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($items_carousel as $item): ?>
				<tr id="<?php echo $item->id ?>">
					<td class="text-center">
						<?php if ($item->imagen): ?>
							<img style="max-height: 45px" src="<?php echo base_url('/assets/img/carousel') . '/' . $item->imagen . '?=' . Date('U') ?>" alt="">
						<?php else: ?>
							<img style="max-height: 45px" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="">
						<?php endif ?>
					</td>
					<td class="text-center"><?php echo $item->titulo ?></td>
					<td><?php echo $item->texto ?></td>
					<?php if ($item->estado == 1): ?>
						<td><span class="label label-success">Publicado</span></td>
					<?php else: ?>
						<td><span class="label label-warning">Privado</span></td>
					<?php endif ?>
					<td class="text-center"><a href="<?php echo base_url('carousel/editar/?id=') . $item->id; ?>"><button class="btn btn-primary btn-md" type="button" role="button"><span class="glyphicon glyphicon-edit"></span> Editar</button></a>&nbsp;<button type="button" role="button" class="btn btn-danger btn-md borrar"><span class="glyphicon glyphicon-trash"></span> Borrar</button></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
	    <br>
	    <div class="text-center">
	     <h5 class="modal-title text-center">¿Seguro que desea borrar este artículo?</h5>
	     <br>
		  <button type="button" id="borrar-articulo" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Borrar</button>
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		</div>
		<br>
    </div>
  </div>
</div> 

<script>
	$(document).ready(function() {
		var idBorrar;
		d = new Date();
		$('.borrar').unbind().click(function(event) {
			idBorrar = $(this).parent().parent().attr('id');
			$('.bd-example-modal-lg').modal();
		});

		$('#borrar-articulo').unbind().click(function(event) {
			$.ajax({
				type: "post",
				url: "<?php echo base_url('carousel/borrar_item'); ?>",
				cache: false,
				data: { 
			        'id': idBorrar

			    }
			}).done(function(resp) {
				if (resp == 'success'){
					window.location.replace("<?php echo base_url('carousel/listar') ?>");
				}
			}).fail(function() {
				console.log("error");
			});
		});
	});
</script>