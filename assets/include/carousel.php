<div class="slider-wrapper" id="slick-1">
    <div class="slider">
        <?php 
            foreach ( $images as $image ) {
                echo '<div class="slide"><img class="carousel-img" src="'.$image.'"></div>';
            }
        ?>
    </div>
    <div class="slider-progress">
        <div class="progress"></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $conf["url"]; ?>/assets/js/carousel.min.js"></script>