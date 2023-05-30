<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$connection = new Appointment;
$connection2 = new AppointmentVirtual;
$sidebarWalkins = $connection->getDashboardData();
$sidebarVirtuals = $connection->getDashboardData();

?>
  <div class="sidebar" >
    <ul class="nav-list">
      <li style="margin-left: -25px;">
          <a href="../index.php">
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
          <a href="dashboard-walkin.php">
            <span class="position-relative">
                <?php 
    
                  ?>
                <i class='bx bx-copy-alt'></i>
                <span id="notif_walk" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-left: -5px;">
                  <?php echo count($sidebarWalkins); ?>
                </span>
            </span>
            <span class="links_name" >Clinic appointment</span>
          </a>
          <span class="tooltip">Clinic appointment list</span>
        </li>

        <li>
          <a href="dashboard-virtual.php">
            <span class="position-relative">
                <i class='bx bx-video'></i>
              <span  id="notif_virtual" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-left: -5px;"> 
                  <?php echo count($sidebarVirtuals); ?>
              </span>
            </span>
            <span class="links_name">Virtual appointment</span>
          </a>
          <span class="tooltip">Virtual list</span>
        </li>
      
        <!-- <li>
          <a href="../admin/messreq.php">
          <i class='bx bx-chat' ></i>
            <span class="links_name">Inquries</span>
          </a>
          <span class="tooltip">Inquries</span>
        </li> -->
        <hr style="color: white">
        <div class="logo-details">
          <div class="logo_name">Admin Settings</div>
        </div>

        <li>
          <a href="../admin/meeting_links.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Meeting Links</span>
          </a>
          <span class="tooltip">Meeting Links</span>
        </li>

        <li>
          <a href="../admin/admin_user_list.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">User list</span>
          </a>
          <span class="tooltip">User list</span>
        </li>

        <li>
          <a href="../admin/services_list.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Services</span>
          </a>
          <span class="tooltip">Services</span>
        </li>

        <li>
          <a href="../admin/doctor_list.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Doctor List</span>
          </a>
          <span class="tooltip">Doctor List</span>
        </li>
        <li>
          <a href="../admin/dashboard-scheduling.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Schedule Settings</span>
          </a>
          <span class="tooltip">Schedule Settings</span>
        </li>
        
          <li class="profile">
              <div class="profile-details">
                    <?php if( $_SESSION['user']['avatar'] ) { ?>
                      <img src="<?= $_SESSION['user']['avatar'] ?>" alt="profileImg">

                    <?php }else{ ?>
                      <img src="../images/admin.png" alt="profileImg">
                    <?php } ?>


                <div class="name_job">
                  <div class="name"> <?= $_SESSION['user']['username'] ?> </div>
                  <div class="job">CircleOflife</div>
                </div>
              </div>
              <button type="button"  data-bs-toggle="modal" data-bs-target="#logoutModal"><i class='bx bx-log-out' id="log_out"></i></button>
          </li>
      </ul>
    </div>
  </ul>
  </div>
 <section class="home-section">
      <!-- CONTENT -->
      <section id="content">
        <!-- NAVBAR -->
        <nav>
          <!-- <i class='bx bx-menu' ></i> -->
          <a href="#" class="nav-link"> <h2>Circle of life Veterinary Clinic</h2> </a>
          <form action="#">
            <div class="form-input">
              <div id="datetime"></div>
            </div>
          </form>
          <div class="name_job">
              <div class="name"> Welcome <?= $_SESSION['user']['username'] ?>!</div>
          </div>
        </nav>


<script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
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
      // let notif_walk = <?php // echo $counter_walk ?>;
      // if (notif_walk == 0){
      //     document.getElementById('notif_walk').style.display='none';
      // } 
      // else{
      //     document.getElementById('notif_walk').style.display='block';
      // }
      // //notif number to zero of virtual
      // let notif_virtual = <?php // echo $counter_virtual ?>;
      // if (notif_virtual == 0){
      //     document.getElementById('notif_virtual').style.display='none';
      // } 
      // else{
      //     document.getElementById('notif_virtual').style.display='block';
      // }

  </script>

<script>
  function updateDateTime() {
    var container = document.getElementById("datetime");
    var now = new Date();
    var dateTimeString = now.toLocaleString(); // Adjust the format if needed
    container.textContent = '0'+dateTimeString;
  }

  // Call the function initially to avoid delay
  updateDateTime();

  // Call the function every second (1000 milliseconds)
  setInterval(updateDateTime, 1000);
</script>

