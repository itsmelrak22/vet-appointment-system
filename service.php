<?php
$services = new Service;
$servicesAll = $services->allWithOutTrash();

// print_r($servicesAll);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Services</title>
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/serv.css">
  </head>
    <section id="service">
      <div class="row">
        <h2 class="section-heading">Our Services</h2>
      </div>

      <div style="height:fit-content">

      <div class="row">
        <?php foreach ($servicesAll as $key => $value) {  $value = (object) $value?> 

        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-paw"></i>
            </div>
            <h3> <?= $value->name ?> </h3>
            <p>
              <?= $value->info ?>
            </p>
          </div>
        </div>

        <?php } ?> 

      </div>

        <!-- </div> -->
			<div style="display: flex; justify-content: center; align-content: center;">
        <button class="SeeMore" id="seemore">See More</button>
			</div>
    </section>
</html>
