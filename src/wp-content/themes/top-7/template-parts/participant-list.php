<?php
/**
 * Файл содержит шаблон для блока "Участники"
 */

global $posts, $post;
?>

<?php if ( ! empty( $posts ) ): ?>
	<section class="section participant-list">
		<div class="container section__container participant-list__container">
            <h1 class="section__title application-list__title">Participant</h1>

			<table class="participant-list__table">
				<thead>
				<tr>
					<th>#</th>

					<th>Thumbnail</th>

					<th>First name</th>

					<th>Last name</th>

					<th>E-mail</th>

					<th></th>
				</tr>
				</thead>

				<tbody>
				<?php foreach ( $posts as $post ): setup_postdata( $post ); ?>
					<tr>
						<td><span><?= $post->ID; ?></span></td>

						<td><img src="<?php the_field( 'participant-thumbnail' ); ?>" alt="thumbnail"></td>

						<td><span><?php the_field( 'participant-first-name' ); ?></span></td>

						<td><span><?php the_field( 'participant-last-name' ); ?></span></td>

						<td><span><?php the_field( 'participant-email' ); ?></span></td>

						<td>
							<form class="js-delete-participant" action="<?= admin_url('admin-ajax.php'); ?>">
                                <input type="hidden" name="nonce"
                                       value="<?= wp_create_nonce( 'delete_participant' ); ?>">

								<input type="hidden" name="ID" value="<?= $post->ID; ?>">

								<button class="participant-list__btn" type="submit">
									<svg>
										<use xlink:href="#trash"></use>
									</svg>
								</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>
<?php else: ?>
	<section class="section participant-list">
		<div class="container section__container participant-list__container">
			<h1>Participants not selected</h1>
		</div>
	</section>
<?php endif; ?>