<?php
$services = new Service;
$servicesAll = $services->allWithOutTrash();

// print_r($servicesAll);

?>
    <!-- <link rel="stylesheet" href="./css/serv.css"> -->

<about id="about">
    <div class="about_content">
        <h2 class="services-title">Our Services</h2>
        <label><!-- line here --></label> 
    <br>
</about> 
<div class="container team">
    <div class="row">
    <?php foreach ($servicesAll as $key => $value) { $value = (object) $value?>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4  flip-column">
            <div class="services">
              <div class="card service-card">
                <div class="icon-wrapper">
                  <i class="fa-solid fa-paw"></i>
                </div>
                <h3 class="service-title card-text"><?= $value->name ?></h3>
                <p class="card-text"><?= $value->info ?></p>
              </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>

