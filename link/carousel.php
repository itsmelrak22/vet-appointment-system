<?php
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

$instance = new ClientSetting;
$settings = $instance->all();

$walkinSettings = $instance->getWalkin();
$virtualSettings = $instance->getVirtual();
$bookingSettings = $instance->getBooking();

?>
<div id="home" class="content-wrapper w-100" style="box-shadow: rgba(0, 0, 0, .1) 0px 25px 30px -30px;">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <?php if ((int) $bookingSettings->is_disabled) { ?>
        <div class="carousel-inner" >
          <div class="carousel-item active">
            <img class="d-block w-100" style="opacity: 0.4; height: 100vh; object-fit: cover;" src="images/first.jpg" alt="First slide">
            <div class="carousel-caption top-0 mt-4 d-flex flex-column align-items-center justify-content-center">
              <p class="fs-3 text-uppercase text-center" style="color: #0C375A;">Give your pet the best experience</p>
              <h1 class="display-1 fw-bolder text-capitalize text-center" style="color: #0C375A;">We offer Virtual consultation</h1> 
              <a data-bs-toggle="tooltip" data-bs-placement="top" title="Book Now is temporarily disabled" class="btn btn-secondary mt-4 px-4 py-2 fs-5 text-white" style="background-color: gray;" disabled>
                Book Now
              </a>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" style="opacity: 0.4; height: 100vh; object-fit: cover;" src="images/second.jpg" alt="First slide">
            <div class="carousel-caption top-0 mt-4 d-flex flex-column align-items-center justify-content-center">
              <p class="fs-3 text-uppercase text-center" style="color: #0C375A;">Give your pet the best experience</p>
              <h1 class="display-1 fw-bolder text-capitalize text-center" style="color: #0C375A;">We offer Virtual consultation</h1> 
              <a data-bs-toggle="tooltip" data-bs-placement="top" title="Book Now is temporarily disabled" class="btn btn-secondary mt-4 px-4 py-2 fs-5 text-white" style="background-color: gray;" disabled>
                Book Now
              </a>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" style="opacity: 0.4; height: 100vh; object-fit: cover;" src="images/third.jpg" alt="First slide">
            <div class="carousel-caption top-0 mt-4 d-flex flex-column align-items-center justify-content-center">
              <p class="fs-3 text-uppercase text-center" style="color: #0C375A;">Give your pet the best experience</p>
              <h1 class="display-1 fw-bolder text-capitalize text-center" style="color: #0C375A;">We offer Virtual consultation</h1> 
              <a data-bs-toggle="tooltip" data-bs-placement="top" title="Book Now is temporarily disabled" class="btn btn-secondary mt-4 px-4 py-2 fs-5 text-white" style="background-color: gray;" disabled>
                Book Now
              </a>
            </div>
          </div>

          <!-- Other carousel items -->

        </div>
      <?php } else { ?>
        <div class="carousel-inner" style="height: 95vh;">
          <div class="carousel-item active">
            <img class="d-block w-100" style="opacity: 0.4; height: 100vh; object-fit: cover;" src="images/first.jpg" alt="First slide">
            <div class="carousel-caption top-0 mt-4 d-flex flex-column align-items-center justify-content-center">
              <p class="fs-3 text-uppercase text-center" style="color: #0C375A;">Give your pet the best experience</p>
              <h1 class="display-1 fw-bolder text-capitalize text-center" style="color: #0C375A;">We offer Virtual consultation</h1> 
              <a class="btn btn-primary mt-4 px-4 py-2 fs-5 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #0C375A;">
                Book Now
              </a>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" style="opacity: 0.4; height: 100vh; object-fit: cover;" src="images/second.jpg" alt="First slide">
            <div class="carousel-caption top-0 mt-4 d-flex flex-column align-items-center justify-content-center">
              <p class="fs-3 text-uppercase text-center" style="color: #0C375A;">Give your pet the best experience</p>
              <h1 class="display-1 fw-bolder text-capitalize text-center" style="color: #0C375A;">We offer Virtual consultation</h1> 
              <a class="btn btn-primary mt-4 px-4 py-2 fs-5 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #0C375A;">
                Book Now
              </a>
            </div>
          </div>

        <div class="carousel-item">
          <img class="d-block w-100" style="opacity: 0.4; height: 100vh; object-fit: cover;" src="images/third.jpg" alt="First slide">
          <div class="carousel-caption top-0 mt-4 d-flex flex-column align-items-center justify-content-center">
            <p class="fs-3 text-uppercase text-center" style="color: #0C375A;">Give your pet the best experience</p>
            <h1 class="display-1 fw-bolder text-capitalize text-center" style="color: #0C375A;">We offer Virtual consultation</h1> 
            <a class="btn btn-primary mt-4 px-4 py-2 fs-5 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #0C375A;">
              Book Now
            </a>
          </div>
        </div>
          

          <!-- Other carousel items -->

        </div>
      <?php } ?>
    </div>
</div>


<!-- <div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->


            


<style>
  /* .content-wrapper img{
    height: 89vh;
    width: 100%;   
  }
 */

.choices{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 15px;

}

/* \\\
@media screen and (max-width: 720px) {
 .carousel-item {
    background-color: red;
}
.book{
  background-color: yellow;
} */
</style>
