<?php 
$notificacion = $this->session->userdata('notificacion');
$tipo_notificacion = $this->session->userdata('tipo_notificacion');
$this->session->unset_userdata('notificacion');
$this->session->unset_userdata('tipo_notificacion');
?>
<script>
  jQuery(document).ready(function($) {
    let notificar = '<?php echo $notificacion ? true : false  ?>',
    tipoNotificacion = '<?php echo ($tipo_notificacion) ?  $tipo_notificacion : 'primary' ?>';
    if(notificar){
      $.hulla = new hullabaloo()
      $.hulla.send("<?php echo $notificacion ?>", tipoNotificacion)
    }
  })
</script>
