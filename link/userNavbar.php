<?php require_once('../link/header.php') ?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <!-- <link rel="stylesheet" href="./css/homepages.css"> -->
      <!-- <link rel="stylesheet" href="../css/homepages.css"> -->
            
        <nav class="fixed-top d-flex p-1"> 
        <div class="d-flex justify-content-between align-items-center m-2">
            <img src="../images/colclogo.png" alt="Site Logo" class="brand-image img-circle ">
            <div class="logo">Circle of life Veterinary Clinic </div>
            <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a class="active" href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="#contact-us">Contact</a></li>
                <li><a href="#">Virctual Consultation </a></li>
            </ul>
        </div>
        </nav>

<style>
    
a, a:hover{
    text-decoration: none;
}

nav{
  display: flex;
  /* height: 70px; */
  /* width: 100%; */
  background-color: #0C375A;
  align-items: center;
  justify-content: space-between;
  align-items: center;
  /* padding: 120px 50px 0 20px; */
  flex-wrap: wrap;
}

nav img{
   /* opacity: .8; */
   width: 4%;
}
nav .logo{
  color: white;
  font-size: calc(16px + (20 - 16) * ((100vw - 320px) / (1200 - 320)));
  letter-spacing: 5px;
  font-weight: 600;
}
nav ul{
  display: flex;
  align-items: center;
  align-content: center;
  margin: 0;
  top: 0;
  bottom: 0;
  gap: 10px;
  margin-right: 10px;
}

nav ul li{
  display: flex;
  align-items: center;
  list-style: none;
}
nav ul li a{
  color: white;
  text-decoration: none;
  font-size: 18px;
  font-weight: 300;
  padding: 10px;
  border-radius: 5px;
  letter-spacing: 1px;
  transition: all 0.3s ease;
 
}
nav ul li a.active,
nav ul li a:hover{
  color: white;
  background:#0b528a;
  /* opacity: 0.5; */
}
nav .menu-btn i{
  color: #fff;
  font-size: 22px;
  cursor: pointer;
  display: none;
}
input[type="checkbox"]{
  display: none;
}

/* @media (max-width: 1280px) {
    nav{
        width: 100px;
        background: #000;
    }
} */

@media only screen and (max-width: 1280px) {
    nav img{
        visibility: hidden;
    }
}

@media only screen and (max-width: 627px) {
    .logo{
        justify-content: center;
     }
     nav{
        height: 70px;
      }
}

@media only screen and (max-width: 512px){
    .logo{
        font-size: .5em;
    }
}

@media only screen and (max-width: 1000px){
    nav{
        padding: 0 40px 0 50px;
        background-color: #0c375a;
    }
}
@media (max-width: 920px) {
    .logo{
        text-align: center;
    }

    nav .menu-btn i{
        display: block;
    }

    #click:checked ~ .menu-btn i:before{
        content: "\f00d";
    }

    nav{
        height: 70px;
    }

    nav ul{
        position: fixed;
        top: 60px;
        left: -100%;
        margin-left: -10px;
        background: #111;
        opacity: .5;
        height: 100vh;
        width: 100%;
        text-align: center;
        display: block;
        transition: all 0.3s ease;
    }
    #click:checked ~ ul{
        left: 5px;
    }

    nav ul li{
        width: 100%;
        margin: 40px 0;
    }

    nav ul li a{
        width: 100%;
        margin-left: -100%;
        display: block;
        font-size: 20px;
        transition: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    #click:checked ~ ul li a{
        margin-left: 0px;
    }

    nav ul li a.active,
    nav ul li a:hover{
        background: none;
        color: cyan;

    }
}
</style>
