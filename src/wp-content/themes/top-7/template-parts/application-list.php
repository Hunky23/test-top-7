<?php
/**
 * Файл содержит шаблон для блока "Заявки"
 * @var $args array
 */
?>

<?php if ( empty( $args['errors'] ) ): ?>
    <section class="section application-list">
        <div class="container section__container application-list__container">
            <h1 class="section__title application-list__title">Application</h1>

            <table class="application-list__table">
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
                    <?php for ( $i = 0; $i < count( $args['users'] ); $i++ ): $user = $args['users'][$i]; ?>
                        <tr>
                            <td><span><?= $i+1; ?></span></td>

                            <td><img src="<?= $user->thumbnail; ?>" alt="thumbnail"></td>

                            <td><span><?= $user->first_name; ?></span></td>

                            <td><span><?= $user->last_name; ?></span></td>

                            <td><span><?= $user->email; ?></span></td>

                            <td>
                                <form class="js-add-participant" action="<?= admin_url('admin-ajax.php'); ?>">
                                    <input type="hidden" name="nonce"
                                           value="<?= wp_create_nonce( 'add_participant' ); ?>">

                                    <input type="hidden" name="first_name" value="<?= $user->first_name; ?>">

                                    <input type="hidden" name="last_name" value="<?= $user->last_name; ?>">

                                    <input type="hidden" name="email" value="<?= $user->email; ?>">

                                    <input type="hidden" name="thumbnail" value="<?= $user->thumbnail; ?>">

                                    <button class="application-list__btn" type="submit">
                                        <svg>
                                            <use xlink:href="#add"></use>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </section>
<?php else: ?>
	<?php foreach ( $args['errors'] as $error ): ?>
        <?= $error; ?>
	<?php endforeach; ?>
<?php endif; ?>