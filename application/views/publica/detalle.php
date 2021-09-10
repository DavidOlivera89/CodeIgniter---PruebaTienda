
<div class="container">
	<h2 class="text-center margin-top margin-bottom">Detalle del producto</h2>
	<div class="row">
		<div class="col-xl-6 col-sm-6 col-12">
			<div class="form-group">
				<div class="form-group">
					<label for="">Nombre</label>
					<input id="nombre" type="text" class="form-control" value="<?php echo $articulo->nombre ?>" readonly>
				</div>
				<div class="form-group">
					<label for="">Categoria</label>
					<div class="input-group">
						<div class="input-group-addon"></div>
						<input id="precio_compra" type="text" class="form-control"value="<?php echo $categoria->nombre ?>" readonly>
					</div>	
				</div>
				<div class="form-group">
					<label for="">Precio venta</label>
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input id="precio_compra" type="number" class="form-control"value="<?php echo $articulo->precio_venta ?>" readonly>
					</div>	
				</div>
				<div class="form-group">
					<label for="">Descripción</label>
					<textarea name="descripcion" id="descripcion" rows="3" class="form-control" placeholder="Descripción del producto" readonly><?php echo $articulo->descripcion ?></textarea>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-sm-6 col-12 text-center">
			<div class="form-group">
				<label for="">Imagen del producto</label>
				<img src="https://picsum.photos/500/400/?image=<?php echo $articulo->id ?>" alt="" class="w-100">
			</div>
		</div>
	</div>
</div>