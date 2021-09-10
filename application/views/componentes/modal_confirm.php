<?php 
  /*
    TEMPLATE:
      $datos['id_model'] = 'modal-confir'                      // ID PARA MODAL
      $datos['selector'] = 'confirm-borrar-item';              // ID PARA EL BOTON
      $datos['title'] = 'Un tityli';                           // TITULO DEL MODAL
      $datos['texto'] = 'Esta seguro';                         // TITULO DEL MODAL
      $this->load->view('componentes/modal_confirm',$datos);   // DIRECCIÓN DE LA VISTA
  */
?>

<div class="modal" id="<?php echo isset($id_modal) ? $id_modal : 'modal-confirm' ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo isset($title) ? $title : 'Confirmar acción' ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo isset($texto) ? $texto : 'Esta seguro de que desea realizar esa acción?' ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success mouse-hand" id="<?php echo $selector ?>" data-dismiss="modal"><i class="fa fa-check-square-o" aria-hidden="true"></i> Realizar</button>
        <button type="button" class="btn btn-secondary mouse-hand" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script>
  jQuery(document).ready(function($) {
      $('#modal-confirm').modal({
      show: false,
      keyboard: false,
      backdrop: 'static'
    });    
  });
</script>