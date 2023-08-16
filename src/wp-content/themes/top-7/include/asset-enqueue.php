<?php
/**
 * Файл содержит функции для подключения стилей, скриптов, спрайтов
 */

//Подключение стилей
function t7_style_enqueue(): void {
	$main_style_hash = 	hash_file( 'md5', get_template_directory() . '/style.css' );
	$asset_style_hash = hash_file( 'md5', get_template_directory() . '/asset/style/style.min.css' );

	wp_enqueue_style( 'main', get_stylesheet_uri(), array(), $main_style_hash );
	wp_enqueue_style( 'asset', get_template_directory_uri() . '/asset/style/style.min.css', array(),
		$asset_style_hash );
}

//Подключение скриптов
function t7_script_enqueue():void {
	$swiper_script_hash = hash_file( 'md5', get_template_directory() . '/asset/js/swiper-bundle.min.js' );
	$asset_script_hash = hash_file( 'md5', get_template_directory() . '/asset/js/main.min.js' );

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/asset/js/swiper-bundle.min.js', array(),
		$swiper_script_hash );
	wp_enqueue_script( 'asset', get_template_directory_uri() . '/asset/js/main.min.js', array(),
		$asset_script_hash );
}

//Подключение спрайтов
function t7_sprite_require():void {
	require_once get_template_directory() . '/asset/image/sprite.svg';
}