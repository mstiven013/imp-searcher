<p>
	
	<?php if(imp_data('logo_taller') !== '') { ?>
		<img class="logo_image_taller" src="<?php echo imp_data('logo_taller'); ?>" alt="">
	<?php } else { ?>
		<img class="logo_image_taller" src="" alt="">
	<?php } ?>
	<input type="hidden" class="logo_taller" id="logo_taller" name="logo_taller" value="<?php echo imp_data('logo_taller'); ?>" />
	<a class="media-btn-select">Seleccione un logo</a>

</p>