

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    

<style>
  /* Color personalizado */
  .text-custom-orange {
    color: #f7a38f;
  }

  /* Estilo del contenedor principal del carrusel */
  .partners-swiper {
    padding-bottom: 20px; /* Espacio para la sombra de las tarjetas */
  }

  /* Estilo del contenedor de la imagen para el efecto curvo */
  .partner-card {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transform: perspective(1000px) rotateX(5deg) scale(0.95);
    transition: transform 0.3s ease-in-out;
    height: auto; /* Permite que la altura se ajuste a la imagen */
  }

  /* Elimina el `hover` si el carrusel es automático */
  .partner-card:hover {
    transform: perspective(1000px) rotateX(0deg) scale(1);
  }

  .partner-card img {
    width: 100%;
    height: auto;
    display: block;
  }

  /* Ajusta los colores de las flechas de navegación de Swiper */
  .swiper-button-next,
  .swiper-button-prev {
    color: #f7a38f !important;
  }
  
  .swiper-button-next::after,
  .swiper-button-prev::after {
    font-size: 2rem !important;
  }
</style>





<div class="container-fluid my-5">
  <div class="row">
    <div class="col-12 text-start mb-4 px-5">
      <p class="text-uppercase fw-bold text-custom-orange">MINERÍA</p>
      <h1 class="display-4 fw-bold">PARTNERS EN EL MUNDO</h1>
    </div>
  </div>


<div class="position-relative overflow-hidden">

<div class="bg-white position-absolute" style=" width:116%; top: -78px; left: -8%; z-index: 5; height: 116px; border-radius: 100%;">uno</div>
<div class="bg-white position-absolute" style=" width:116%; bottom: -68px; left: -8%; z-index: 5; height: 116px; border-radius: 100%;">uno</div>
  <div class="swiper partners-swiper">
  <div class="swiper-wrapper">
      <div class="swiper-slide partner-card">
        <img src="https://picsum.photos/400/300?random=1" class="img-fluid" alt="Partner 1">
      </div>
      <div class="swiper-slide partner-card">
        <img src="https://picsum.photos/400/300?random=2" class="img-fluid" alt="Partner 2">
      </div>
      <div class="swiper-slide partner-card">
        <img src="https://picsum.photos/400/300?random=3" class="img-fluid" alt="Partner 3">
      </div>
      <div class="swiper-slide partner-card">
        <img src="https://picsum.photos/400/300?random=4" class="img-fluid" alt="Partner 4">
      </div>
      <div class="swiper-slide partner-card">
        <img src="https://picsum.photos/400/300?random=5" class="img-fluid" alt="Partner 5">
      </div>
      <div class="swiper-slide partner-card">
        <img src="https://picsum.photos/400/300?random=6" class="img-fluid" alt="Partner 6">
      </div>
    </div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

  </div>
</div>


</div>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    new Swiper('.partners-swiper', {
      slidesPerView: 5, // Muestra 5 slides en escritorio
      spaceBetween: 20,
      loop: true, // Habilita el loop infinito
      grabCursor: true, // Muestra el cursor de agarre
      autoplay: {
        delay: 0, // Inicia el movimiento de inmediato
        disableOnInteraction: false, // El autoplay no se detiene al interactuar
      },
      speed: 3000, // Velocidad del movimiento
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 1.5,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
      }
    });
  });
</script>