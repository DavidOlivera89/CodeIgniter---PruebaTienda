


	
<?php $scripts  = array('popper.min.js','bootstrap.min.js','jquery.dataTables.min.js','dataTables.bootstrap4.min.js','bootstrap-notify.min.js','select2.min.js','bootstrap-datepicker.min.js','moment.min.js','bootstrap-datetimepicker.min.js','hullabaloo.min.js','init.js'); ?>
<?php foreach ($scripts as $script): ?>
	<script src="<?php echo base_url('assets/js/' . $script) ?>" type="text/javascript" charset="utf-8"></script>
<?php endforeach ?>
</body>
</html>