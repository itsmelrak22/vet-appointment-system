<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$connection = new Appointment;
$connection2 = new AppointmentVirtual;
$sidebarWalkins = $connection->getPendingAppointments();
$sidebarVirtuals = $connection2->getPendingAppointments();


$requestURI = $_SERVER['REQUEST_URI'];
$filename = pathinfo($requestURI, PATHINFO_FILENAME);
$trimmedFilename = trim($filename);
$url = "$trimmedFilename.php";

$allowedLinksWalkin = [ 
  "dashboard-walkin.php",
  "dashboard-walkin-pending.php",
  "dashboard-walkin-today.php",
  "dashboard-walkin-confirmed.php",
  "dashboard-walkin-completed.php",
  "dashboard-walkin-cancelled.php"
];

$allowedLinksVirtual = [ 
  "dashboard-virtual.php",
  "dashboard-virtual-pending.php",
  "dashboard-virtual-today.php",
  "dashboard-virtual-confirmed.php",
  "dashboard-virtual-completed.php",
  "dashboard-virtual-cancelled.php"
];
?>


  <div class="sidebar open">
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
          <?php if($url == 'dashboard.php'){ ?>
              <a href="../admin/dashboard.php" class="active">
          <?php }else{ ?>
             <a href="../admin/dashboard.php">
          <?php } ?>
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>

        <li>
          <?php if( in_array($url, $allowedLinksWalkin) ){ ?>
              <a href="../admin/dashboard-walkin-pending.php" class="active">
          <?php }else{ ?>
            <a href="dashboard-walkin-pending.php">
          <?php } ?>
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
          <?php if( in_array($url, $allowedLinksVirtual) ){ ?>
              <a href="../admin/dashboard-virtual-pending.php" class="active">
          <?php }else{ ?>
            <a href="dashboard-virtual-pending.php">
          <?php } ?>
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

      
        <hr style="color: white">
        <div class="logo-details">
          <div class="logo_name">Admin Settings</div>
        </div>

        <li>
          <?php if($url == 'meeting_links.php'){ ?>
            <a href="../admin/meeting_links.php" class="active">
          <?php }else{ ?>
          <a href="../admin/meeting_links.php" >
          <?php } ?>
            <i class='bx bx-calendar-event' ></i>
            <span class="links_name">Meeting Links</span>
            <span class="tooltip">Meeting Links</span>
          </a>
        </li>
        <?php if( $_SESSION['user']['category'] == 'Admin' ) { ?>

        <li>
          <?php if($url == 'admin_user_list.php'){ ?>
            <a href="../admin/admin_user_list.php" class="active">
          <?php }else{ ?>
          <a href="../admin/admin_user_list.php">
          <?php } ?>
            <i class='bx bx-user-circle' ></i>
            <span class="links_name">User list</span>
          </a>
          <span class="tooltip">User list</span>
        </li>

        <li>
          <?php if($url == 'services_list.php'){ ?>
            <a href="../admin/services_list.php" class="active">
          <?php }else{ ?>
          <a href="../admin/services_list.php">
          <?php } ?>
            <i class='bx bx-book-add' ></i>
            <span class="links_name">Services</span>
          </a>
          <span class="tooltip">Services</span>
        </li>

        <li>
          <?php if($url == 'doctor_list.php'){ ?>
            <a href="../admin/doctor_list.php" class="active">
          <?php }else{ ?>
          <a href="../admin/doctor_list.php">
          <?php } ?>
            <i class='bx bx-user-voice' ></i>
            <span class="links_name">Doctor List</span>
          </a>
          <span class="tooltip">Doctor List</span>
        </li>

        <li>
        <?php if($url == 'client_settings.php'){ ?>
            <a href="../admin/client_settings.php" class="active">
          <?php }else{ ?>
          <a href="../admin/client_settings.php">
          <?php } ?>
            <i class='bx bx-cog' ></i>
            <span class="links_name">Client Settings</span>
          </a>
          <span class="tooltip">Client Settings</span>
        </li>
        <?php }?>
        <!-- <li>
          <a href="../admin/dashboard-scheduling.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Schedule Settings</span>
          </a>
          <span class="tooltip">Schedule Settings</span>
        </li> -->
      </ul>
    </div>
  </ul>
  </div>
 <section class="home-section">
      <!-- CONTENT -->
      <section id="content">
        <!-- NAVBAR -->
        <style>
  /* Custom CSS */
  .dropdown-menu a.dropdown-item:hover {
    background-color: #0C375A;
    color: #fff;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #0C375A !important">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h2 class="text-white">Circle of Life Veterinary Clinic</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <span id="datetime" class="text-white"></span>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img src="<?= $_SESSION['user']['avatar'] ?>" alt="profileImg" class="avatar" style="height: 50px; width: 50px; border-radius: 6px;">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mt-3 text-white" href="#"><strong><?= $_SESSION['user']['name'] ?></strong></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link mt-3 dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <strong><i class="bx bx-cog mt-1"></i></strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background-color: #0C375A;">
            <li><a class="dropdown-item text-white" href="#" data-bs-toggle="modal" data-bs-target="#editProfile" onClick="previewEditProfileImage('<?=$_SESSION['user']['avatar']?>')">Edit Profile</a></li>
            <li><a class="dropdown-item text-white" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>





        <!-- Edit Modal -->
            <form action="query_resource/user_edit.php" method="post"  enctype="multipart/form-data">
              <div class="modal fade" id="editProfile" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="testModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      
                      <div class="modal-body">

                        <input type="hidden" name="id" id="user-edit-profile-id" value="<?=$_SESSION['user']['id']?>">
                        <input type="hidden" name="category" id="user-edit-profile-category" value="<?=$_SESSION['user']['category']?>">
                        <input type="hidden" name="old_username" id="user-edit-profile-old_username" value="<?=$_SESSION['user']['username']?>">
                        <input type="hidden" name="is_edit_profile" value="true">

                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Avatar</span>
                          <input type="file" class="form-control" id="image" name="image" accept="image/*" aria-describedby="inputGroup-sizing-sm" onchange="previewSelectedProfileImage(event)">
                        </div>

                        <div class="input-group input-group-sm mb-3 image-wrapper" id="imageWrapperEditProfile">
                            <img id="preview-edit-profile" class="img-thumbnail" alt="Preview Image" style="max-height:250px">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Fullname</span>
                          <input type="text" class="form-control" id="user-edit-profile-fullname" name="fullname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required value="<?= $_SESSION['user']['name'] ?>">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Username</span>
                          <input type="text" class="form-control" id="user-edit-profile-username" name="username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required value="<?= $_SESSION['user']['username'] ?>">
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                      </div>
                  </div>
                </div>
              </div>
            </form>


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

  function previewEditProfileImage(imageUrl) {
    const imageWrapperEditProfile = document.getElementById('imageWrapperEditProfile');
    const previewEdit = document.getElementById('preview-edit-profile');

    if (imageUrl) {
      previewEdit.src = imageUrl;
      imageWrapperEditProfile.style.display = 'flex';
    } else {
      previewEdit.src = '';
      imageWrapperEditProfile.style.display = 'none';
    }
  }

  function previewSelectedProfileImage(event) {
    const input = event.target;
    const imageWrapper = document.getElementById('imageWrapperEditProfile');
    const preview = document.getElementById('preview-edit-profile');

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        imageWrapper.style.display = 'flex';
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '';
      imageWrapper.style.display = 'none';
    }
  }
</script>

