<div class="container">
	<h2 class="text-center margin-top margin bottom">Probando carousel</h2>
	<div class="row">
		<div class="col-12">
			
			<?php 
			$datos['sliders'] = $this->db_util->get_with_array('carousel',array('estado' => 1));
			$datos['carousel_id'] = 'mi_carousel_home';
			$this->util->template('util/show_carousel',$datos);
			?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-6 margin-top">
			<?php 
				$datos['type'] = 'text';
				$datos['id'] = 'apellido';
				//$datos['value'] = 'Suazo';
				$datos['label'] = 'Su Apellido';
				$datos['placeholder'] = 'Ingrese su apellido';
				$this->util->template('form/input',$datos);
				$datosselect['id'] = 'visibilidad';
				$datosselect['label'] = 'Visibilidad del carousel';
				$datosselect['options'] = $this->db_util->get('visibilidad');
				$this->util->template('form/select',$datosselect);
				$datostextarea['id'] = 'descripcion';
				$datostextarea['label'] = 'Descripción del articulo';
				$this->util->template('form/textarea',$datostextarea);
				$datosimg['id'] = 'img-form';
				$datosimg['label'] = 'Imagen descriptiva';
				$datosimg['aspectX'] = 1;
				$datosimg['aspectY'] = 1;
				$this->util->template('form/img',$datosimg);
			 ?>
		</div>
	</div>
</div>