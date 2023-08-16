<?php
/**
 * Файл содержит функции для регистрации меню
 */

//Меню в шапке
function t7_header_menu():void {
	register_nav_menu( 'header', 'Меню в шапке' );
}