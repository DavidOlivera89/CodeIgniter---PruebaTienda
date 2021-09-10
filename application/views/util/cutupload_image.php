<?php 

	/* ##TEMPLATE DATA##

	$data_upload['aspectX'] = 4; 					// ASPECTO X
	$data_upload['aspectY'] = 1;					// ASPECTO Y
	$data_upload['titulo'] = 'Subir imagen';		// TITULO DEL MODAL
	$data_upload['imgSelector'] = '#myImg o .img';	// SELECTOR DE LA IMAGEN DONDE SE INYECTARÁ EL SRC RESULTANTE

	*/

	?>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/cropper.min.css'); ?>">
	<style>
	button{cursor: pointer;}
	.btn-edit-image {position: absolute;width: 100%;height: 100%;top: 0;background-color: rgba(0,0,0,.6);visibility: hidden;}
	.btn-edit-image button{position: absolute;top: 40%;left: 45%;}
	.botonera{visibility: hidden;margin-top: 1rem}
	.editor{position: relative;}
</style>

<div id="modal-upload-image" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="text-center"><?php echo isset($titulo) ? $titulo : '' ?></h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="form-group col-12">
							<label for="">Seleccione una imagen</label>
							<input type="file" class="form-control-file" id="input-img" accept=".jpg,.JPG,.PNG,.png">
							<div class="editor text-center">
								<img src="" alt="" class="img-prev" style="max-width: 100%">
								<div class="btn-edit-image"><button class="btn btn-success" type="button" id="btn-recortar-img"><i class="fa fa-scissors" aria-hidden="true"></i> Recortar</button></div>
							</div>
							<div class="botonera">
								<button class="btn btn-info" type="button" id="reset-edit-image"><i class="fa fa-retweet" aria-hidden="true"></i> Resetear</button>
								<button class="btn btn-danger" type="button" id="cancelar-edit-image"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
								<button class="btn btn-success" type="button" id="finalizar-edit-image"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Finalizar</button>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer text-center">
				<button class="btn btn-primary" disabled="disabled" type="button" role="button" style="cursor: not-allowed;" id="cargar"><i class="fa fa-picture-o" aria-hidden="true"></i> Cargar</button>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/js/cropper.min.js') ?>"></script>
<script>
	jQuery(document).ready(function($) {


		selectorRespuesta = '<?php echo isset($imgSelector) ? $imgSelector : ''  ?>';
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('.img-prev').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
				$('#input-img , .botonera').css('visibility', 'hidden');
				$('#cargar').css('cursor', 'pointer').attr('disabled', false);
				$('.img-prev').css('max-height', parseInt($(document).height()*.75) + 'px');
			}
		}



		$('#modal-upload-image').on('hide.bs.modal', function (e) {
			$('#input-img').css('visibility', 'visible');
			$('.img-prev').attr('src', '#');
		}).on('shown.bs.modal',function(e){
			$('#cargar').attr('disabled', 'disabled').css('cursor', 'not-allowed');
			$('#input-img').val('');
		});
		$("#input-img").change(function(){
			readURL(this);
			$('.img-prev').attr('title','Editar la imagen');
		});
		$('.img-prev').hover(function() {
			$('.btn-edit-image').css('visibility', 'visible');
		}, function(){});
		$('.btn-edit-image').hover(function(){}, function() {
			$('.btn-edit-image').css('visibility', 'hidden');
		});
		$('#btn-recortar-img').unbind().click(function(event) {
			$('#cargar').attr('disabled', 'disabled').css('cursor', 'not-allowed');
			$('.btn-edit-image').css('visibility', 'hidden');
			$('.botonera').css('visibility', 'visible');
			$('.img-prev').cropper({
				aspectRatio: parseInt('<?php echo isset($aspectX) ? $aspectX : '1'  ?>') / parseInt('<?php echo isset($aspectY) ? $aspectY : '1'  ?>')
			});
		});
		$('#reset-edit-image').unbind().click(function(event) {
			$('.img-prev').cropper('crop');
		});
		$('#finalizar-edit-image').unbind().click(function(event) {
			$('.botonera').css('visibility', 'hidden');
			$('#cargar').css('cursor', 'pointer').attr('disabled', false);
			var mycanvas = $('.img-prev').cropper('getCroppedCanvas');
			var resultado = mycanvas.toDataURL("image/jpeg",0.5);
			$('.img-prev').cropper('destroy');
			$('.img-prev').attr('src', resultado);
		});
		$('#cargar').unbind().click(function(event) {
			$(selectorRespuesta).attr('src', $('.img-prev').attr('src'));
			$('.quitar-img-respuesta').remove();
			$(selectorRespuesta).after('<br /><button class="btn btn-danger quitar-img-respuesta" type="button" role="button" style="margin-top: 1rem"><i class="fa fa-times" aria-hidden="true"></i> Quitar</button>');
			$('#modal-upload-image').modal('toggle');
		});
		$(document).on('click', '.quitar-img-respuesta', function(){ 
			$(selectorRespuesta).attr('src', '');
			$(this).remove();
		});

		$('#cancelar-edit-image').unbind().click(function(event) {
			$('.img-prev').cropper('destroy');
			$('#cargar').css('cursor', 'pointer').attr('disabled', false);
			$('#input-img , .botonera').css('visibility', 'hidden');

		});

		$('#modal-upload-image').on('show.bs.modal', function (e) {
		  console.log('show.bs.modal');
		})
		$('#modal-upload-image').on('shown.bs.modal', function (e) {
		  console.log('shown.bs.modal');
		  // do something...
		})
		$('#modal-upload-image').on('hide.bs.modal', function (e) {
		  console.log('hide.bs.modal');
		  // do something...
		})
		$('#modal-upload-image').on('hidden.bs.modal', function (e) {
		  console.log('hidden.bs.modal');
		  // do something...
		})

	});




	// TEMPLATE UPLOAD:
	/*
		function subirArchivo(id_item){
			var form_data_modal = new FormData();  
			var srcEditado = $('#resultado').attr('src');
			srcEditado = srcEditado.replace('data:image/png;base64,','');
			srcEditado = srcEditado.replace('data:image/jpeg;base64,','');
			form_data_modal.append('file', srcEditado);
			form_data_modal.append('path','assets/img/carousel/'); 	// Ubicación donde se va a guardar la imagen
			form_data_modal.append('name',id_item + '.jpg'); 		// Nombre del archivo 
			$.ajax({
                url: '<?php echo base_url('upload_file/image') ?>', 
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data_modal,                        
                type: 'post',
                success: function(resp){
                	window.location.replace("<?php echo base_url('carousel/listar') ?>");
                }
			});
		}
	*/
</script>


