<?php
	$default_theme = 'bootstrap-theme/'. $theme . '.min.css'; 
	$estilos  = array($default_theme,'font-awesome.min.css','dataTables.bootstrap4.min.css','select2.min.css','bootstrap-datepicker.min.css', 'bootstrap-datetimepicker.min.css','hullabaloo.min.css','style.css');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/favicon.ico') ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo isset($titulo) ? $titulo : 'EDI' ?></title>
	<?php foreach ($estilos as $estilo): ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/' . $estilo); ?>">
	<?php endforeach ?>
	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>" type="text/javascript" charset="utf-8"></script>

</head>
<body>