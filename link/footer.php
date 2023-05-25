
  <footer id="contact-us">
    <div class="content">
      <div class="top">
        <div class="logo-details">
          <span class="logo_name">Contact Us</span>
        </div>
        <div class="media-icons">
          <a href="#"><ion-icon name="logo-facebook"></ion-icon></i></a>
          <a href="#"><ion-icon name="logo-twitter"></ion-icon></i></a>
          <a href="#"><ion-icon name="logo-instagram"></ion-icon></i></a>
          <a href="#"><ion-icon name="logo-linkedin"></ion-icon></i></a>
          <a href="#"><ion-icon name="logo-youtube"></ion-icon></i></a>
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
          <li><a href="admin/login.php">Log in</a></li>
        </ul>

        <ul class="box input-box">
          <li class="link_name">Message us</li>
          <li><p class="mes"> Your feedback and inquiries is appreciated</p>
          
          <!-- SEND A MESSAGE BUTTON TO -->
          <li><div class="send"> 
            <a class="wrapper" href="#open" accesskey="a"> Send a Message </a>
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

</body>
</html>

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
.content .top .logo-details{
  color: #fff;
  font-size: 30px;
}
.content .top .media-icons{
  display: flex;
}
.content .top .media-icons a{
  height: 40px;
  width: 40px;
  margin: 0 8px;
  border-radius: 50%;
  text-align: center;
  line-height: 40px;
  color: #fff;
  font-size: 17px;
  text-decoration: none;
  transition: all 0.4s ease;
}
.top .media-icons a:nth-child(1){
  background: #4267B2;
}
.top .media-icons a:nth-child(1):hover{
  color: #4267B2;
  background: #fff;
}
.top .media-icons a:nth-child(2){
  background: #1DA1F2;
}
.top .media-icons a:nth-child(2):hover{
  color: #1DA1F2;
  background: #fff;
}
.top .media-icons a:nth-child(3){
  background: #E1306C;
}
.top .media-icons a:nth-child(3):hover{
  color: #E1306C;
  background: #fff;
}
.top .media-icons a:nth-child(4){
  background: #0077B5;
}
.top .media-icons a:nth-child(4):hover{
  color: #0077B5;
  background: #fff;
}
.top .media-icons a:nth-child(5){
  background: #FF0000;
}
.top .media-icons a:nth-child(5):hover{
  color: #FF0000;
  background: #fff;
}
footer .content .link-boxes{
  width: 100%;
  display: flex;
  justify-content: space-between;
}
footer .content .link-boxes .box{
  width: calc(100% / 5 - 10px);
}
.content .link-boxes .box .link_name{
  color: #fff;
  font-size: 18px;
  font-weight: 400;
  margin-bottom: 10px;
  position: relative;
}
.link-boxes .box .link_name::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: -2px;
  /* height: 2px;
  width: 35px; */
  background: #fff;
}
.content .link-boxes .box li{
  margin: 6px 0;
  list-style: none;
}
.content .link-boxes .box li a{
  color: #fff;
  font-size: 14px;
  font-weight: 400;
  text-decoration: none;
  opacity: 0.8;
  transition: all 0.4s ease
}
.content .link-boxes .box li a:hover{
  opacity: 1;
  text-decoration: underline;
}
.content .link-boxes .input-box{
  margin-right: 55px;
}
/* .link-boxes .input-box input{
  height: 40px;
  width: calc(100% + 55px);
  outline: none;
  /* border: 2px solid #AFAFB6; */
  /* background: #140B5C; */
  /* border-radius: 4px;
  padding: 0 15px;
  font-size: 15px;
  color: #fff;
  margin-top: 5px; */
 */
/* .link-boxes .input-box input::placeholder{
  color: #AFAFB6;
  font-size: 16px;
} */
.link-boxes .input-box input[type="button"]{
  background: blue;
  color: #140B5C;
  border: none;
  font-size: 18px;
  font-weight: 500;
  margin: 4px 0;
  opacity: 0.8;
  cursor: pointer;
  transition: all 0.4s ease;
}
/* .input-box input[type="button"]:hover{
  opacity: 1;
  background-color: blue;
} */
footer .bottom-details{
  width: 100%;
  background: #0F0844;
}
footer .bottom-details .bottom_text{
  max-width: 1250px;
  margin: auto;
  padding: 20px 40px;
  display: flex;
  justify-content: space-between;
}
.bottom-details .bottom_text span,
.bottom-details .bottom_text a{
  font-size: 14px;
  font-weight: 300;
  color: #fff;
  opacity: 0.8;
  text-decoration: none;
}
.bottom-details .bottom_text a:hover{
  opacity: 1;
  text-decoration: underline;
}
/* .bottom-details .bottom_text a{
  margin-right: 10px;
} */
@media (max-width: 900px) {
  footer .content .link-boxes{
    flex-wrap: wrap;
  }
  footer .content .link-boxes .input-box{
    width: 40%;
    margin-top: 10px;
  }
}
@media (max-width: 700px){
  footer{
    position: relative;
  }
  .content .top .logo-details{
    font-size: 26px;
  }
  .content .top .media-icons a{
    height: 35px;
    width: 35px;
    font-size: 14px;
    line-height: 35px;
  }
  footer .content .link-boxes .box{
    width: calc(100% / 3 - 10px);
  }
  footer .content .link-boxes .input-box{
    width: 60%; 
  }
  .bottom-details .bottom_text span,
  .bottom-details .bottom_text a{
    font-size: 12px;
  }
}
@media (max-width: 520px){
  footer::before{
    top: 145px;
  }
  footer .content .top{
    flex-direction: column;
  }
  .content .top .media-icons{
    margin-top: 16px;
  }
  footer .content .link-boxes .box{
    width: calc(100% / 2 - 10px);
  }
  footer .content .link-boxes .input-box{
    width: 100%;
  }
}

/* STYLE TO SA MODAL AT SEND A MESSAGE */
/* .send{
    display: flex;
     justify-content: center; 
    align-content: center;
} */
/* .wrapper{
    padding: 10px;
     background-color: black;
     justify-content: center;
      text-decoration: none;
      color: white; 
      
      
}
.wrapper:hover{
    background: gray;
    color: black;
}

.modal {
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

.modal:target {
    visibility: visible;
    opacity: 1;
}

.modal__content {
    border-radius: 4px;
    position: relative;
    height: 540px;
    width: 500px;
    max-width: 60%;
    background: #fff;
    padding: 1em 2em;
    align-items: center;
    box-shadow: 6px 6px 10px rgba(0, 0, 0, .2);
}
.modal__footer {
    text-align: right;
} */
/* .modal__close {
    position: absolute;
    top: 20px;
    right: 10px;
    size: 10rem;
    text-decoration: none;
} */
h2{
	margin:10px 0;
	padding-bottom:10px;
	width:180px;
	color:#78788c;
	border-bottom:3px solid #78788c;
}
input{
	width:100%;
	padding:10px;
	box-sizing:border-box;
	background:none;
	outline:none;
	resize:none;
	border:0;
	font-family:'Montserrat',sans-serif;
	transition:all .3s;
	border-bottom:2px solid #bebed2
}
input:focus{
	border-bottom:2px solid #78788c
}
p:before{
	content:attr(type);
	display:block;
	margin:28px 0 0;
	font-size:14px;color:#5a5a5a
}
button{
	float:right;
	padding:8px 12px;
	margin:8px 0 0;
	font-family:'Montserrat',sans-serif;
	border:2px solid #78788c;
	background:0;
	color:#5a5a6e;
	cursor:pointer;
	transition:all .3s
}
button:hover{
	background:#78788c;
	color:#fff
}

</style>