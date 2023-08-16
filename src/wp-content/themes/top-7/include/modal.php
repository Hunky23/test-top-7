<?php
/**
 * Файл содержит функции для подключения модальных окон
 */


//Оверлей поверх страницы
function t7_page_overlay():void {
	echo '<div class="page-overlay js-page-overlay"></div>';
}

//Модальное окно обратная связь
function t7_request_call():void {
    ?>
    <div class="request-call js-request-call-body">
        <div class="container request-call__container">
            <?= do_shortcode( '[contact-form-7 id="9edc4c0" title="Request call"]' ); ?>
        </div>
    </div>
     <?php
}


//Кнопка прокрутки страницы наверх
function t7_arrow_to_top():void {
	?>
	<a class="arrow-to-up js-arrow-to-up" href="#">
		<svg>
			<use xlink:href="#arrow_top"></use>
		</svg>
	</a>
	<?php
}