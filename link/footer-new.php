<div class="container-fluid" id="contact-us">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="d-flex align-items-center mb-5 col-md-6">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1"> </a>
      <span class="">&copy; 2023 Circle of Life Veterinary Clinic</span>
    </div>

    <ul class="nav col-md-6 justify-content-end list-unstyled d-flex mb-5">
      <li class="ms-3"><a class="text-white" href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
      <li class="ms-3"><a class="text-white" href="https://www.instagram.com/circleoflifedvm/" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a></li>
      <li class="ms-3" style="margin-right: 1rem!important;"><a class="text-white" href="https://www.facebook.com/circleoflifedvm" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a></li>
    </ul>

    <div class="link-boxes col-md-7 d-flex justify-content-between">
      <div class="responsive-iframe-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.520548377581!2d120.85199361462907!3d14.397129389932337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33962d7daf583223%3A0x31970027b6867c42!2sCircleOfLife%20Veterinary%20Clinic%20and%20Grooming%20Center!5e0!3m2!1sen!2sph!4v1680178638275!5m2!1sen!2sph" 
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <div class="link-boxes col-md-5 d-flex justify-content-between">
      <ul class="box">
        <li class="link_name">Information</li>
        <li><a href="#" class="text-white"><ion-icon name="call-outline"> </ion-icon> 0956 302 6013</a></li>
        <li><a href="#" class="text-white"><ion-icon name="mail-outline"></ion-icon> circleoflifedvm@gmail.com</a></li>
        <li><a href="#" class="text-white"><ion-icon name="location-outline"></ion-icon>2/F Conwell Bulding, San Agustin, Daang Amaya 3, Tanza, Cavite, Tanza, Philippines, 4108 </li>
      </ul>
    </div>
  </footer>
</div>
<style>

li a:hover{
  opacity: 1;
  text-decoration: underline;
}

.box li a{
  color: #fff;
  font-size: 14px;
  font-weight: 400;
  text-decoration: none;
  opacity: 0.8;
  transition: all 0.4s ease
}

.box li{
  margin: 6px 0;
  list-style: none;
}

.link_name{
  color: #fff;
  font-size: 18px;
  font-weight: 400;
  margin-bottom: 10px;
  position: relative;
}

.link_name::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: -2px;
  /* height: 2px;
  width: 35px; */
  background: #fff;
}

  .responsive-iframe-container {
    position: relative;
    width: 100%;
    padding-bottom: 27.6%; /* Adjust this value according to the aspect ratio of your iframe */
  }

  .responsive-iframe-container iframe {
    position: absolute;
    top: 0;
    left: 10px;
    width: 100%;
    height: 100%;
  }

  footer{
  background: #0C375A;
  width: 100%;
  bottom: 0;
  left: 0;
}
footer::before{
  content: '';
  position: absolute;
  left: 0;
  top: 100px;
  height: 1px;
  width: 100%;
  /* background: #AFAFB6; */
}
footer .content{
  max-width: 1250px;
  margin: auto;
  padding: 30px 40px 40px 40px;
}
footer .content .link-boxes{
  width: 100%;
  display: flex;
  justify-content: space-between;
}
footer .content .link-boxes .box{
  width: calc(100% / 5 - 10px);
}
</style>