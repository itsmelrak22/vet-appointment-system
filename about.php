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
    </div>
    <br>
    <div class="container about2">
        <div class="row">
            <?php foreach ($doctors as $key => $value) { $value = (object) $value?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" >
                        <div class="mainflip flip-0">
                            <div class="frontside">
                                <div class="card" style=" width: 320px">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="admin\<?=$value->avatar?>" alt="card image"></p>
                                        <h4 class="card-title">CLVC</h4>
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
    border-radius: 50%;
}
</style>