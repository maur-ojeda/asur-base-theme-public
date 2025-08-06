import * as bootstrap from 'bootstrap';
import { createIcons, icons } from 'lucide';
import AOS from 'aos';
import { CountUp } from 'countup.js';
//import Swiper from 'swiper';
//import { Autoplay, Pagination } from 'swiper/modules';
//import 'swiper/css/bundle';



// Registrar módulos que usarás
//Swiper.use([Autoplay, Pagination]);


document.addEventListener('DOMContentLoaded', () => {
  // Crear los íconos
  createIcons({ icons });

  // Inicializar AOS
  AOS.init({
    duration: 800,
     once: false,
  });

  // Manejar scroll para navbar
  const navbar = document.querySelector('.navbar');

  const onScroll = () => {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  };


  window.addEventListener('scroll', onScroll);
  onScroll();



   const counters = document.querySelectorAll('.counter');

  const startCount = (el) => {
    const target = parseInt(el.getAttribute('data-target'), 10);
    const countUp = new CountUp(el, target, {
      duration: 2, // segundos
      separator: '.', // para miles
    });
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        startCount(entry.target);
        observer.unobserve(entry.target); 
      }
    });
  }, {
    threshold: 0.6
  });

  counters.forEach(counter => {
    observer.observe(counter);
  });
  
//

/*const logoCarousel = new Swiper(".logo-carousel", {
    // Configuración básica
    loop: true,
    centeredSlides: false,
    grabCursor: true,

    // Autoplay configuration
    autoplay: {
        delay: 3000, // 3 segundos entre slides
        disableOnInteraction: false, // Continúa después de interacción
        pauseOnMouseEnter: true, // Pausa al pasar el mouse
        reverseDirection: false, // Dirección normal
    },

    // Velocidad de transición
    speed: 800,

    // Efecto de transición
    effect: "slide",

    // Navegación
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    // Paginación
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },

    // Slides por vista (responsive)
    slidesPerView: 1,
    spaceBetween: 20,

    // Breakpoints para responsive design
    breakpoints: {
        // Móviles pequeños
        320: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        // Móviles
        576: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        // Tablets
        768: {
            slidesPerView: 3,
            spaceBetween: 25,
        },
        // Desktop pequeño
        992: {
            slidesPerView: 4,
            spaceBetween: 30,
        },
        // Desktop grande
        1200: {
            slidesPerView: 5,
            spaceBetween: 35,
        },
        // Desktop extra grande
        1400: {
            slidesPerView: 6,
            spaceBetween: 40,
        },
    },

    // Configuración del teclado
    keyboard: {
        enabled: true,
        onlyInViewport: true,
    },

    // Configuración del mouse wheel
    mousewheel: {
        enabled: false, // Deshabilitado por defecto
    },

    // Configuración de accesibilidad
    a11y: {
        enabled: true,
        prevSlideMessage: "Slide anterior",
        nextSlideMessage: "Siguiente slide",
        firstSlideMessage: "Este es el primer slide",
        lastSlideMessage: "Este es el último slide",
    },

    // Eventos del carousel
    on: {
        init: () => {
            console.log("Logo carousel inicializado")
        },
        slideChange: function () {
            console.log("Slide cambiado a:", this.activeIndex)
        },
        autoplayStart: () => {
            console.log("Autoplay iniciado")
        },
        autoplayStop: () => {
            console.log("Autoplay detenido")
        },
    },
})

// Funciones adicionales para controlar el carousel

// Pausar autoplay al pasar el mouse sobre el carousel
const carouselElement = document.querySelector(".logo-carousel")

carouselElement.addEventListener("mouseenter", () => {
    logoCarousel.autoplay.stop()
})

carouselElement.addEventListener("mouseleave", () => {
    logoCarousel.autoplay.start()
})

// Función para agregar logos dinámicamente (opcional)
function addLogo(logoSrc, logoAlt) {
    const newSlide = document.createElement("div")
    newSlide.className = "swiper-slide"
    newSlide.innerHTML = `
            <div class="logo-container">
                <img src="${logoSrc}" alt="${logoAlt}" class="logo-img">
            </div>
        `

    logoCarousel.appendSlide(newSlide)
}

// Función para remover un slide (opcional)
function removeLogo(index) {
    logoCarousel.removeSlide(index)
}

// Función para ir a un slide específico (opcional)
function goToSlide(index) {
    logoCarousel.slideTo(index)
}

// Exponer funciones globalmente para uso externo
window.logoCarouselControls = {
    carousel: logoCarousel,
    addLogo: addLogo,
    removeLogo: removeLogo,
    goToSlide: goToSlide,
    start: () => logoCarousel.autoplay.start(),
    stop: () => logoCarousel.autoplay.stop(),
    next: () => logoCarousel.slideNext(),
    prev: () => logoCarousel.slidePrev(),
}
*/
//

});

console.log('App JS loaded');
