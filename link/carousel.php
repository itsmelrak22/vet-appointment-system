<!-- <br> -->
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div id="home" class="content-wrapper pt-5 mt-3 w-100" style="box-shadow: rgba(0, 0, 0, .1) 0px 25px 30px -30px; height: 100vh">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" style="height: 95vh;">
                    <div class="carousel-item active">
                      <img class="d-block w-100" style="opacity: 0.4; height: 100vh;" src="images/first.jpg" alt="First slide">
                          <div class="carousel-caption top-0 mt-4">
                          <p class="fs-3 text-uppercase" style="color: #0C375A; margin-top: 15rem"> Give your pet the best experience </p>
                          <h1 class="display-1 fw-bolder text-capitalize" style="color: #0C375A;"> We offer effective services </h1> 
                              <a href="#book" accesskey="a" class="btn mt-4 px-4 py-2 fs-5 text-white mt-5;" style="display: flex justify-content-center; background-color: #0C375A">Book now! </a>
                              </div>
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" style="opacity: 0.4; height: 100vh;" src="images/second.jpg" alt="Second slide">
                      <div class="carousel-caption top-0 mt-4">
                          <p class="fs-3 text-uppercase" style="color: #0C375A; margin-top: 15rem"> Give your pet the best experience </p>
                          <h1 class="display-1 fw-bolder text-capitalize" style="color: #0C375A;"> We offer online appointment </h1> 
                          <a href="#book" accesskey="a" class="btn mt-4 px-4 py-2 fs-5 text-white mt-5;" style="display: flex justify-content-center; background-color: #0C375A">Book now! </a>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" style="opacity: 0.4; height: 100vh;" src="images/third.jpg" alt="Second slide">
                      <div class="carousel-caption top-0 mt-4">
                          <p class="fs-3 text-uppercase" style="color: #0C375A; margin-top: 15rem"> Give your pet the best experience </p>
                          <h1 class="display-1 fw-bolder text-capitalize" style="color: #0C375A;"> We offer Virtual consultation </h1> 
                          <a href="#book" accesskey="a" class="btn mt-4 px-4 py-2 fs-5 text-white mt-5;" style="display: flex justify-content-center; background-color: #0C375A">Book now! </a>
                      </div>
                    </div>
                    </div>
                          <!-- MODAL TO -->
                            <div id="book" class="modal1">
                              <div class="modal1__content"  style="height: 300px; width: 1000px;">
                              <div class="d-flex align-content-center flex-column h-100">
                                <div class="book d-flex justify-content-center mt-4 fs-4 fw-bold"> Book an appointment for: </div>
                                <div class=" d-flex w-100 h-100">
                                  <div class="choices w-50 align-items-center d-flex flex-column justify-content-center">
                                  <i class="fa-solid fa-house-chimney-medical"></i>
                                    <a href="appoint.php" class="button-w btn text-white bg-primary p-2 w-50" role="button">Walk in</a>
                                  </div>
                                  <div class="w-50 align-items-center d-flex flex-column justify-content-center">
                                    <i class="fa-solid fa-video"></i>
                                    <a href="appoint2.php" class="button-v btn text-white bg-primary p-2 w-50" role="button">Virtual</a>
                                  </div>
                                </div>
                                </div>
                                <a href="#" class="modal__close text-end fs-3" style="margin-top: -20px">&times;</a>
                                </div>
                            </div>

                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
            </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"></script> -->
<style>
  .content-wrapper img{
    height: 89vh;
    width: 100%;   
  }

.modal1 {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(77, 77, 77, .7);
    transition: all .4s;
}

.modal1 i{
  font-size: 5em;
  padding-bottom: 10px;
}

.modal1:target {
    visibility: visible;
    opacity: 1;
}
/* .modal1 .modal1__content{
  height: 500px;
    width: 100px;
  
} */

 .modal1__content {
    border-radius: 4px;
    position: relative;
    height: 100px;
    width: 500px;
    max-width: 40%;
    background: #fff;
    padding: 1em 2em;
    align-items: center;
    box-shadow: 6px 6px 10px rgba(0, 0, 0, .2);
} */

.choices{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 15px;

}
.modal1__footer {
    text-align: right;
}
.modal1__close {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #585858;
    text-decoration: none;
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
