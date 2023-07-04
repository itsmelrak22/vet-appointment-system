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
  </div>

</about> 
<div class="container">
    <div class="container team">
        <div class="row">
        <?php foreach ($doctors as $key => $value) { $value = (object) $value?>
            <div class="col-xs-12 col-sm-12 col-md-6 flip-column">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="frontside">
                        <div class="card team-card">
                            <div class="card-body text-center">
                            <p><img class="img-fluid" src="admin\<?=$value->avatar?>" alt="card image"></p>
                            <p class="card-text"><?=$value->name?></p>
                            </div>
                        </div>
                        </div>
                        <div class="backside">
                        <div class="card team-card">
                            <div class="card-body text-center mt-4">
                            <p class="card-text"><?=$value->description?></p>
                            <ul class="list-inline">
                                <!-- Add any additional information or content for the back side of the card here -->
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
</div>
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
