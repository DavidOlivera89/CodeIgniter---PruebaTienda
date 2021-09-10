<?php 
  /*
    TEMPLATE:
      $datos['title'] = ''; 												// Titulo para el h2
      $datos['tipo'] = ''; 													// Usado en los titulo. Ej: <span title="borrar item TIPO"></span>
      $datos['href_add'] = ''												// Donde llevara el add. Ej: base_url('carousel/crear');
      $datos['items'] = 													// Colección a iterar 
      $datos['array_col_key'] = array('imagen','titulo','texto','estado'); 	// col_name en la base
      $datos['array_col_name'] = array('Imágen','Título','Texto','Estado');	// nombre a mostrar
      $datos['array_actions'] = array('edit','remove'); 					// Acciones[edit|remove]
      $datos['edit_path'] = base_url('carousel/editar/?id=');				// href al editar
      $datos['path_images'] = 'assets/img/carousel/';						// path hacia imagen
      $datos['db_table'] = 'carousel';										// nombre de la tabla en BD
  */
?>

<div class="container">
	<h2 class="text-center margin-top margin-bottom"><?php echo isset($title) ? $title : 'Lista de items' ?></h2>
	<?php if (isset($href_add)): ?>
		<div class="text-right margin-bottom">
			<a href="<?php echo $href_add ?>" class="btn btn-success" role="button"  title="Crear item <?php echo isset($tipo) ? $tipo : '' ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</a>
		</div>
	<?php endif ?>
	<div class="row">
		<table class="table table-striped mydatatable double">
			<thead class="thead-dark">
				<tr>
					<?php foreach ($array_col_name as $col_name): ?>
						<th class="text-center"><?php echo $col_name ?></th>
					<?php endforeach ?>
					<?php if (isset($array_actions) && $array_actions): ?>
						<th class="text-center">Acciones</th>
					<?php endif ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($items as $item): ?>
					<tr>
						<?php foreach ($array_col_key as $key): ?>
							<?php if ($key == 'estado'){ ?>
								<?php if ($item->$key == 1): ?>
									<td class="text-center"><span class="badge badge-success" title="Se mostrará al publico">Público</span></td>
								<?php else: ?>
									<td class="text-center"><span class="badge badge-secondary" title="Solo se vé en el panel">Privado</span></td>
								<?php endif ?>
							<?php }else if($key == 'imagen'){ ?>
									<td class="text-center"><img style="max-height: 2rem" src="<?php echo base_url($path_images) . $item->$key ?>" alt=""></td>
							<?php }else{ ?>
								<td><?php echo $item->$key ?></td>
							<?php } ?>
							
						<?php endforeach ?>
						<?php if (isset($array_actions) && $array_actions): ?>
							<td class="text-center">
							<?php foreach ($array_actions as $action): ?>
								<?php if ($action == 'edit'): ?>
									<a href="<?php echo $edit_path . $item->id ?>" role="button" class="btn btn-primary" title="Editar item <?php echo isset($tipo) ? $tipo : '' ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
								<?php else: ?>
									<button role="button" class="btn btn-danger mouse-hand btn-remove" id="<?php echo 'item-' . $item->id ?>" title="Borrar item <?php echo isset($tipo) ? $tipo : '' ?>"><i class="fa fa-trash" aria-hidden="true"></i> Borrar</button>
								<?php endif ?>
							<?php endforeach ?>
							</td>
						<?php endif ?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<?php $datos['selector'] = 'confirm-borrar-item';$datos['title'] = 'Borrar item de carousel';$this->load->view('util/modal_confirm',$datos); ?>

<script>
	jQuery(document).ready(function($) {
		var idBorrar;
		$('.btn-remove').unbind().click(function(event) {
			idBorrar = $(this).attr('id').replace('item-','');
			$('#modal-confirm').modal('show');
		});

		$('#confirm-borrar-item').unbind().click(function(event) {
		  	$.ajax({
		  		type: "post",
		  		url: "<?php echo base_url('util/item_delete'); ?>",
		  		cache: false,
		  		data: { 
		  	        'id': idBorrar,
		  	        'table': '<?php echo $db_table ?>'

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