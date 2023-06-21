<?php

spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

$instance = new Doctor;
$doctors = $instance->allWithOutTrash();
?>

<about id="about">
    <div class="about_content">
        <h2>About Us</h2>
                 <label><!-- line here --></label> 
                    <p class="first"> Sincere, compassionate and skilled veterinary care for all dogs and cats - all breeds and sizes.</p>
                        <span id="dots">...</span>
                            <span class="second" id="more">
                                Circle Of Life Veterinary Clinic started their official operation /launched their grand opening on February 24 2021. Circle of Life Veterinary Clince offers various services like grooming, services, Microscopic examination, Progesterone test, Surgery, etc. The Clinice has three doctors — two resident Veterinarians and one on-call veterinarian. It also has one groomer, one assistant veterinarian and one receptionist. The clinic has an in-house Ultrasound Services and Bionote Vcheck V200 Immunoflourescenes Analyzer. The Clinic also offers microchip implant  — Pet mircochip from Petdentity. <br>
                                We are a team of passionate and dedicated veterinarians who provide high-quality care for your pets. Our mission is to help your pets live happy and healthy lives by providing them with the best medical care possible. We believe that every pet deserves the best care, and we strive to make sure that all of our patients receive the personalized attention that they need.
                            
                            We offer a range of services, including regular check-ups, vaccinations, and emergency care. Our team is always available to answer any questions that you may have about your pet's health, and we are committed to providing you with the information that you need to make informed decisions about your pet's care. We are dedicated to building long-term relationships with our clients and their pets. We believe that it is important to get to know our patients and their owners in order to provide them with the best possible care. We are committed to providing a warm and welcoming environment for our clients and their pets.
                        
                                </span></p>

                                <button onclick="myFunction()" id="myBtn"> Read more</button>
                     <!-- </p> -->
    </div>
    <br>
    <div class="container about2">
        <div class="row">
            <?php foreach ($doctors as $key => $value) { $value = (object) $value?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" >
                        <div class="mainflip flip-0">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class="img-fluid" src="admin\<?=$value->avatar?>" alt="card image"></p>
                                        <h6 class="card-title">CLVC</h6>
                                        <p class="card-text"> <?=$value->name?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <p class="card-text"> <?=$value->description?> </p>
                                        <ul class="list-inline">
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</div>


</about> 
<style>
about{
    width: 98.9vw;
    font-family: 'Playfair Display', serif;
    /* background-color: silver;  */
    opacity: 0.9;
    padding: 20px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    align-content: center;
}

#myBtn {
  background-color: white;
  border: 1px solid #d5d9d9;
  border-radius: 8px;
  box-shadow: rgba(500, 217, 217, .5) 0 2px 5px 0; 
  box-sizing: border-box;
  color: #0f1111;
  cursor: pointer;
  display: inline-block;
  font-family: "Amazon Ember",sans-serif;
  font-size: 13px;
  line-height: 29px;
  padding: 0 10px 0 11px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  width: 100px;
  margin-top: -20px;
}

#myBtn:hover {
  background-color: #0C375A;
  color:white;
  /* opacity: 0.5; */
}

#myBtn:focus {
  /* border-color: #008296; */
  box-shadow: rgba(213, 217, 217, .5) 0 2px 5px 0;
  outline: 0;
}
.about_content{
    /* background-color: #12192c; */
     /* display: inline-block; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    align-content: center;
    border-radius: 0  12px 12px 0;
    color: #fff;
}
.about2{
    /* background-color: #12192c; */
     /* display: inline-block; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    /* align-items: center; */
    align-content: center;
    border-radius: 0  12px 12px 0;
    color: #fff;
}

.about_content .first{
    padding-bottom: 15px;
    font-weight: 300;
    opacity: 0.7;
    width: 60%;
    text-align: center;
    margin: 0 auto;
    line-height: 1.7;
    color: black;
    /* background-color: yellowgreen;  */
}

.second{
    width: 60%;
    text-align: center;
    margin: 0 auto;
    line-height: 1.7;
    color: gray;
    /* opacity: 0.7; */
}

#more {
    display: none;
    opacity: 1.7;
}

.about_content h2{
    text-transform: uppercase;
    font-size: 36px;
    letter-spacing: 6px;
    opacity: 0.9;
    color:  #0C375A;
    /* background-color: yellow; */
    width: fit-content;
    
}
.about_content label{
    height: 0.5px;
    width: 80px;
    background: #777;
    /* margin-top: 0; */
    padding-top: 0;
    margin-bottom: 10px;
    /* margin: 20px 0; */
}




</style>
<script>
    function myFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");
    
      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less"; 
        moreText.style.display = "inline";
      }
    }
    </script>


<style>
  /* FontAwesome for working BootSnippet :> */

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
#team {
    background: #eee !important;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}

section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#team .card {
    border: none;
    background: #ffffff;
}

.image-flip:hover .backside,
.image-flip.hover .backside {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    border-radius: .25rem;
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
}

.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
    margin-bottom: 30px;
    height: 400px !important;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    height: 400px !important;
    width: 400px !important;

}

.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
}

.frontside .card,
.backside .card {
    min-height: 312px;
}

.backside .card a {
    font-size: 18px;
    color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
}
</style>