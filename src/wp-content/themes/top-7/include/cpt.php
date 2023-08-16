<?php
/**
 * Файл содержит функции для регистрации кастомных типов записей
 */

//Слайдер
function t7_slider():void {
	register_post_type( 'slider', array(
		'label' => 'Слайдер',
		'public' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-slides',
		'menu_position' => 20,
		'supports' => array( 'title' )
	) );
}

function t7_price():void {
	register_post_type( 'price', array(
		'label' => 'Цены',
		'public' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-money-alt',
		'menu_position' => 20,
		'supports' => array( 'title' )
	) );
}