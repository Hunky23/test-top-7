document.addEventListener("DOMContentLoaded", function () {
    //Открыть модальное окно с меню в шапке
    const headerMenuOpenBtn = document.querySelector('.js-header-menu-open-btn');
    if (headerMenuOpenBtn) {
        headerMenuOpenBtn.addEventListener('click', function (event) {
            event.preventDefault();

            if (t7_open_header_menu_modal()) {
                t7_open_overlay();
            }
        }, 2);
    }

    //Закрыть модальное окно с меню в шапке
    const headerMenuCloseBtn = document.querySelector('.js-header-menu-close-btn');
    if (headerMenuCloseBtn) {
        headerMenuCloseBtn.addEventListener('click', function (event) {
            event.preventDefault();

            if (t7_close_header_menu_modal()) {
                t7_close_overlay();
            }
        });
    }
    document.addEventListener('click', function (event) {
        const headerMenuBody = document.querySelector('.js-header-menu-body');
        if (
            headerMenuBody
            && !headerMenuBody.contains(event.target)
        ) {
            if (t7_close_header_menu_modal()) {
                t7_close_overlay();
            }
        }
    }, 1);
    document.addEventListener('keyup', function (event) {
        if (event.key === 'Escape') {
            if (t7_close_header_menu_modal()) {
                t7_close_overlay();
            }
        }
    });


    //Инициализация слайдера в блоке hero
    new Swiper('.js-hero-slider', {
        loop: true,
        speed: 1000,
        slideClass: 'slide',
        wrapperClass: 'wrapper',
        pagination: {
            el: '.pagination',
            bulletClass: 'bullet',
            bulletActiveClass: 'active',
            clickable: true
        },
        autoplay: {
            delay: 4000
        }
    });


    //Открыть модальное окно заказать звонок
    const requestCallOpenButtons = document.querySelectorAll('.js-request-call-open-btn');
    if (requestCallOpenButtons) {
        requestCallOpenButtons.forEach(function (requestCallOpenButton) {
            requestCallOpenButton.addEventListener('click', function (event) {
                event.preventDefault();

                if (t7_open_request_call_modal()) {
                    t7_open_overlay();
                }
            });
        }, 2);
    }


    //Закрыть модальное окно заказать звонок
    document.addEventListener('click', function (event) {
        const requestCallBody = document.querySelector('.js-request-call-body');
        if (
            requestCallBody
            && !requestCallBody.contains(event.target)
        ) {

            if (t7_close_request_call_modal()) {
                t7_close_overlay();
            }
        }
    }, 1);
    document.addEventListener('keyup', function (event) {
        if (event.key === 'Escape') {
            if (t7_close_request_call_modal()) {
                t7_close_overlay();
            }
        }
    });


    //Прокрутить страницу наверх по клику на стрелку
    const arrowToUp = document.querySelector('.js-arrow-to-up');
    if (arrowToUp) {
        arrowToUp.addEventListener('click', function (event) {
            event.preventDefault();

            window.scrollTo({top: 0, behavior: 'smooth'});
        });
    }
});


//Открыть оверлей страницы
function t7_open_overlay() {
    const body = document.querySelector('body');
    const overlay = document.querySelector('.js-page-overlay');

    if (body && overlay && !overlay.classList.contains('active')) {
        body.style.overflow = 'hidden';
        body.style.width = '100%';
        body.style.height = '100%';

        overlay.classList.add('active');

        return true;
    }

    return false;
}


//Закрыть оверлей страницы
function t7_close_overlay() {
    const body = document.querySelector('body');
    const overlay = document.querySelector('.js-page-overlay');

    if (body && overlay && overlay.classList.contains('active')) {
        body.style.removeProperty('overflow');
        body.style.removeProperty('width');
        body.style.removeProperty('height');

        overlay.classList.remove('active');

        return true;
    }

    return false;
}


//Открыть модальное окно с меню в шапке
function t7_open_header_menu_modal() {
    const headerMenuBody = document.querySelector('.js-header-menu-body');
    const html = document.querySelector('html');
    if (headerMenuBody && !headerMenuBody.classList.contains('active')) {
        headerMenuBody.classList.add('active');

        headerMenuBody.style.top = window.getComputedStyle(html).marginTop;
        headerMenuBody.style.height = (parseInt(window.getComputedStyle(headerMenuBody).height) -
            parseInt(window.getComputedStyle(html).marginTop)) + 'px';

        return true;
    }

    return false;
}


//Закрыть модальное окно с меню в шапке
function t7_close_header_menu_modal() {
    const headerMenuBody = document.querySelector('.js-header-menu-body');
    if (headerMenuBody && headerMenuBody.classList.contains('active')) {
        headerMenuBody.classList.remove('active');

        headerMenuBody.style.removeProperty('top');
        headerMenuBody.style.removeProperty('height');

        return true;
    }

    return false;
}


//Открыть модальное окно заказать звонок
function t7_open_request_call_modal() {
    const requestCallBody = document.querySelector('.js-request-call-body');
    if (requestCallBody && !requestCallBody.classList.contains('active')) {
        requestCallBody.classList.add('active');

        return true;
    }

    return false;
}


//Закрыть модальное окно заказать звонок
function t7_close_request_call_modal() {
    const requestCallBody = document.querySelector('.js-request-call-body');
    if (requestCallBody && requestCallBody.classList.contains('active')) {
        requestCallBody.classList.remove('active');

        const requestCallForm = requestCallBody.querySelector('.wpcf7-form');
        if (requestCallForm) {
            requestCallForm.reset();
        }

        return true;
    }

    return false;
}