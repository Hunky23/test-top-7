<?php
/**
 * Файл содержит функции для обработки ajax запросов
 */

//Добавить участника
function t7_add_participant():void {
	$query = file_get_contents( 'php://input' );
	$query = json_decode( $query );

	$response = array();

	if ( empty( $query->nonce ) || ! wp_verify_nonce( $query->nonce, 'add_participant' ) ) {
		status_header( '403' );
		header( 'Content-Type: application/json' );

		$response['message'] = 'Verification nonce was failed';

		echo wp_json_encode( $response, JSON_UNESCAPED_UNICODE );

		die();
	}

	if ( empty( $query->first_name ) ) {
		$response['message'] = 'Validation errors in your request';

		$response['errors'][] = array(
			'field' => 'first_name',
			'message' => 'Field cannot be empty'
		);
	}

	if ( empty( $query->last_name ) ) {
		$response['message'] = 'Validation errors in your request';

		$response['errors'][] = array(
			'field' => 'last_name',
			'message' => 'Field cannot be empty'
		);
	}

	if ( empty( $query->email ) ) {
		$response['message'] = 'Validation errors in your request';

		$response['errors'][] = array(
			'field' => 'email',
			'message' => 'Field cannot be empty'
		);
	}

	if ( empty( $query->thumbnail ) ) {
		$response['message'] = 'Validation errors in your request';

		$response['errors'][] = array(
			'field' => 'thumbnail',
			'message' => 'Field cannot be empty'
		);
	}

	if ( ! empty( $response['errors'] ) ) {
		status_header( '400' );
		header( 'Content-Type: application/json' );

		echo wp_json_encode( $response, JSON_UNESCAPED_UNICODE );

		die();
	}

	$post_id = wp_insert_post( array(
		'post_title'    => sanitize_text_field( $query->first_name . ' ' . $query->last_name ),
		'post_content'  => '',
		'post_status'   => 'publish',
		'post_type'     => 'participant'
	) );

	if ( $post_id == 0 || $post_id instanceof WP_Error ) {
		status_header( '405' );
		header( 'Content-Type: application/json' );

		$response['message'] = 'Invalid input';

		$response['errors'][] = array(
			'message' => 'Post cannot create'
		);

		echo wp_json_encode( $response, JSON_UNESCAPED_UNICODE );

		die();
	}

	if ( ! update_field( 'participant-first-name', $query->first_name, $post_id ) ) {
		$response['message'] = 'Invalid input';

		$response['errors'][] = array(
			'message' => 'First name meta field cannot create'
		);
	}

	if ( ! update_field( 'participant-last-name', $query->last_name, $post_id ) ) {
		$response['message'] = 'Invalid input';

		$response['errors'][] = array(
			'message' => 'Last name meta field cannot create'
		);
	}

	if ( ! update_field( 'participant-email', $query->email, $post_id ) ) {
		$response['message'] = 'Invalid input';

		$response['errors'][] = array(
			'message' => 'E-mail meta field cannot create'
		);
	}

	if (
		! update_field( 'participant-thumbnail', array(
			'title'  => '',
			'url'    => $query->thumbnail,
			'target' => ''
		), $post_id )
	) {
		$response['message'] = 'Invalid input';

		$response['errors'][] = array(
			'message' => 'Thumbnail meta field cannot be create'
		);
	}

	if ( ! empty( $response['errors'] ) ) {
		wp_delete_post( $post_id, true );

		status_header( '405' );
		header( 'Content-Type: application/json' );

		echo wp_json_encode( $response, JSON_UNESCAPED_UNICODE );

		die();
	}

	status_header( '201' );
	header( 'Content-Type: application/json' );

	$response['message'] = 'Participant was been added';

	echo wp_json_encode( $response, JSON_UNESCAPED_UNICODE );

	die();
}

//Удалить участника
function t7_delete_participant():void {
	$query = file_get_contents( 'php://input' );
	$query = json_decode( $query );

	$response = array();

	if ( empty( $query->nonce ) || ! wp_verify_nonce( $query->nonce, 'delete_participant' ) ) {
		status_header( '403' );
		header( 'Content-Type: application/json' );

		$response['message'] = 'Verification nonce was failed';

		echo wp_json_encode( $response, JSON_UNESCAPED_UNICODE );

		die();
	}

	if ( empty( $query->ID ) ) {
		status_header( '400' );
		header( 'Content-Type: application/json' );

		$response['message'] = 'Validation errors in your request';

		$response['errors'][] = array(
			'field' => 'ID',
			'message' => 'Field cannot be empty'
		);

		echo wp_json_encode( $response, JSON_UNESCAPED_UNICODE );

		die();
	}

	if ( ! wp_delete_post( $query->ID ) ) {
		status_header( '405' );
		header( 'Content-Type: application/json' );

		$response['message'] = 'Invalid input';

		$response['errors'][] = array(
			'message' => 'Post cannot be delete'
		);

		echo wp_json_encode( $response, JSON_UNESCAPED_UNICODE );

		die();
	}

	status_header( '201' );
	header( 'Content-Type: application/json' );

	$response['message'] = 'Participant was been delete';

	echo wp_json_encode( $response, JSON_UNESCAPED_UNICODE );

	die();
}