<div class="container">
	<h2 class="text-center margin-top margin-bottom">Crear artículo</h2>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label for="">Nombre</label>
				<input id="nombre" type="text" class="form-control" placeholder="Nombre del artículo">
			</div>
			<div class="form-group">
				<label for="">Precio compra</label>
				<div class="input-group">
					<span class="input-group-addon">$</span>
					<input id="precio_venta" type="number" class="form-control" placeholder="$0.00">
				</div>
			</div>
			<div class="form-group">
				<label for="">Precio venta</label>
				<div class="input-group">
					<div class="input-group-addon">$</div>
					<input id="precio_compra" type="number" class="form-control" placeholder="$0.00">
				</div>	
			</div>
			<div class="form-group">
				<label for="">Descripción</label>
				<textarea name="descripcion" id="descripcion" rows="3" class="form-control" placeholder="Descripción del producto"></textarea>
			</div>
			<div class="form-group">
				<label for="">Categoria</label>
				<select name="categoria" id="categoria">
					<option value="0">Seleccione una categoría</option>
					<?php foreach ($categorias as $categoria): ?>
						<option value="<?php echo $categoria->id ?>"><?php echo $categoria->nombre ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="text-center">
				<span class="badge badge-danger invisible" id="mensaje-error">aca</span>
			</div>
			<div class="text-center margin-top">
				<button id="btn-limpiar" class="btn btn-secondary mouse-hand"> Limpiar</button>
				<button id="btn-guardar" class="btn btn-primary mouse-hand"><i class="fa fa-save"></i> Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		$('#nombre').focus()

		$('input, textarea, select')
		.focusin(function(event) {
			$('#mensaje-error').addClass('invisible')
		})

		$('#btn-guardar').click(function(event) {
			if($('#nombre').val()){
				$.ajax({
					url: '<?php echo base_url('articulo/guardar') ?>',
					type: 'POST',
					data: agruparDatos(),
				})
				.done(function(resp) {
					JSONResp = JSON.parse(resp)
					if(JSONResp.status == 'success'){
						window.location.href = '<?php echo base_url('articulo/listar') ?>'
					}else{
						$('#mensaje-error').text(JSONresp.mensaje).removeClass('invisible')
					}
				})
				.fail(function() {
					$('#mensaje-error').text('Ocurrió un problema en el servidor').removeClass('invisible')
				})
			}else{
				$('#mensaje-error').text('Debe indicar al menos el nombre del artículo a crear').removeClass('invisible')
			}			
			
		})


		function agruparDatos(){
			return {
				'nombre': $('#nombre').val(),
				'precio_compra': $('#precio_compra').val(),
				'precio_venta': $('#precio_venta').val(),
				'descripcion': $('#descripcion').val() ,
				'categoria': $('#categoria').val() 
			}
		}	
	})
</script>