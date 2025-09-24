<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



<style>
  .text-custom-orange {
    color: #f7a38f;
  }

  /* Estilos para la tarjeta de miembro del equipo */
  .team-member-card {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .team-member-card img {
    width: 100%;
    height: auto;
    display: block;
  }

  /* Efecto de superposición (overlay) */
  .team-member-card .overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    text-align: center;
    transform: translateY(100%);
    transition: transform 0.3s ease-in-out;
  }

  .team-member-card:hover .overlay {
    transform: translateY(0);
  }
</style>


<div class="container-fluid my-5">
  <div class="row">
    <div class="col-12 text-start mb-4 px-5">
      <p class="text-uppercase fw-bold text-custom-orange">EXPERTOS</p>
      <h1 class="display-4 fw-bold">NUESTRO EQUIPO</h1>
    </div>
  </div>

  <div class="swiper team-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide team-member-card">
        <img src="https://picsum.photos/300/400?random=1" alt="Miembro del equipo 1">
        <div class="overlay">Miembro del equipo 1</div>
      </div>
      <div class="swiper-slide team-member-card">
        <img src="https://picsum.photos/300/400?random=2" alt="Miembro del equipo 2">
        <div class="overlay">Miembro del equipo 2</div>
      </div>
      <div class="swiper-slide team-member-card">
        <img src="https://picsum.photos/300/400?random=3" alt="Miembro del equipo 3">
        <div class="overlay">Miembro del equipo 3</div>
      </div>
      <div class="swiper-slide team-member-card">
        <img src="https://picsum.photos/300/400?random=4" alt="Miembro del equipo 4">
        <div class="overlay">Miembro del equipo 4</div>
      </div>
      <div class="swiper-slide team-member-card">
        <img src="https://picsum.photos/300/400?random=5" alt="Miembro del equipo 5">
        <div class="overlay">Miembro del equipo 5</div>
      </div>
      <div class="swiper-slide team-member-card">
        <img src="https://picsum.photos/300/400?random=6" alt="Miembro del equipo 6">
        <div class="overlay">Miembro del equipo 6</div>
      </div>
    </div>
    
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

  </div>
</div>



<script>
  document.addEventListener("DOMContentLoaded", function() {
    new Swiper('.team-swiper', {
      slidesPerView: 4, 
      spaceBetween: 20, 
      loop: true, 
      freeMode: true, 
      grabCursor: true, 
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
      speed: 5000, 
      // Añade esta sección para la navegación
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
          slidesPerView: 4,
          spaceBetween: 20,
        },
      }
    });
  });
</script>