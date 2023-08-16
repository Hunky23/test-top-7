<?php
/**
 * Файл содержит шаблон для блока about us
 */
?>

<section class="section about-us">
	<div class="container section__container about-us__container">
		<h2 class="section__title about-us__title">
			<?php the_field( 'about-us-title' ); ?>
		</h2>

		<span class="section__subtitle about-us__subtitle">
			<?php the_field( 'about-us-subtitle' ); ?>
		</span>

		<div class="about-us__wrapper">
			<div class="about-us__text">
				<p>
					<?php the_field( 'about-us-content' ); ?>
				</p>

				<a class="btn about-us__more-link" href="#">Learn more</a>
			</div>

			<div class="about-us__video">
                <?php if ( ! get_field( 'about-us-video' ) ): ?>
                    <img class="about-us__video-preview" src="<?= get_template_directory_uri(); ?>/asset/image/video-preview.png" alt="video">
                <?php else: ?>
                    <?php the_field( 'about-us-video' ) ?>
                <?php endif; ?>
			</div>
		</div>
	</div>
</section>