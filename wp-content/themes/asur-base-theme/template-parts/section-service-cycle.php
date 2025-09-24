<div class="container my-5">
  <div class="row">
    <div class="col-12 text-center text-md-start">
      <p class="text-uppercase fw-bold" style="color: #f7a38f;">SERVICIO</p>
      <h2 class="display-5 fw-bold mb-3">CICLO DEL SERVICIO</h2>
      <p class="w-75 mx-auto mx-md-0">
        Desarrollamos integralmente un Ciclo de Servicios en tres (4, 5, ...) etapas, para asegurar un máximo cumplimiento del conjunto de necesidades del cliente.
      </p>
    </div>
  </div>

  <div class="row align-items-center justify-content-center mt-5">
    <div class="col-auto">
      <div id="prev-arrow" class="btn p-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16" style="transform: rotate(30deg); color: #354966;">
          <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
      </div>
    </div>
    
    <div class="col-auto position-relative text-center mx-3">
      <div id="main-image-container" class="position-relative">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-arrow-right-circle-fill position-absolute top-0 end-0 translate-middle-x" viewBox="0 0 16 16" style="transform: rotate(150deg); color: #f7a38f;">
          <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>

        <div id="circle-image" class="rounded-circle overflow-hidden" style="width: 300px; height: 300px; border: 20px solid #f7a38f;">
          <img id="dynamic-image" src="https://picsum.photos/400/400" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Imagen del ciclo">
        </div>
        
        <div id="number-circle" class="rounded-circle position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center fw-bold fs-1" style="width: 80px; height: 80px; background-color: #354966; color: white;">
          1
        </div>
      </div>
    </div>

    <div class="col-auto">
      <div id="next-arrow" class="btn p-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16" style="transform: rotate(30deg); color: #f7a38f;">
          <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
      </div>
    </div>
  </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
  const images = [
    { number: 1, url: "https://picsum.photos/400/400?random=1" },
    { number: 2, url: "https://picsum.photos/400/400?random=2" },
    { number: 3, url: "https://picsum.photos/400/400?random=3" },
    { number: 4, url: "https://picsum.photos/400/400?random=4" }
  ];

  let currentIndex = 0;
  const dynamicImage = document.getElementById("dynamic-image");
  const numberCircle = document.getElementById("number-circle");
  const prevArrow = document.getElementById("prev-arrow");
  const nextArrow = document.getElementById("next-arrow");

  function updateContent() {
    dynamicImage.src = images[currentIndex].url;
    numberCircle.textContent = images[currentIndex].number;
  }

  prevArrow.addEventListener("click", function() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateContent();
  });

  nextArrow.addEventListener("click", function() {
    currentIndex = (currentIndex + 1) % images.length;
    updateContent();
  });
});
</script>