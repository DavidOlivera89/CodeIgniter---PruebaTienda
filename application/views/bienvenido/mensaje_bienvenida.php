<?php $path_logos = 'assets/img/logos/' ?>
<style type="text/css" media="screen">
	.jumbotron a{
		color: #373a3c;
		text-decoration: none; 
	}

	.tab-pane{
		min-height: 300px;
	}

	#logos img{
	    transition: 0.3s ease;
	    margin: 0px 5px;
	}

	#logos img:hover{
	    transform: scale(1.5, 1.5); /** default is 1, scale it to 1.5 */
	}
</style>
<br>
<div class="container">
	<div class="row">
		
		<div class="jumbotron col">
		  <h1 class="display-3 text-center">Bienvenido!</h1>
		  <p class="lead"><a href="https://codeload.github.com/bcit-ci/CodeIgniter/zip/3.1.5" target="_blank">CodeIgniter v3.1.5</a> - Adaptado.</p>
		  <ul class="nav nav-tabs" role="tablist">
		    <li class="nav-item">
		      <a class="nav-link active" data-toggle="tab" href="#librerias" role="tab">Librerias</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" data-toggle="tab" href="#modelos" role="tab">Modelos</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" data-toggle="tab" href="#controladores" role="tab">Controladores</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" data-toggle="tab" href="#pdf" role="tab">HTML2PDF</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" data-toggle="tab" href="#cropper" role="tab">Cortar Imágenes</a>
		    </li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div class="tab-pane active" id="librerias" role="tabpanel">
		    	<br>
		    	<p>Contiene precargadas las siguientes librerías</p>
		    	<ul>
		    		<li>JQuery 3.2.1 [<strong><a href="<?php echo base_url('assets/js/jquery.min.js') ?>" target="_blank">JS</a></strong>]</li>
		    		<li>Bootstrap 4 (Alpha 4) [<strong><a href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" target="_blank">CSS</a></strong> - <strong><a href="<?php echo base_url('assets/js/bootstrap.min.js') ?>" target="_blank">JS</a></strong>]</li>
		    		<li>Tether [<strong><a href="<?php echo base_url('assets/js/tether.min.js') ?>" target="_blank">JS</a></strong>]</li>
		    		<li title='class="mydatatable"'>DataTable Bootstrap 4 [<strong><a href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" target="_blank">CSS</a></strong> - <strong><a href="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js') ?>" target="_blank">JS</a></strong>]</li>
		    		<li>Boostrap Notify 3.1.3 [<strong><a href="<?php echo base_url('assets/js/bootstrap-notify.min.js') ?>" target="_blank">JS</a></strong>]</li>
		    		<li title='Todos los <select>'>Select2 4.0.3 [<strong><a href="<?php echo base_url('assets/css/select2.min.css') ?>" target="_blank">CSS</a></strong> - <strong><a href="<?php echo base_url('assets/js/select2.min.js') ?>" target="_blank">JS</a></strong>]</li>
		    		
		    		<li title='class="datepicker"'>Bootstrap DatePicker 1.7.1 [<strong><a href="<?php echo base_url('assets/css/bootstrap-datepicker.min.css') ?>" target="_blank">CSS</a></strong> - <strong><a href="<?php echo base_url('assets/js/bootstrap-datepicker.min.js') ?>" target="_blank">JS</a></strong>]</li>
		    		<li title='class="datetimepicker"'>Bootstrap DateTimePicker 1.7.1 [<strong><a href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css') ?>" target="_blank">CSS</a></strong> - <strong><a href="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js') ?>" target="_blank">JS</a></strong>]</li>
		    		<li>Font-Awesome 4.7.0 [<strong><a href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" target="_blank">CSS</a></strong> | <strong><a href="<?php echo base_url('bienvenido/icons') ?>">Galería de iconos</a></strong>]</li>
		    	</ul>
		    	<div id="logos" class="text-center">
		    		<img src="<?php echo base_url($path_logos . 'codeigniter.svg') ?>" alt="" height="50px;">
		    		<img src="<?php echo base_url($path_logos . 'jquery.gif') ?>" alt="" height="50px;">
		    		<img src="<?php echo base_url($path_logos . 'bootstrap.svg') ?>" alt="" height="50px;">
		    		<img src="<?php echo base_url($path_logos . 'datatable.png') ?>" alt="" height="50px;">
		    		<img src="<?php echo base_url($path_logos . 'select2.png') ?>" alt="" height="50px;">
		    		<img src="<?php echo base_url($path_logos . 'font-awesome.png') ?>" alt="" height="50px;">
		    		<img src="<?php echo base_url($path_logos . 'html2pdf.gif') ?>" alt="" height="50px;">
		    	</div>
		    </div>
		    <div class="tab-pane" id="modelos" role="tabpanel">
		    	<br>
		    	<p>Modelos con funciones útiles precargadas:</p>
		    	<ul>
		    		<li><strong>Util.php</strong> <a href="<?php echo base_url('bienvenido/util'); ?>">( Detalle <i class="fa fa-external-link" aria-hidden="true"></i> )</a></li>
		    		<p>Está formado por un conjunto de funciones utiles para un desarrollo.</p>
		    		<li><strong>DBUtil.php</strong> <a href="<?php echo base_url('bienvenido/dbutil'); ?>">( Detalle <i class="fa fa-external-link" aria-hidden="true"></i> )</a></li>
		    		<p>Contiene funciones que simplifican las tareas a la hora de realizar operaciones con la base de datos.</p>
		    	</ul>
		    </div>
		    <div class="tab-pane" id="controladores" role="tabpanel">
		    	Controladores
		    </div>
		    <div class="tab-pane" id="pdf" role="tabpanel">
		    	PDF
		    </div>
		    <div class="tab-pane" id="cropper" role="tabpanel">
		    	Cortar imágenes
		    	
		    </div>
		  </div>
		  
		  
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function($) {
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#blah').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		});
	});
</script>