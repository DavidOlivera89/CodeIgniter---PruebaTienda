<div class="container">
	<div class="h2 text-center margin-top margin-bottom">Categorías</div>
	<div class="row">
		<?php foreach ($categorias as $categoria): ?>
			<?php if ($categoria->id > 0): ?>
				<div class="col-xl-4 col-md-6 col-12">
					<a href="<?php echo base_url('categoria_producto/') . $categoria->id ?>" class="no-link">
						<div class="card w-100 margin-top mouse-hand">
						  <img class="card-img-top" src="https://picsum.photos/500/400/?image=<?php echo $categoria->id ?>" alt="Card image cap">
						  <div class="card-body text-center">
						    <h5 class="card-title"><?php echo ucfirst($categoria->nombre) ?></h5>
						  </div>
						</div>
					</a>
				</div>
			<?php endif ?>
		<?php endforeach ?>


				<div class="col-xl-4 col-md-6 col-12">
					<a href="<?php echo base_url('nuestras_marcas')?>" class="no-link">
						<div class="card w-100 margin-top mouse-hand">
						  <img class="card-img-top" src="https://picsum.photos/500/400/?image=<?php echo 7 ?>" alt="Card image cap">
						  <div class="card-body text-center">
						    <h5 class="card-title"><?php echo ucfirst("MARCAS") ?></h5>
						  </div>
						</div>
					</a>
				</div>
	
		
	</div>
</div>