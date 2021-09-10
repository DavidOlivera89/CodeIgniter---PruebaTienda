<div class="container">
	<h2 class="text-center margin-top margin-bottom">Lista de promociones</h2>
	<div class="row">
		<div class="col">
			<div class="text-right margin-right margin-bottom"><a href="<?php echo base_url('promociones/crear') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva</a></div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-bordered table-stripped  mydatatable">
					<thead class="thead-light">
						<tr>
							<th>Nombre</th>
							<th>Vencimiento</th>
							<th>Desuento</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php foreach ($promociones as $promocion): ?>
							<tr>
								<td><?php echo $promocion->nombre ?></td>
								<td><?php echo $promocion->vencimiento ?></td>
								<td><?php echo floatval($promocion->descuento) * 100 ?>%</td>
								<td><a href="<?php echo base_url('promociones/detalle/?id=') . $promocion->id ?>" class="btn btn-dark"><i class="fa fa-info"></i> Detalle</a></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>