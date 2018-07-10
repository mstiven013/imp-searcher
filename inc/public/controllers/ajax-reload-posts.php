<?php 

	$query = new WP_Query($args_query);

	if($query->have_posts()) :
		while ($query->have_posts()) : $query->the_post(); ?>
			<?php 

				//Get meta info
				$logo = get_post_meta( get_the_ID(), 'logo_taller', true );
				$contactName = get_post_meta( get_the_ID(), 'contact_name', true );
				$direction = get_post_meta( get_the_ID(), 'direccion', true );
				$email = get_post_meta( get_the_ID(), 'correo_electronico', true );
				$phone = get_post_meta( get_the_ID(), 'telefono', true );
				$webPage = get_post_meta( get_the_ID(), 'pagina_web', true );
				$googleMaps = get_post_meta( get_the_ID(), 'google_maps', true );

				//Get cities
				$citieTaller = get_the_terms( get_the_ID(), 'ciudades' );
				$servicesTaller = get_the_terms( get_the_ID(), 'servicios' );
				$spaceC = '';
				$item = 0;
				
				if(count($citieTaller) > 1) {
					$spaceC = ', ';
				}
				
			 ?>

			<div class="row taller">

				<!--Logo-->
				<div class="col-12 col-sm-12">
					<?php if(!empty($logo)) { ?>
						<img class="taller-logo" src="<?php echo $logo; ?>" alt="">
					<?php } ?>
				</div>
				
				<!--Photo "Taller" column-->
				<div class="col-12 col-sm-12 col-md-4">
					<?php if(has_post_thumbnail()) { ?>
				        <img class="taller-thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>">
					<?php } else { ?>
					    <img class="taller-thumbnail" src="<?php echo IMPS_TEMP; ?>/img/no-image.jpg">
					<?php } ?>
				</div>

				<!--Info "Taller" column-->
				<div class="col-12 col-sm-12 col-md-5">
					<p><b>Nombre:</b> <?php the_title(); ?></p>

					<!--Nombre de contacto-->
					<?php if(!empty($contactName)) { ?>
						<p><b>Nombre Contacto:</b> <?php echo $contactName; ?></p>
					<?php } ?>
					
					<!--Direccion-->
					<?php if(!empty($direction)) { ?>
						<p><b>Dirección:</b> <?php echo $direction; ?></p>
					<?php } ?>
					
					<?php if($citieTaller) { ?>
						<p>
							<b>Ciudad:</b>
							<?php foreach($citieTaller as $city) {
								if(++$item === count($citieTaller)) {
									echo $city->name, '.';
								} else {
									echo $city->name . $spaceC;
								}
							} ?>
						</p>
					<?php } ?>
					<!--Correo electrónico-->
					<?php if(!empty($email)) { ?>
						<p><b>Correo electrónico:</b> <?php echo $email; ?></p>
					<?php } ?>

					<!--Teléfono-->
					<?php if(!empty($phone)) { ?>
						<p><b>Teléfono:</b> <?php echo $phone; ?></p>
					<?php } ?>
				</div>

				<!--Map "Taller" column-->
				<div class="col-12 col-sm-12 col-md-3">
					<?php 
						if($googleMaps) {
							echo $googleMaps;
						}
					?>
				</div>
				
				<?php if($servicesTaller) {  ?>
					<p class="services_title"><?php _e(' LOS SERVICIOS QUE OFRECEMOS'); ?></p>
					<div class="services-loop">
						<?php foreach($servicesTaller as $service) {
							$t_ID = $service->term_taxonomy_id; 
							$term_data = get_option("taxonomy_$t_ID"); ?>
							<div class="item-service">
								<div class="img_service_wrapper">
									<?php if($term_data['service_image'] && $term_data['service_image'] !== '') { ?>
										<img class="img_service" src="<?php echo $term_data['service_image']; ?>" alt="">
									<?php } else { ?>
										<img class="img_service" src="<?php echo IMPS_TEMP; ?>/img/no-image.jpg" alt="">
									<?php } ?>
								</div>

								<p class="service_name"><?php echo $service->name; ?></p>
							</div>
						<?php } ?>
					</div>
				<?php } ?>

				<?php if ($webPage): ?>
					<p class="web-site"><b><?php _e('Página web:'); ?></b> <a href="<?php echo $webPage; ?>" target="_blank"><?php echo $webPage; ?></a></p>
				<?php endif ?>

			</div>
		<?php endwhile;
	else : ?>
		<div class="imp-loader">
			<p>Lo sentimos.</p>
			<p>no hay talleres con las especificaciones ingresadas.</p>
		</div>
	<?php endif;
	die();

 ?>