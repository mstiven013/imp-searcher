<p>
	
	<div id="logo-taller-wrapper">
     	<?php if ( imp_data('logo_taller_id') ) { ?>
       		<?php echo wp_get_attachment_image ( imp_data('logo_taller_id'), 'full-sized' ); ?>
     	<?php } ?>
    </div>
    <input type="hidden" class="logo_taller_id" id="logo_taller_id" name="logo_taller_id" value="<?php echo imp_data('logo_taller_id'); ?>" />
	<input type="hidden" class="logo_taller" id="logo_taller" name="logo_taller" value="<?php echo imp_data('logo_taller'); ?>" />
	<p>
     <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Agregar Imagen', 'hero-theme' ); ?>" />
     <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Borrar Imagen', 'hero-theme' ); ?>" />
   </p>

</p>