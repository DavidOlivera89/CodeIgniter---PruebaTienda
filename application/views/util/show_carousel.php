<style>
	#<?php echo $carousel_id ?> h3 span,#<?php echo $carousel_id ?> p span{
		background-color: rgba(0,0,0,0.6);
	}

	#<?php echo $carousel_id ?> img{
		width: 100%;
	}
</style>
<div class="container-fluid">
	<div id="<?php echo $carousel_id ?>" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			  	<?php foreach ($sliders as $indice => $slider): ?>
			  		<?php if ($indice === 0): ?>
			  			<li data-target="#<?php echo $carousel_id ?>" data-slide-to="<?php echo $indice; ?>" class="active mouse-hand"></li>
			  		<?php else: ?>
			  			<li class="mouse-hand" data-target="#<?php echo $carousel_id ?>" data-slide-to="<?php echo $indice; ?>"></li>
			  		<?php endif ?>
			  	<?php endforeach ?>
			    </ol>
			  <div class="carousel-inner" role="listbox">
			  	<?php foreach ($sliders as $indiceSlider => $slider): ?>
			  		<?php if ($indiceSlider === 0): ?>
			  			<div class="carousel-item active">
			  			  <img class="d-block img-fluid" src="<?php echo base_url('assets/img/carousel') . '/' . $slider->imagen ?>" alt="Imagen Slider <?php echo $indiceSlider ?>">
			  			  <?php if ($slider->titulo || $slider->texto || $slider->texto_boton): ?>
			  			  	<div class="carousel-caption d-none d-md-block">
			  			  	    <?php if ($slider->titulo): ?>
			  			  	    	<h3><span><?php echo $slider->titulo ?></span></h3>
			  			  	    <?php endif ?>
			  			  	    <?php if ($slider->texto): ?>
			  			  	    	<p><span><?php echo $slider->texto ?></span></p>
			  			  	    <?php endif ?>
			  			  	    <?php if ($slider->texto_boton): ?>
			  			  	    	<a href="<?php echo $slider->referencia_boton ?>"><button style="cursor: pointer" class="btn btn-primary" type="button"><?php echo $slider->texto_boton ?></button></a>
			  			  	    <?php endif ?>
			  			  	  </div>
			  			  <?php endif ?>
			  			</div>
			  		<?php else: ?>
			  			<div class="carousel-item">
			  			  <img class="d-block img-fluid" src="<?php echo base_url('assets/img/carousel') . '/' . $slider->imagen ?>" alt="Imagen Slider <?php echo $indiceSlider ?>">
			  			  <?php if ($slider->titulo || $slider->texto || $slider->texto_boton): ?>
			  			  	<div class="carousel-caption d-none d-md-block">
			  			  	    <?php if ($slider->titulo): ?>
			  			  	    	<h3><span><?php echo $slider->titulo ?></span></h3>
			  			  	    <?php endif ?>
			  			  	    <?php if ($slider->texto): ?>
			  			  	    	<p><span><?php echo $slider->texto ?></span></p>
			  			  	    <?php endif ?>
			  			  	    <?php if ($slider->texto_boton): ?>
			  			  	    	<a href="<?php echo $slider->referencia_boton ?>"><button style="cursor: pointer" class="btn btn-primary" type="button"><?php echo $slider->texto_boton ?></button></a>
			  			  	    <?php endif ?>
			  			  	  </div>
			  			  <?php endif ?>
			  			</div>
			  		<?php endif ?>
			  	<?php endforeach ?>
			  </div>
			  <a class="carousel-control-prev" href="#<?php echo $carousel_id ?>" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#<?php echo $carousel_id ?>" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
</div>

