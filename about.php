<about id="about">
          <div class ="about_content">
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
</about> 
<style>
about{
    display: flex;
    width: 98.9vw;
    justify-content: center;
    align-items: center; 
    font-family: 'Playfair Display', serif;
    /* background-color: silver;  */
    opacity: 0.9;
    height: fit-content;
    padding: 20px;
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


 </style>
