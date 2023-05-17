<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Circle of life </title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<?php
    include 'config.php';
?>
  <div class="sidebar" >
        <ul class="nav-list">
            <li style="margin-left: -25px;">
                <a href="index.html">
                <img src="../images/adlogo.png"></img>
                <span class="links_name">Go to Website</span>
               <span class="tooltip">Go to Website </span>
              </a>
            </li>
          <div class="logo-details">
              <div class="logo_name" style="margin-left: -20px;" >Welcome Admin!</div>
              <i class='bx bx-menu' id="btn" ></i>
          </div>
          
    <div style="margin-left: -59px;">
          <ul class="nav-list">
            <li>
              <a href="../admin/dashboard.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
              </a>
               <span class="tooltip">Dashboard</span>
                </li>
                    <li>
                    <a href="walkin_list.php">
                    <span class="position-relative">
                    <?php 
                                    $select_walkin = mysqli_query($conn,"SELECT * FROM appointments WHERE status='Pending'"); 
                                    $counter_walk = 0;
                                    if (mysqli_num_rows($select_walkin)){
                                        while($walk=mysqli_fetch_array($select_walkin)){
                                         $counter_walk = $counter_walk + 1;     
                                        }
                                       
                                    }
                                ?>
                    <i class='bx bx-copy-alt'></i>
                    <span id="notif_walk" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-left: -5px;">
                    <?php echo $counter_walk; ?>
                </span>
            </span>
                <span class="links_name" >Walk in appointment</span>
                </a>
                <span class="tooltip">Walk in list</span>
            </li>
           <li>
             <a href="virtual.php">
                    <span class="position-relative">
                    <?php 
                                          $select_virtual = mysqli_query($conn,"SELECT * FROM appointments2"); 
                                          $counter_virtual = 0;
                                          if (mysqli_num_rows($select_virtual)){
                                              while($vir=mysqli_fetch_array($select_virtual)){
                                              $counter_virtual = $counter_virtual + 1;     
                                              }
                                            
                                          }
                                      ?> 
                     <i class='bx bx-video'></i>
                    <span  id="notif_virtual" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-left: -5px;"> <?php  echo $counter_virtual;?>
                   </span>
                </span>
                    <span class="links_name">Virtual appointment</span>
                  </a>
                  <span class="tooltip">Virtual list</span>
                </li>
          
           <li>
       
           <li>
             <a href="../admin/messreq.php">
              <i class='bx bx-chat' ></i>
               <span class="links_name">Inquries</span>
             </a>
             <span class="tooltip">Inquries</span>
           </li>
           <li>
             <a href="../admin/services_list.php">
              <i class='bx bx-server'></i>
               <span class="links_name">Services</span>
             </a>
             <span class="tooltip">Services</span>
           </li>
           <li>
             <a href="../admin/admin_user_list.php">
               <i class='bx bx-user' ></i>
               <span class="links_name">User list</span>
             </a>
             <span class="tooltip">User list</span>
           </li>
           <li>
             <a href="#">
               <i class='bx bx-cog' ></i>
               <span class="links_name">Setting</span>
             </a>
             <span class="tooltip">Setting</span>
           </li>
           <li class="profile">
               <div class="profile-details">
                 <img src="../images/admin.png" alt="profileImg">
                 <div class="name_job">
                   <div class="name">Administrator</div>
                   <div class="job">CircleOflife</div>
                 </div>
               </div>
               <a href="#">
               <i class='bx bx-log-out' id="log_out"></i>
              </a>
              <span class="tooltip">Log out</span>
           </li>
          </ul>
    </div>
  </div>
    <section class="home-section">
          <!-- CONTENT -->
          <section id="content">
            <!-- NAVBAR -->
            <nav>
              <!-- <i class='bx bx-menu' ></i> -->
              <a href="#" class="nav-link"> Circle of life Veterinary Clinic </a>
              <form action="#">
                <div class="form-input">
                  <input type="search" placeholder="Search...">
                  <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                </div>
              </form>
              <!-- <input type="checkbox" id="switch-mode" hidden>
              <label for="switch-mode" class="switch-mode"></label>
              <a href="#" class="notification">
                <i class='bx bxs-bell' ></i>
                <span class="num">8</span>
              </a> -->
              <a href="#" class="profile">
                <img src="../images/admin.png">
              </a>
            </nav>
            <!-- NAVBAR -->
  <style>
    /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
.sidebar{
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 78px;
  background: #0C375A;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open{
  width: 250px;
}
.sidebar .logo-details{
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon{
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name{
  opacity: 1;
}
.sidebar .logo-details #btn{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn{
  text-align: right;
}
.sidebar i{
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}

.sidebar .nav-list{
  margin-top: 20px;
  height: 100%;
}
.sidebar li {
  position: relative;
  margin: 8px 0;
  list-style: none;
}
.sidebar li .tooltip{
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip{
  display: none;
}
.sidebar input{
  font-size: 15px;
  color: #FFF;
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: #1d1b31;
}
.sidebar.open input{
  padding: 0 20px 0 50px;
  width: 100%;
}
.sidebar li a{
  background-color: yellow;
  display: flex;
  height: 100%;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #0C375A;
}
.sidebar li a:hover{
  background: #FFF;
}
.sidebar li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name{
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i{
  transition: all 0.5s ease;
  color: #11101D;
}
.sidebar li i{
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li.profile{
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile{
  width: 250px;
}
.sidebar li .profile-details{
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img{
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job{
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job{
  font-size: 12px;
}
.sidebar .profile #log_out{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}
.sidebar.open .profile #log_out{
  width: 50px;
  background: none;
}
.home-section{
  position: relative;
  background: #E4E9F7;
  /* min-height: 100vh; */
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}
.sidebar.open ~ .home-section{
  left: 250px;
  width: calc(100% - 250px);
}
#content nav {
	height: 56px;
	background: white;
	padding: 0 24px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
	font-family: var(--lato);
	position: sticky;
	top: 0;
	left: 0;
	z-index: 1000;
}
#content nav::before {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	bottom: -40px;
	left: 0;
	border-radius: 50%;
	box-shadow: -20px -20px 0 var(--light);
}
#content nav a {
	color: black;
}

#content nav .nav-link {
	font-size: 16px;
	transition: .3s ease;
 
}
#content nav .nav-link:hover {
	color: grey;
  
}
#content nav form {
	max-width: 400px;
	width: 100%;
	margin-right: auto;
}
#content nav form .form-input {
	display: flex;
	align-items: center;
	height: 36px;
  border: grey;
}
#content nav form .form-input input {
	flex-grow: 1;
	padding: 0 16px;
	height: 100%;
	border: none;
	background:  #eee;
	border-radius: 36px 0 0 36px;
	outline: none;
	width: 100%;
	color: var(--dark);
}
#content nav form .form-input button {
	width: 36px;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	background:  #3C91E6;
	color: black;
	font-size: 18px;
	border: none;
	outline: none;
	border-radius: 0 36px 36px 0;
	cursor: pointer;
  background-color:  #e4e9f7;
}
#content nav .notification {
	font-size: 20px;
	position: relative;
}
#content nav .notification .num {
	position: absolute;
	top: -6px;
	right: -6px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid var(--light);
	background: var(--red);
	color: var(--light);
	font-weight: 700;
	font-size: 12px;
	display: flex;
	justify-content: center;
	align-items: center;
}

#content nav .profile img {
	width: 36px;
	height: 36px;
	object-fit: cover;
	border-radius: 50%;
}
#content nav .switch-mode {
	display: block;
	min-width: 50px;
	height: 25px;
	border-radius: 25px;
	background: var(--grey);
	cursor: pointer;
	position: relative;
}
#content nav .switch-mode::before {
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	bottom: 2px;
	width: calc(25px - 4px);
	background: var(--blue);
	border-radius: 50%;
	transition: all .3s ease;
}
#content nav #switch-mode:checked + .switch-mode::before {
	left: calc(100% - (25px - 4px) - 2px);
}
@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
}

  </style>
 
  <script>
    let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});

searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
  sidebar.classList.toggle("open");
  menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
 }
}
  //notif number in walk in
        let notif_walk = <?php echo $counter_walk ?>;
        if (notif_walk == 0){
            document.getElementById('notif_walk').style.display='none';
        } 
        else{
            document.getElementById('notif_walk').style.display='block';
        }
         //notif number to zero of virtual
        let notif_virtual = <?php echo $counter_virtual ?>;
        if (notif_virtual == 0){
            document.getElementById('notif_virtual').style.display='none';
        } 
        else{
            document.getElementById('notif_virtual').style.display='block';
        }

  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  
</body>
</html>
