<?php require_once '../controllers/searcher.php'; ?>

<form action="" id="imp-searcher" name="imp-searcher" class="imp-searcher">
			
	<div class="col-services">
		<label for="servicios">Servicios:</label>
		<select name="servicios" id="servicios" class="multiple-list required" multiple="multiple">
			<?php 
				if($services) {
					foreach($services as $taxonomy) {
						$terms = get_terms([
						    'taxonomy' => $taxonomy,
						    'hide_empty' => false,
						]);

						foreach($terms as $term) {
							echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
						}
					}
				}
			 ?>
		</select>
	</div>

	<div class="col-cities">
		<label for="ciudad">Ciudad:</label>
		<select name="ciudad" id="ciudad" class="single-list required">
			<option value="0" selected>Seleccione una ciudad</option>
			<?php 
				if($cities) {
					foreach($cities as $city) {
						$terms = get_terms([
						    'taxonomy' => $city,
						    'hide_empty' => false,
						]);

						foreach($terms as $term) {
							echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
						}
					}
				}
			 ?>
		</select>
	</div>

	<div class="col-btn">
		<button id="btn-search" class="btn-search">Buscar</button>
	</div>

	<div class="col-error">
		<p id="text"><span id="names"></span></p>
	</div>

</form>