<?php
/**
 * Файл содержит блоки секций для подключения на страницах
 */

//Главный блок (слайдер)
function t7_hero():void {
	$posts = get_posts( array(
		'posts_per_page' => '-1',
		'orderby'         => 'id',
		'order'           => 'ASC',
		'post_type'      => 'slider'
	) );

	get_template_part( 'template-parts/hero', null, array( 'posts' => $posts ) );
}


//Блок About us
function t7_about_us():void {
	get_template_part( 'template-parts/about-us' );
}


//Блок Price (первый вариант - цикл по ID)
function t7_price_1():void {
	$posts_ids = get_posts( array(
		'fields'          => 'ids',
		'posts_per_page'  => -1,
		'orderby'         => 'id',
		'order'           => 'ASC',
		'post_type'       => 'price'
	) );

	get_template_part( 'template-parts/price-1', null, array( 'posts_ids' => $posts_ids ) );
}


//Блок Price (второй вариант - WP_Query)
function t7_price_2():void {
	$posts = new WP_Query( array(
		'fields'          => 'ids',
		'posts_per_page'  => -1,
		'orderby'         => 'id',
		'order'           => 'ASC',
		'post_type'       => 'price'
	) );
	$posts = $posts->get_posts();

	get_template_part( 'template-parts/price-2', null, array( 'posts' => $posts ) );
}


//Блок Price (третий вариант - wpdb)
function t7_price_3():void {
	global $wpdb;

	$posts = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->posts WHERE post_type = %s",
			array( 'price' )
		)
	);

	$posts = array_map( function ( $post ): WP_Post {
		return new WP_Post( $post );
	}, $posts );

	get_template_part( 'template-parts/price-3', null, array( 'posts' => $posts ) );
}


//Блок Contact us
function t7_contact_us():void {
	get_template_part( 'template-parts/contact-us' );
}


//Блок Application list
function t7_application_list():void {
	$users = file_get_contents( 'https://randomuser.me/api/?results=15' );
	$errors = array();

	if ( ! empty( $users ) ) {
		$users = json_decode( $users );
		$users = $users->results;
		$users = array_map( function ( $user ) {
			$result = new stdClass();
			$result->first_name = $user->name->first;
			$result->last_name = $user->name->last;
			$result->email = $user->email;
			$result->thumbnail = $user->picture->thumbnail;

			return $result;
		}, $users );
	} else {
		$errors[] = 'Failed to get users';
	}

	get_template_part( 'template-parts/application-list', null, array(
			'users' => $users,
			'errors' => $errors
		)
	);
}


//Блок Participant list
function t7_participant_list():void {
	get_template_part( 'template-parts/participant-list' );
}