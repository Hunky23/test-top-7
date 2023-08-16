<?php
/**
 * Файл содержит шаблон для блока price (второй вариант)
 * @var $args array
 */

global $post;
?>

<section class="section price">
	<div class="container section__container price__container">
		<h2 class="section__title price__title">
			Price (using WP_Query)
		</h2>

		<span class="section__subtitle price__subtitle">
			Pricing table
		</span>

		<div class="price__wrapper">
            <div class="price__inner">
	            <?php foreach ( $args['posts'] as $post): setup_postdata( $post ); ?>
                    <div class="price__card price-card">
                        <div class="price-card__inner">
                            <h3 class="price-card__title">
					            <?php the_title(); ?>
                            </h3>

                            <span class="price-card__count">
                            $ <?php the_field( 'price-count' ); ?>
                        </span>

                            <span class="price-card__period">/month</span>

                            <div class="price-card__desc">
					            <?php the_field( 'price-desc' ); ?>
                            </div>

                            <a class="btn price-card__btn" href="<?php the_permalink(); ?>">
                                Choose
                            </a>
                        </div>
                    </div>
	            <?php endforeach; ?>

	            <?php wp_reset_postdata(); ?>
            </div>
		</div>
	</div>
</section>