<style>
	.hljs{display:block;overflow-x:auto;padding:0.5em;background:#F0F0F0}.hljs,.hljs-subst{color:#444}.hljs-comment{color:#888888}.hljs-keyword,.hljs-attribute,.hljs-selector-tag,.hljs-meta-keyword,.hljs-doctag,.hljs-name{font-weight:bold}.hljs-type,.hljs-string,.hljs-number,.hljs-selector-id,.hljs-selector-class,.hljs-quote,.hljs-template-tag,.hljs-deletion{color:#880000}.hljs-title,.hljs-section{color:#880000;font-weight:bold}.hljs-regexp,.hljs-symbol,.hljs-variable,.hljs-template-variable,.hljs-link,.hljs-selector-attr,.hljs-selector-pseudo{color:#BC6060}.hljs-literal{color:#78A960}.hljs-built_in,.hljs-bullet,.hljs-code,.hljs-addition{color:#397300}.hljs-meta{color:#1f7199}.hljs-meta-string{color:#4d99bf}.hljs-emphasis{font-style:italic}.hljs-strong{font-weight:bold}
	h4{
		color: #0275d8;
	}
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<div class="container" style="margin-top: 20px; margin-bottom: 300px">
	<button id="volver" style="cursor: pointer" class="btn btn-default"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver</button>	
	<h2 class="text-center">Model: Util.php</h2>
	Funciones:
	<ul>
		<a href="#template"><li>Template</li></a>
		<a href="#logueado"><li>Usuario logueado</li></a>
		<a href="#esta_logueado"><li>Está logueado</li></a>
	</ul>
	<br><br>
	<h4 id="template">Función: Template</h4>
	<p>Esta función nos permite cargar de manera rápida una plantilla HTML5. Se divide el contenido de la plantilla en 3 partes. La primer parte se encuentra en <code>header.php</code>, la segunda es el contenido que queremos mostrar y la tercera es <code>footer.php</code> que se encarga de cerrar la plantilla. </p>
	<p>La plantilla usa para definir sus estilos Bootstrap. Adicionalmente cuenta con los Temas que ofrece <a href="https://bootswatch.com/4-alpha/" target="_blank">Bootswatch</a>, con lo cual podemos seleccionar en la variable <code>$theme</code> el tema que deseamos utilizar. La lista de temas disponibles está en los comentarios del código.</p>
	<div id="funcion-template">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#php" role="tab" aria-controls="php">PHP</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#header" role="tab" aria-controls="header">header.php</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#footer" role="tab" aria-controls="footer">footer.php</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="php" role="tabpanel">
				<pre><code class="hljs handlebars">
	/* Posibles Temas: bootstrap,cerulean,cosmo,cyborg,darkly,flatly,journal,literal,lumen,lux
	materia,minty,pulse,sandstone,simplex,slate,solar,spacelab,superhero,united,yeti */

	//Tema seleccionado
	var $theme = 'bootstrap';

	//Carga el template de HTML5 con las librerias necesarias
	function template($view,$data = null){
		if($data){
			$data['theme'] = $this->theme; //Se carga el tema seleccionado
			$this->load->view('template/header', $data);
			$this->load->view($view, $data);
			$this->load->view('template/footer', $data);
		}else{
			$data['theme'] = $this->theme; //Se carga el tema seleccionado
			$this->load->view('template/header',$data);
			$this->load->view($view);
			$this->load->view('template/footer');
		}
	}
				</code></pre>
		  </div>
		  <div class="tab-pane" id="header" role="tabpanel">
			<pre><code class="hljs handlebars">
	&lt;?php
		$default_theme = 'bootstrap-theme/'. $theme . '.min.css'; 
		$estilos  = array($default_theme,'font-awesome.min.css','dataTables.bootstrap4.min.css');
	?&gt;
	&lt;!DOCTYPE html&gt;
	&lt;html lang="es"&gt;
	&lt;head&gt;
		&lt;meta charset="utf-8"&gt;
		&lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
		&lt;link rel="icon" type="image/x-icon" href="&lt;?php echo base_url('assets/favicon.ico') ?&gt;" /&gt;
		&lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;
		&lt;title>&lt;?php echo isset($titulo) ? $titulo : '' ?&gt;&lt;/title&gt;
		&lt;?php foreach ($estilos as $estilo): ?&gt;
			&lt;link rel="stylesheet" type="text/css" href="&lt;?php echo base_url('assets/css/' . $estilo); ?&gt;"&gt;
		&lt;?php endforeach ?&gt;
		&lt;script src="&lt;?php echo base_url('assets/js/jquery.min.js') ?&gt;" type="text/javascript" charset="utf-8"&gt;&lt;/script&gt;

	&lt;/head&gt;
	&lt;body&gt;
				
			</code></pre>
		  </div>
		  <div class="tab-pane" id="footer" role="tabpanel">
		  	<pre><code class="hljs handlebars">
	&lt;?php 
	//Lista de librerias
	$scripts  = array('tether.min.js','bootstrap.min.js','jquery.dataTables.min.js',
			'dataTables.bootstrap4.min.js','bootstrap-notify.min.js');
	?&gt;
	&lt;?php foreach ($scripts as $script): ?&gt;
		&lt;script src="&lt;?php echo base_url('assets/js/' . $script) ?>" type="text/javascript" charset="utf-8">&lt;/script&gt;
	&lt;?php endforeach ?&gt;
	&lt;/body&gt;
	&lt;/html&gt;
			</code></pre>
		  </div>
		</div>
	</div>
	<strong>Ejemplo:</strong>
	<p>Si nos encontramos en el controlador <code>Usuarios.php</code> y queremos cargar la plantilla para listar todos los usuarios del sistema, basta con realizar la siguiente función</p>
	<small><strong>PRECONDICIÓN:</strong> Ya tenemos una vista creada dentro de la carpeta <code>application/view/usuarios</code>  con el nombre <code>listar.php</code></small>

	<pre>
		<code class="hljs handlebars">
&lt;?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	//Listar todos los usuarios
	function listar(){
		$datos['titulo']  = 'Lista de usuarios';
		$this->util->template('usuarios/listar',$datos);
	}
}
?&gt;

		</code>
	</pre>
	<br><br>
	<h4 id="logueado">Función: Logueado</h4>
	<p>Esta función nos devuelve el usuario que se encuentra logueado</p>
	<div>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#codigo_logueado" role="tab" aria-controls="codigo_logueado">Código</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#ejemplo_logueado" role="tab" aria-controls="ejemplo_logueado">Ejemplo de uso</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="codigo_logueado" role="tabpanel">
				<pre>
					<code class="hljs handlebars">
	// RETURN: $data['status'] -> 'in' / 'out'
	function user_logged(){
		$value = $this->session->userdata('userData');
		if($value){
			$data = json_decode($value,true);
			$data['status'] = 'in';
		}else{
			$data['status'] = 'out';
		}
		return $data;
	}
					</code>
				</pre>
		  </div>
		  <div class="tab-pane" id="ejemplo_logueado" role="tabpanel">
			<pre><code class="hljs handlebars">
	//Imprimir el usuario logueado
	$usuario_logueado = $this->util->user_logged();
	print_r($usuario_logueado);
			</code></pre>
		  </div>
		</div>
	</div>
	
	<br><br>
	<h4 id="esta_logueado">Función: Está logueado</h4>
	<p>Es una función rápida que verifica si se encuentra alguien logueado</p>
	<div>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#codigo_esta_logueado" role="tab" aria-controls="codigo_esta_logueado">Código</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#ejemplo_esta_logueado" role="tab" aria-controls="ejemplo_esta_logueado">Ejemplo de uso</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="codigo_esta_logueado" role="tabpanel">
	<pre>
		<code class="hljs handlebars">
	// RETURN: true / false
	function is_logged(){
		return $this->usuario_logueado()['status'] == 'in';
	}	
		</code>
	</pre>
		  </div>
		  <div class="tab-pane" id="ejemplo_esta_logueado" role="tabpanel">
			<pre><code class="hljs handlebars">
	//Verificar si hay alguien logueado
	echo $this->util->is_logged ? 'logueado' : 'no logueado';
			</code></pre>
		  </div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#volver').unbind().click(function(event) {
			window.location.replace("<?php echo base_url('bienvenido'); ?>");
		});
	});
</script>