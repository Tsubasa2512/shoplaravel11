import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

const swiper = new Swiper('.swiper-container', {
    loop: true,
    autoplay: { delay: 3000 },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});

