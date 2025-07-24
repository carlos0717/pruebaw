
import './bootstrap';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.noticias-swiper', {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 3, // Mostrar 3 slides por vista en desktop
        spaceBetween: 24,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.noticias-swiper .swiper-button-next',
            prevEl: '.noticias-swiper .swiper-button-prev',
        },
        pagination: {
            el: '.noticias-swiper .swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: { slidesPerView: 1 },
            640: { slidesPerView: 1 },
            1024: { slidesPerView: 2 },
            1280: { slidesPerView: 3 }
        }
    });

    // Carrusel para documentos (normativos y requisitos) - mostrar 3 por vista en desktop
    document.querySelectorAll('.documentos-swiper').forEach(function(swiperEl) {
        new Swiper(swiperEl, {
            modules: [Navigation, Pagination, Autoplay],
            slidesPerView: 3,
            spaceBetween: 24,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: swiperEl.querySelector('.swiper-button-next'),
                prevEl: swiperEl.querySelector('.swiper-button-prev'),
            },
            pagination: {
                el: swiperEl.querySelector('.swiper-pagination'),
                clickable: true,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                640: { slidesPerView: 1 },
                1024: { slidesPerView: 2 },
                1280: { slidesPerView: 3 }
            }
        });
    });
});
