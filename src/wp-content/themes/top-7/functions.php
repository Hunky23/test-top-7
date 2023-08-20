<?php
//Подключение доп. php скриптов
add_action( 'after_setup_theme', function () {
	$include_dir = get_template_directory() . '/include';

	if ( file_exists( $include_dir ) ) {
		foreach (glob( $include_dir . '/*.*' ) as $file_path) {
			require_once $file_path;
		}
	}
} );

//Подключение стилей
add_action( 'wp_enqueue_scripts', 't7_style_enqueue' );

//Подключение скриптов
add_action( 'wp_enqueue_scripts', 't7_script_enqueue' );

//Подключение спрайтов
add_action( 'wp_body_open', 't7_sprite_require' );

//Установить доступный функционал темы
add_theme_support( 'menus' );

//Отключить Gutenberg
add_filter( 'use_block_editor_for_post_type', '__return_false', 15 );

//Регистрация типов записей
add_action( 'init', 't7_slider' );
add_action( 'init', 't7_price' );
add_action( 'init', 't7_participant' );

//Регистрация меню
add_action( 'after_setup_theme', 't7_header_menu' );

//Отключить обёртку полей в CF7
add_filter( 'wpcf7_autop_or_not', '__return_false' );

//Подключение модальных окон
add_action( 'wp_footer', 't7_page_overlay', 8 );
add_action( 'wp_footer', 't7_request_call_btn', 5 );
add_action( 'wp_footer', 't7_request_call' );
add_action( 'wp_footer', 't7_arrow_to_top', 5 );

/**
 * Секции страниц
 */

//Главная страница
add_action( 't7_front_page_section', 't7_hero' );
add_action( 't7_front_page_section', 't7_about_us' );
add_action( 't7_front_page_section', 't7_price_1' );
add_action( 't7_front_page_section', 't7_price_2' );
add_action( 't7_front_page_section', 't7_price_3' );
add_action( 't7_front_page_section', 't7_contact_us' );

//Страница "Заявки"
add_action( 't7_application_section', 't7_application_list' );

//Архивная страница "Участники"
add_action( 't7_archive_participant_section', 't7_participant_list' );


/**
 * Ajax
 */

if ( wp_doing_ajax() ) {
	//Добавить участника
	add_action( 'wp_ajax_add_participant', 't7_add_participant' );
	add_action( 'wp_ajax_nopriv_add_participant', 't7_add_participant' );

	//Удалить участника
	add_action( 'wp_ajax_delete_participant', 't7_delete_participant' );
	add_action( 'wp_ajax_nopriv_delete_participant', 't7_delete_participant' );
}