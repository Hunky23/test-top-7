<?php
/**
 * Файл содержит шаблон для блока contact us
 */
?>

<section class="section contact-us">
	<div class="container section__container contact-us__container">
		<h2 class="section__title contact-us__title">
			Contact us
		</h2>

		<span class="section__subtitle contact-us__subtitle">
			Our agency located in Melbourne, Australia
		</span>

		<div class="contact-us__wrapper">
			<?= do_shortcode( '[contact-form-7 id="d5aa184" title="Contact us"]' ); ?>
		</div>
	</div>
</section>