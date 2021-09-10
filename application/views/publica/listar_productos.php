<div class="container">
	<h2 class="text-center margin-top"><?php echo $titulo_lista ?></h2>
	<div class="row double-margin-top">
		<div class="col-xl-4 col-sm-6 col-12">
			<?php foreach ($productos as $producto): ?>
				<a href="<?php echo base_url('inicio/detalle/') . $producto->id ?>" class="no-link">
					<div class="card w-100 margin-top">
					  <img class="card-img-top" src="https://picsum.photos/500/400/?image=<?php echo $producto->id ?>" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title text-center"><?php echo $producto->nombre ?></h5>
					  </div>
					</div>
				</a>
			<?php endforeach ?>
		</div>
	</div>
</div>