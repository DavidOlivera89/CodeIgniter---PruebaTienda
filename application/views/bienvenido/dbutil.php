<style>
	.hljs{display:block;overflow-x:auto;padding:0.5em;background:#F0F0F0}.hljs,.hljs-subst{color:#444}.hljs-comment{color:#888888}.hljs-keyword,.hljs-attribute,.hljs-selector-tag,.hljs-meta-keyword,.hljs-doctag,.hljs-name{font-weight:bold}.hljs-type,.hljs-string,.hljs-number,.hljs-selector-id,.hljs-selector-class,.hljs-quote,.hljs-template-tag,.hljs-deletion{color:#880000}.hljs-title,.hljs-section{color:#880000;font-weight:bold}.hljs-regexp,.hljs-symbol,.hljs-variable,.hljs-template-variable,.hljs-link,.hljs-selector-attr,.hljs-selector-pseudo{color:#BC6060}.hljs-literal{color:#78A960}.hljs-built_in,.hljs-bullet,.hljs-code,.hljs-addition{color:#397300}.hljs-meta{color:#1f7199}.hljs-meta-string{color:#4d99bf}.hljs-emphasis{font-style:italic}.hljs-strong{font-weight:bold}h4{
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
		<a href="#db_save"><li>DB_SAVE </li></a>
		<a href="#db_update"><li>DB_UPDATE</li></a>
		<a href="#db_delete"><li>DB_DELETE</li></a>
		<a href="#db_get"><li>DB_GET</li></a>
		<a href="#db_get_attr"><li>DB_GET_ATTR</li></a>
		<a href="#db_count_result"><li>DB_COUNT_RESULT</li></a>
		<a href="#db_get_paginated_result"><li>DB_GET_PAGINATED_RESULT</li></a>
	</ul>
	<h4 id="db_save">Función: save</h4>
	<p>Función genérica para guardar un registro de la base de datos. Devuelve el ID</p>
	<div>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#db_save_code" role="tab" aria-controls="db_save_code">Código</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#ejemplo_db_save" role="tab" aria-controls="ejemplo_db_save">Ejemplo de uso</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="db_save_code" role="tabpanel">
				<pre>
					<code class="hljs handlebars">
	//RETURN: ID registro insertado
	function save($table,$data){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
					</code>
				</pre>
		  </div>
		  <div class="tab-pane" id="ejemplo_db_save" role="tabpanel">
			<pre><code class="hljs handlebars">
	//Guardar un usuario e imprimir su id
	$usuario = array('nombre' => 'Juan Perez', 'fecha_alta' => Date(),'password' => '123456');
	echo $this->db_util->save('usuario',$usuario);
			</code></pre>
		  </div>
		</div>
	</div>
	<br><br>
	<h4 id="db_update">Función: update</h4>
	<p>Función genérica para actualizar un registro de la base de datos.</p>
	<div>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#db_update_code" role="tab" aria-controls="db_update_code">Código</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#ejemplo_db_update" role="tab" aria-controls="ejemplo_db_update">Ejemplo de uso</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="db_update_code" role="tabpanel">
				<pre>
					<code class="hljs handlebars">
	function update($table,$id,$data){
		$this->db->where('id',$id);
		$this->db->update($table,$data);
	}
					</code>
				</pre>
		  </div>
		  <div class="tab-pane" id="ejemplo_db_update" role="tabpanel">
			<pre><code class="hljs handlebars">
	//Actualizar el nombre de un usuario
	$usuario = array('nombre' => 'Juan Alberto Perez');
	$id = 1;
	$this->db_util->update('usuario',$id,$usuario);
			</code></pre>
		  </div>
		</div>
	</div>
	<br><br>
	<h4 id="db_delete">Función: delete</h4>
	<p>Función genérica para eliminar un registro de la base de datos.</p>
	<div>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#db_delete_code" role="tab" aria-controls="db_delete_code">Código</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#ejemplo_db_delete" role="tab" aria-controls="ejemplo_db_delete">Ejemplo de uso</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="db_delete_code" role="tabpanel">
				<pre>
					<code class="hljs handlebars">
	function delete($table,$id){
		$this->db->delete($table, array('id' => $id)); 
	}
					</code>
				</pre>
		  </div>
		  <div class="tab-pane" id="ejemplo_db_delete" role="tabpanel">
			<pre><code class="hljs handlebars">
	//Eliminar un usuario
	$id = 1;
	$this->db_util->delete($id);
			</code></pre>
		  </div>
		</div>
	</div>
	<br><br>
	<h4 id="db_get">Función: get</h4>
	<p>Función genérica para recuperar registros de la base de datos. Se pueden obtener todos los registros de una tabla, o un registro en particular (especificando el ID)</p>
	<div>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#db_get_code" role="tab" aria-controls="db_get_code">Código</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#ejemplo_db_get" role="tab" aria-controls="ejemplo_db_get">Ejemplo de uso</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="db_get_code" role="tabpanel">
				<pre>
					<code class="hljs handlebars">
	function get($table, $id = null){
		if($id){
			$result = $this->db->get_where($table, array('id' => $id))->result();
			if($result){
				return $result['0'];
			}
			return null;
		}else{
			return $this->db->get($table);
		}
	}
					</code>
				</pre>
		  </div>
		  <div class="tab-pane" id="ejemplo_db_get" role="tabpanel">
			<pre><code class="hljs handlebars">
	//Recuperar un usuario
	$id = 1;
	$usuario = $this->db_util->get('usuario',$id);

	//Recuperar todos los usuarios
	$usuarios = $this->db_util->get('usuario');
			</code></pre>
		  </div>
		</div>
	</div>
	<br><br>
	<h4 id="db_get_attr">Función: get_attr</h4>
	<p>Función genérica para recuperar un registro. Se especifica la tabla, su atributo y el valor de dicho atributo a buscar</p>
	<div>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#db_get_attr_code" role="tab" aria-controls="db_get_attr_code">Código</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#ejemplo_db_get_attr" role="tab" aria-controls="ejemplo_db_get_attr">Ejemplo de uso</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="db_get_attr_code" role="tabpanel">
				<pre>
					<code class="hljs handlebars">
	function get_attr($table,$attr,$value_attr){
		$result = $this->db->get_where($table, array($attr => $value))->result();
		if($result){
			return $result['0'];
		}
		return null;
	}
					</code>
				</pre>
		  </div>
		  <div class="tab-pane" id="ejemplo_db_get_attr" role="tabpanel">
			<pre><code class="hljs handlebars">
	//Recuperar un usuario
	$dni = 10100200;
	$usuario = $this->db_util->get_attr('usuario','dni',$dni);

			</code></pre>
		  </div>
		</div>
	</div>
	<br><br>
	<h4 id="db_count_result">Función: count_result</h4>
	<p>Función genérica para contar la cantidad de registros obtenidos. Se especifica la tabla, el atributo y el valor de dicho atributo a buscar</p>
	<div>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#db_code_count_result" role="tab" aria-controls="db_code_count_result">Código</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#ejemplo_db_count_result" role="tab" aria-controls="ejemplo_db_count_result">Ejemplo de uso</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="db_code_count_result" role="tabpanel">
				<pre>
					<code class="hljs handlebars">
	function get_attr($table,$attr,$value_attr){
		$result = $this->db->get_where($table, array($attr => $value))->result();
		if($result){
			return $result['0'];
		}
		return null;
	}
					</code>
				</pre>
		  </div>
		  <div class="tab-pane" id="ejemplo_db_count_result" role="tabpanel">
			<pre><code class="hljs handlebars">
	//Recuperar un usuario
	$dni = 10100200;
	$usuario = $this->db_util->get_attr('usuario','dni',$dni);

			</code></pre>
		  </div>
		</div>
	</div>
	<br><br>
	<h4 id="db_get_paginated_result">Función: get_paginated_result</h4>
	<p>Función genérica para paginar los registros obtenidos. Se especifica la tabla, el atributo y el valor de dicho atributo a buscar</p>
	<div>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#db_code_get_paginated_result" role="tab" aria-controls="db_code_get_paginated_result">Código</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#ejemplo_get_paginated_result" role="tab" aria-controls="ejemplo_get_paginated_result">Ejemplo de uso</a>
		  </li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane active" id="db_code_get_paginated_result" role="tabpanel">
				<pre>
					<code class="hljs handlebars">
	function get_paginated_result($table,$page,$size){
		$sql = 'SELECT * FROM ' . $table . ' LIMIT ' . (($page - 1) * $size) . ',' . $size;
		return $this->db->query($sql)->result();
	}
					</code>
				</pre>
		  </div>
		  <div class="tab-pane" id="ejemplo_get_paginated_result" role="tabpanel">
			<pre><code class="hljs handlebars">
	//Recuperar los primeros 10 usuarios
	$tamaño = 10;$pagina = 1;
	$primeros_diez = $this->db_util->get_paginated_result('usuario',$tamaño,$pagina);

	//Recuperar los segundos 10 usuarios
	$tamaño = 10;$pagina = 2;
	$segundos_diez = $this->db_util->get_paginated_result('usuario',$tamaño,pagina);


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