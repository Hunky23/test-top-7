<?php
/**
 * Файл содержит шаблон для блока hero
 * @var $args array
 */

global $post;
?>

<section class="hero">
	<div class="container hero__container">
        <div class="hero__slider js-hero-slider">
            <div class="hero__slider-wrapper wrapper">
	            <?php foreach ( $args['posts'] as $post ): setup_postdata( $post ); ?>
                    <div class="hero__slide slide">
                        <img class="hero__slide-image" src="<?php the_field( 'slide-image' ); ?>" alt="slide">

                        <div class="hero__slide-content">
                            <h3 class="hero__slide-title">
                                <?php the_field( 'slide-title' ); ?>
                            </h3>

                            <div class="hero__slide-desc">
	                            <?php the_field( 'slide-desc' ); ?>
                            </div>

                            <?php if ( get_field( 'slide-contact-btn' ) ): ?>
                                <a class="btn hero__slide-btn js-request-call-open-btn" href="#">
                                    Get in touch!
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
	            <?php endforeach; ?>

	            <?php wp_reset_postdata(); ?>
            </div>

            <div class="hero__pagination pagination"></div>
        </div>
	</div>
</section>