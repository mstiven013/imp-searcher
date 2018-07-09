<?php 
	//require "wp-load.php"
	require_once '../../../../../../wp-load.php';

	//WP Query
	$args = array(
		'post_type' => 'talleres'
	);

	$query = new WP_Query($args);

//Get header
get_header(); ?>

	<div class="contain">
		<?php require_once 'form.php'; ?>

		<?php if($query->have_posts()) :
			while($query->have_posts()) : $query->the_post(); ?>
			
				<h2><?php the_title(); ?></h2>
				<p><?php the_content(); ?></p>
				<p><a href="<?php the_permalink(); ?>">Leer más acerca de este taller</a></p>

			<?php endwhile; ?>
		<?php else : ?>

			<p>No existen talleres</p>

		<?php endif; ?>
	</div>

<?php get_footer(); ?>