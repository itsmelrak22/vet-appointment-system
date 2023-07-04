
  <footer id="contact-us">
    <div class="content">
      <div class="top">
        <div class="logo-details">
          <span class="logo_name">Contact Us</span>
        </div>
        <div class="media-icons">
          <a href="https://www.facebook.com/circleoflifedvm" target="_blank"><ion-icon name="logo-facebook"></ion-icon></i></a>
          <!-- <a href="#"><ion-icon name="logo-twitter"></ion-icon></i></a>
          <a href="#"><ion-icon name="logo-instagram"></ion-icon></i></a>
          <a href="#"><ion-icon name="logo-linkedin"></ion-icon></i></a>
          <a href="#"><ion-icon name="logo-youtube"></ion-icon></i></a> -->
        </div>
      </div>
      <div class="link-boxes">
        <!-- <img src="../images/location.png" alt=""> -->
        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.520548377581!2d120.85199361462907!3d14.397129389932337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33962d7daf583223%3A0x31970027b6867c42!2sCircleOfLife%20Veterinary%20Clinic%20and%20Grooming%20Center!5e0!3m2!1sen!2sph!4v1680178638275!5m2!1sen!2sph"
             width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>

        <ul class="box">
          <li class="link_name">Information</li>
          <li><a href="#"><ion-icon name="call-outline"> </ion-icon> 0956 302 6013</a></li>
          <li><a href="#"><ion-icon name="mail-outline"></ion-icon> circleoflifedvm@gmail.com</a></li>
          <li><a href="#"><ion-icon name="location-outline"></ion-icon>2/F Conwell Bulding, San Agustin, Daang Amaya 3, Tanza, Cavite, Tanza, Philippines, 4108
Address</a></li>
          
        </ul>

        <ul class="box input-box">
          <!-- <li class="link_name">Message us</li>
          <li><p class="mes"> Your feedback and inquiries is appreciated</p> -->
          
          <!-- SEND A MESSAGE BUTTON TO -->
          <li><div class="send"> 
            <!-- <a class="wrapper" href="#open" accesskey="a"> Send a Message </a> -->
        </div>
        </li>
        </ul>
      </div>
    </div>
        <div id="open" class="modal">
            <div class="modal__content">
                <a href="#" class="modal__close text-end" style="margin-top: -5px">&times;</a>
                <form class="form" action="submit_message.php" method="post">
                    <h2>CONTACT US</h2>
                    <p type="Name:">
                        <input type="text" id="name" name="name" placeholder="Write your name here.." required></input></p>
                    <p type="Email:">
                        <input type="email" id="email" name="email" placeholder="to Let us know how to contact you back.."></input></p>
                    <p type ="Phone Number">
                        <input type="tel" id="phone" name="phone" placeholder="thi is required" required></input></p>
                    <p type="Message:">
                        <input id="message" name="message" placeholder="What would you like to tell us.." required></input></p>
                    <button type="submit" value="submit"> Send Message </button>   
                 
                 <?php
            // Check if the form was successfully submitted
            if (isset($_GET['success']) && $_GET['success'] == 'true') {
                // echo '<div class="container success-message">';
                // echo '<p>Thank you for your message! We will get back to you soon.</p>';
                // echo '</div>';
                echo "<script>alert('Thank you for your message! We will get back to you soon.')</script>";
            }
            else
            {
              echo 'error';
            }
            ?>
                </div>
            </div>
        </form>
                <div class="bottom-details">
                <div class="bottom_text">
                    <span class="copyright_text" >Copyright © 2023 <a href="#">Circle of Life Veterinary Clinic </a> </span>
                    <span class="policy_terms">
                    <a href="#">Privacy policy</a>
                    <a href="#">Terms & condition</a>
                    </span>
                </div>
                </div>
            </footer>
<style>
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
.mes{
    color: white;
    justify-content: centex;
    text-align: center;
}
footer .content .top{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 50px;
}

</style>