<?php
function carousel(){


?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner ">
        <div class="carousel-item active">
            <img src="public/img/habillageSite/ban111.jpg" class="d-block h-25" alt="...">
        </div>
        <div class="carousel-item">
            <img src="public/img/habillageSite/banlivre.png" class="d-block h-25" alt="...">
        </div>
        <div class="carousel-item">
            <img src="public/img/habillageSite/ban13.jpg" class="d-block h-25" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
    <?php
} ?>
